<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Setting;
use App\Company;
use App\Flow;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function company()
    {
        $settings = Setting::latest()
            ->get()
            ->first();
        $company = Company::latest()
            ->get()
            ->first();
        $data = [
            'nav' => __FUNCTION__,
            'settings' => $settings,
            'company' => $company,
        ];
        return view('website.'. __FUNCTION__, compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function flow()
    {
        $settings = Setting::latest()
            ->get()
            ->first();
        $flow = Flow::latest()
            ->get()
            ->first();
        $data = [
            'nav' => __FUNCTION__,
            'settings' => $settings,
            'flow' => $flow,
        ];
        return view('website.'. __FUNCTION__, compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $settings = Setting::latest()
            ->get()
            ->first();
        $contact = Contact::latest()
            ->get()
            ->first();
        $data = [
            'nav' => __FUNCTION__,
            'settings' => $settings,
            'contact' => $contact,
        ];
        return view('website.'. __FUNCTION__, compact('data'));
    }
}
