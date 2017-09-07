<?php

namespace App\Http\Controllers;

use App\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * 网站设置页面路由名称
     * @var string
     */
    const REDIRECT_SETTINGS_PAGE = 'dashboard.settings';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = Setting::create([
            'title' => request('title'),
            'logo' => request('logo'),
            'keywords' => request('keywords'),
            'description' => request('description'),
            'banner' => request('banner'),
            'copyright' => request('copyright'),
            'mobile' => request('mobile'),
            'address' => request('address'),
            'icp' => request('icp'),
        ]);
        return redirect(route(self::REDIRECT_SETTINGS_PAGE). '?from=add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $ret = $setting->update(
            [
                'title' => request('title'),
                'logo' => request('logo'),
                'keywords' => request('keywords'),
                'description' => request('description'),
                'banner' => request('banner'),
                'copyright' => request('copyright'),
                'mobile' => request('mobile'),
                'address' => request('address'),
                'icp' => request('icp'),
            ]
        );
        return redirect(route(self::REDIRECT_SETTINGS_PAGE). '?from=update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
