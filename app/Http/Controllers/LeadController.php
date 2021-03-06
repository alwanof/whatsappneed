<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\App;

class LeadController extends Controller
{
    private function getLang($lang)
    {
        $locale = $lang;
        if (session()->has('lang')) {
            App::setLocale(session()->get('lang'));
            $locale = session()->get('lang');
        } else {
            session()->put('lang', $lang);
            App::setLocale($lang);
        }

        return $locale;
    }

    public function setLang($lang)
    {

        session()->put('lang', $lang);
        App::setLocale($lang);
        return back();
    }

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
        $lead->title = json_encode($title, JSON_UNESCAPED_UNICODE);
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
