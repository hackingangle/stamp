<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\Flow;
use App\Setting;
use App\Product;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'nav' => __FUNCTION__,
        ];
        return view('dashboard.'. __FUNCTION__, compact('data'));

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        $from = request('from');
        $settings = Setting::latest()->get()->first();
        $data = [
            'nav' => __FUNCTION__,
            'settings' => $settings,
            'from' => $from,
        ];
        return view('dashboard.'. __FUNCTION__, compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function company()
    {
        $from = request('from');
        $company = Company::latest()->get()->first();
        $data = [
            'nav' => __FUNCTION__,
            'company' => $company,
            'from' => $from,
        ];
        return view('dashboard.'. __FUNCTION__, compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function flow()
    {
        $from = request('from');
        $flow = Flow::latest()->get()->first();
        $data = [
            'nav' => __FUNCTION__,
            'flow' => $flow,
            'from' => $from,
        ];
        return view('dashboard.'. __FUNCTION__, compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $from = request('from');
        $contact = Contact::latest()->get()->first();
        $data = [
            'nav' => __FUNCTION__,
            'contact' => $contact,
            'from' => $from,
        ];
        return view('dashboard.'. __FUNCTION__, compact('data'));
    }
}
