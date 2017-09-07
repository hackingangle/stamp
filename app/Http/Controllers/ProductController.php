<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    /**
     * 网站设置页面路由名称
     * @var string
     */
    const REDIRECT_SETTINGS_PAGE = 'dashboard.product';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->where('status', 0)
            ->orderBy('updated_at')
            ->get();
        $data = [
            'nav' => 'product',
            'subNav' => 'list',
            'products' => $products,
        ];
        return view('product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $from = request('from');
        $data = [
            'nav' => 'product',
            'subNav' => 'addEdit',
            'from' => $from,
        ];
        return view('product.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = Product::create([
            'description' => request('description'),
            'image' => request('image'),
            'top' => request('top'),
        ]);
        return redirect(route('product.create'). '?from=add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $from = request('from');
        $data = [
            'nav' => 'product',
            'subNav' => 'addEdit',
            'from' => $from,
            'product' => $product,
        ];
        return view('product.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $ret = $product->update(
            [
                'description' => request('description'),
                'image' => request('image'),
                'top' => request('top'),
            ]
        );
        return redirect('/product/'. $product->id. '?from=update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $ret = $product->update(
            [
                'status' => 1,
            ]
        );
        return redirect(route('product.index'));
    }
}
