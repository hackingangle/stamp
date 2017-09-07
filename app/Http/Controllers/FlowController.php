<?php

namespace App\Http\Controllers;

use App\Flow;
use Illuminate\Http\Request;

class FlowController extends Controller
{
    /**
     * 网站设置页面路由名称
     * @var string
     */
    const REDIRECT_SETTINGS_PAGE = 'dashboard.flow';

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
        $setting = Flow::create([
            'description' => request('description'),
        ]);
        return redirect(route(self::REDIRECT_SETTINGS_PAGE). '?from=add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flow  $flow
     * @return \Illuminate\Http\Response
     */
    public function show(Flow $flow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flow  $flow
     * @return \Illuminate\Http\Response
     */
    public function edit(Flow $flow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flow  $flow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flow $flow)
    {
        $ret = $flow->update(
            [
                'description' => request('description'),
            ]
        );
        return redirect(route(self::REDIRECT_SETTINGS_PAGE). '?from=update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flow  $flow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flow $flow)
    {
        //
    }
}
