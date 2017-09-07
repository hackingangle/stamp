<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

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
}
