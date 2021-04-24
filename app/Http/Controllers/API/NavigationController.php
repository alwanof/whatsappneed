<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\NavigationResource;
use App\Navigation;
use App\User;
use Illuminate\Http\Request;


class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $slug = ($request->input('user')) ? $request->input('user') : null;

        $user = User::where('slug', '=', $slug)->firstOrFail();

        $nav = Navigation::with('navigations')->where([
            'user_id' => $user->id,
            'navigation_id' => null

        ])->orderBy('order', 'ASC')->get();

        return NavigationResource::collection($nav);
    }
    public function topnav(Request $request)
    {

        $slug = ($request->input('user')) ? $request->input('user') : null;

        $user = User::where('slug', '=', $slug)->firstOrFail();

        $nav = Navigation::where([
            'user_id' => $user->id,
            'top' => 1

        ])->orderBy('order', 'ASC')->get();

        return $nav;
    }

    public function payment($sum)
    {
        if ($sum % 2 == 0) {
            return response(1, 200);
        }
        return response(0, 200);
    }
}
