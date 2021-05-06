<?php

use App\Item;
use App\User;
use App\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/payment', function () {
    return view('payment');
});

Route::get('/request/demo', 'LeadController@index')->name('lead.demo');
Route::get('/set/lang/{lang}', 'LeadController@setLang')->name('lang.set');
Route::post('/request/demo', 'LeadController@store');

Route::get('/ip', function (Request $request) {

    $plan = Plan::find(1);
    $meta = json_decode($plan->meta, true);

    return $meta[0];
    $country = 'TR';

    if (!is_array(__("front.{$country}"))) {
        $country = 'TR';
    }
    echo __("front.{$country}.HERO.TITLE");
    echo "<hr>";
    echo $country;

    //return $request->ipinfo->all;
});

Route::get('order/{slug}', 'OrderController@index');
Route::get('clear/test', 'TestController@go');

Route::get('/test', 'TestController@testo');
