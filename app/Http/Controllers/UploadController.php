<?php

namespace App\Http\Controllers;

use Mockery\Exception;
use Storage;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function images(Request $request)
    {
        $ret = [
            'errorNo' => 0,
            'errorMsg' => '',
            'data' => [],
        ];
        try {
            //判断请求中是否包含name=file的上传文件
            if(!$request->hasFile('file')) {
                throw new Exception('上传文件不存在', 10000);
            }
            $file = $request->file('file');
            //判断文件上传过程中是否出错
            if(!$file->isValid()){
                throw new Exception('上传文件不存在', 10000);
            }
            $newFileName = md5(time().rand(0,10000)).'.'.$file->getClientOriginalExtension();
            $savePath = 'stamp/'. $newFileName;
            $bytes = Storage::put(
                $savePath,
                file_get_contents($file->getRealPath())
            );
            if(!Storage::exists($savePath)){
                throw new Exception('保存文件失败', 10001);
            }
            $ret['data'] = route('download.images'). '?path='. $savePath;
        } catch (Exception $e) {
            $ret['errorNo'] = $e->getCode();
            $ret['errorMsg'] = $e->getMessage();
            $ret['data'] = [];
        }
        return $ret;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
