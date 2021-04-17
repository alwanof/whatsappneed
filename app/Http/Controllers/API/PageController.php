<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Page;
use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
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

        $page = Page::where([
            'user_id' => $user->id,
            'available' => 1
        ]);


        $pages = PageResource::collection($page->paginate($limit));
        return $pages->response()->setStatusCode(200);
    }
}
