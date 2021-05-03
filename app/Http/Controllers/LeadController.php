<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;

class LeadController extends Controller
{
    public function index()
    {
        return view('lead');
    }

    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'note' => 'required',
        ]);
        $title = [
            'package' => $request->package,
            'bundle' => $request->bundle,
            'info' => $request->ipinfo
        ];
        $lead = new Lead;
        $lead->title = json_encode($title);
        $lead->name = $request->name;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->note = $request->note;
        $lead->status = 0;
        $lead->user_id = 9;
        $lead->parent = 1;
        $lead->save();


        return back()->with('SUCCESS', 'Item created successfully!');
    }
}
