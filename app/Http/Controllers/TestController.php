<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Item;
use App\Mail\CompanyInvoice;
use App\Order;
use App\Slider;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function go()
    {
        Order::where([
            'name' => 'Murat test',

        ])->delete();
        Order::where([
            'name' => 'Table 1',
            'user_id' => 12
        ])->delete();

        $driver = Driver::find(16);
        $driver->status = 2;
        $driver->save();
    }
    public function testo()
    {
        //$item = '17@item1@amount1@price1#18@item2@amount2@price2#19@item3@amount3@price3';
        //$order = Order::find(210);
        //$items = explode('#', $item);
        //$data = ['order' => $order, 'items' => $items];

        //Mail::to(User::find($order->user_id)->email)->send(new CompanyInvoice($data));
        //return 11;

        //$order = Order::find(21);
        //$order->items()->attach([4, 5]);
        //return $order->items()->get();

        $res[] = [
            'id' => 1,
            'item' => 22,
            'amount' => 5,
            'price' => 35
        ];
        $res[] = [
            'id' => 5,
            'item' => 33,
            'amount' => 6,
            'price' => 75
        ];

        return array_column($res, 'id');


        //return Carbon::now()->toDateTimeString();
        //$data = YOURMODEL::where('created_at', '<=', Carbon::now()->subDays(2)->toDateTimeString())->get();
        //return User::where('expiration_date', '>=', Carbon::now()->toDateTimeString())->get();
    }
}
