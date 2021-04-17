<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\SliderResource;

class SliderController extends Controller
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


        $limit = ($request->input('limit') && $request->input('limit') <= 100) ? $request->input('limit') : 12;

        $slider = Slider::where([
            'user_id' => $user->id,
            'available' => 1
        ]);

        $sliders = SliderResource::collection($slider->paginate($limit));
        return $sliders->response()->setStatusCode(200);
    }
}
