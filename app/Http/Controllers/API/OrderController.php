<?php

namespace App\Http\Controllers\API;

use App\Driver;
use App\Element;
use App\Http\Controllers\Controller;
use App\Mail\CompanyInvoice;
use App\Mail\CustomerInvoice;
use App\Order;
use App\Parse\Stream;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function save(Request $request)
    {

        $this->validate($request, [
            'restID' => 'required',
            'indoor' => 'required|min:0|max:1',
            'name' => 'required|string',
            //'phone' => 'required',
            //'address' => 'required',
            //'dist' => 'required',
            //'aprt' => 'required',
            //'house' => 'required',
            //'lat' => 'required',
            //'lng' => 'required',
            'total' => 'required',
            'items' => 'required',
        ]);


        $rest = User::findOrFail($request->restID);
        $phoneNumber = $request->phone;
        $phoneNumber = str_replace(" ", "", $phoneNumber);
        $phoneNumber = str_replace("(", "", $phoneNumber);
        $phoneNumber = str_replace(")", "", $phoneNumber);
        $phoneNumber = str_replace("-", "", $phoneNumber);
        if ($request->indoor != 1) {
            $phoneKey = $rest->settings['phone_code'];
            $phoneNumber = $phoneKey . $phoneNumber;
        }

        //$phoneNumber = '90' . $phoneNumber;

        $order = new Order();
        $order->slug = Str::random(24);
        $order->name = $request->name;
        $order->email = $request->email ?? null;
        $order->phone = $phoneNumber;
        $order->address = $request->address;
        $order->dist = $request->dist;
        $order->aprt = $request->aprt;
        $order->house = $request->house;
        $order->bell = $request->bell ?? null;
        $order->lat = $request->lat;
        $order->lng = $request->lng;
        $order->items = json_encode($this->itemsArray($request->items), JSON_UNESCAPED_UNICODE);
        $order->total = $request->total;
        $order->status = 0;
        $order->note_a = $request->note ?? null;
        $order->user_id = $rest->id;
        $order->parent = $rest->parent_id;

        $order->save();
        $initItems = $this->itemsArray($request->items);
        foreach ($initItems as  $item) {
            $element = new Element();
            $element->order_id = $order->id;
            $element->item_id = $item['id'];
            $element->amount = $item['amount'];
            $element->save();
        }


        if ($rest->settings['whatsapp_off'] == 1) {
            $this->sendOrder2Admin($request, $order);
            $msg = str_replace('@@@', $order->name, __('core.thanks_msg'));
            return response($msg, 200);
        }


        return response($this->waMsg($request, $order), 200);
    }
    private function itemsArray($items)
    {
        $items = explode('#', $items);
        $res = [];
        foreach ($items as $item) {
            $element = explode('@', $item);
            $res[] = [
                'id' => $element[0],
                'item' => $element[1],
                'amount' => $element[2],
                'price' => $element[3]
            ];
        }
        return $res;
    }
    private function sendOrder2Admin($request, $order)
    {
        $items = explode('#', $request->items);
        $data = ['order' => $order, 'items' => $items];
        $user = User::find($order->user_id);
        Mail::to($user->email)->send(new CompanyInvoice($data));
        if ($user->settings['sendCinv'] == 1) {
            if ($order->email) {
                Mail::to($order->email)->send(new CustomerInvoice($data));
            }
        }
    }

    private function waMsg($request, $order)
    {
        $items = explode('#', $request->items);
        //https://wa.me/905373306613?text=hello%20word%0Afrom%20murad
        $orderText = '';
        foreach ($items as $index => $item) {
            $item = explode('@', $item);
            $orderText = $orderText . '.' . $index . ')' . $item[1] . '[' . $item[2] . ']' . "%0A";
        }

        $dist = ($request->dist != 'N') ? "[$request->dist]" : null;
        $user = User::find($order->user_id);
        $addressText = '';
        $mapLink = '';
        $orderLink = '';
        if ($user->settings['wm_address'] == 1) {
            $addressText = ($request->indoor == 0) ? "???? $request->address /B:$request->aprt D:$request->house ???? $order->bell" : null;
        }
        if ($user->settings['wm_map'] == 1) {
            $mapLink = ($request->indoor == 0) ? "https://maps.google.com/local?q=$order->lat,$order->lng" : null;
        }
        if ($user->settings['wm_order'] == 1) {
            $orderLink = ($request->indoor == 0) ? env('APP_URL') . '/order/' . $order->slug : null;
        }
        $msg = $request->name . $dist . '%0A -------- %0A' . $orderText . '%0A -------- %0A' . $order->total . '???%0A -------- %0A' . $addressText . '%0A -------- %0A' . $order->note_a . '%0A -------- %0A????' . $mapLink . '%0A -------- %0A????' . $orderLink;

        return $this->strim($msg);
    }

    public function driverOrder($hash)
    {
        $driver = Driver::where('hash', $hash)->firstOrFail();
        $pendingOrder = Order::where([
            'driver_id' => $driver->id,
            'status' => 12
        ]);
        if ($pendingOrder->count() > 0) {
            return $pendingOrder->first();
        }

        $newOrder = Order::where([
            'driver_id' => $driver->id,
            'status' => 1
        ]);
        if ($newOrder->count() > 0) {
            return $newOrder->first();
        }

        return false;
    }

    private function strim($text)
    {
        return str_replace(" ", "%20", $text);
    }

    public function approveOrder($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->status = 12;
        $order->save();

        $driver = Driver::findOrFail($order->driver_id);
        $driver->status = 1;
        $driver->save();
        $response = Stream::create([
            'pid' => $order->id,
            'model' => 'Order',
            'action' => 'U',
            'meta' => ['rest' => $order->user_id, 'agent' => $order->parent, 'action' => 'update']
        ]);
        return response(1, 200);
    }

    public function rejectOrder($hash, $order_id)
    {
        $driver = Driver::where('hash', $hash)->firstOrFail();


        $order = Order::findOrFail($order_id);

        $order->status = 0;
        $order->driver_id = null;
        $order->save();

        $driver->status = 2;
        $driver->save();

        $response1 = Stream::create([
            'pid' => $order->id,
            'model' => 'Order',
            'action' => 'U',
            'meta' => ['rest' => $order->user_id, 'agent' => $order->parent, 'action' => 'update']
        ]);
        $response2 = Stream::create([
            'pid' => $driver->id,
            'model' => 'Driver',
            'action' => 'U',
            'meta' => ['hash' => $driver->hash, 'rest' => $driver->user_id, 'agent' => $driver->parent]
        ]);


        return response(1, 200);
    }

    public function completeOrder($hash, $order_id)
    {
        $driver = Driver::where('hash', $hash)->firstOrFail();
        $order = Order::findOrFail($order_id);
        $order->status = 2;
        $order->save();

        $driver->status = 2;
        $driver->save();

        $response1 = Stream::create([
            'pid' => $order->id,
            'model' => 'Order',
            'action' => 'U',
            'meta' => ['hash' => $driver->hash, 'rest' => $order->user_id, 'agent' => $order->parent, 'action' => 'update']
        ]);
        $response2 = Stream::create([
            'pid' => $driver->id,
            'model' => 'Driver',
            'action' => 'U',
            'meta' => ['hash' => $driver->hash, 'rest' => $driver->user_id, 'agent' => $driver->parent]
        ]);

        return response(1, 200);
    }

    public function sendOrderToDriver($hash, $order_id)
    {
        $driver = Driver::findOrFail($hash);

        $order = Order::findOrFail($order_id);

        $order->status = 1;
        $order->driver_id = $driver->id;
        $order->save();

        $driver->status = 1;
        $driver->save();

        $response1 = Stream::create([
            'pid' => $order->id,
            'model' => 'Order',
            'action' => 'U',
            'meta' => ['hash' => $driver->hash, 'rest' => $order->user_id, 'agent' => $order->parent, 'action' => 'update']
        ]);
        $response2 = Stream::create([
            'pid' => $driver->id,
            'model' => 'Driver',
            'action' => 'U',
            'meta' => ['hash' => $driver->hash, 'rest' => $driver->user_id, 'agent' => $driver->parent]
        ]);
        return $order;
    }

    public function show($order_id)
    {
        return
            Order::findOrFail($order_id);
    }
}
