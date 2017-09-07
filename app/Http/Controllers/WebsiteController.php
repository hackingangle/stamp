<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::latest()->get()
            ->first();
        $data = [
            'nav' => __FUNCTION__,
            'settings' => $settings,
        ];
        return view('website.'. __FUNCTION__, compact('data'));
    }
}
