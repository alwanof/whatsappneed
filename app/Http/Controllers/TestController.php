<?php

namespace App\Http\Controllers;

use App\Driver;
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
        $item = '17@item1@amount1@price1#18@item2@amount2@price2#19@item3@amount3@price3';
        $order = Order::find(21);
        $items = explode('#', $item);
        $data = ['order' => $order, 'items' => $items];

        Mail::to(User::find($order->user_id)->email)->send(new CompanyInvoice($data));
        return 11;
        //return Carbon::now()->toDateTimeString();
        //$data = YOURMODEL::where('created_at', '<=', Carbon::now()->subDays(2)->toDateTimeString())->get();
        //return User::where('expiration_date', '>=', Carbon::now()->toDateTimeString())->get();
    }
}
