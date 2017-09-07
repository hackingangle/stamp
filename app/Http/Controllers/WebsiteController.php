<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Product;
use App\Setting;
use App\Company;
use App\Flow;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    protected $arrTopProducts;

    public function __construct()
    {
        $this->arrTopProducts = DB::table('products')
            ->where('status', 0)
            ->where('top', 1)
            ->orderBy('updated_at')
            ->limit(5)
            ->get();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::latest()->get()
            ->first();
        $products = DB::table('products')
            ->where('status', 0)
            ->orderBy('updated_at')
            ->get();
        $data = [
            'nav' => __FUNCTION__,
            'settings' => $settings,
            'products' => $products,
            'topProducts' => $this->arrTopProducts,
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
            'topProducts' => $this->arrTopProducts,
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
            'topProducts' => $this->arrTopProducts,
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
            'topProducts' => $this->arrTopProducts,
        ];
        return view('website.'. __FUNCTION__, compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
        $settings = Setting::latest()
            ->get()
            ->first();
        $products = DB::table('products')
            ->where('status', 0)
            ->orderBy('updated_at')
            ->get();
        $data = [
            'nav' => __FUNCTION__,
            'settings' => $settings,
            'products' => $products,
            'topProducts' => $this->arrTopProducts,
        ];
        return view('website.'. __FUNCTION__, compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productdetail(Product $product)
    {
        $settings = Setting::latest()
            ->get()
            ->first();
        $data = [
            'nav' => __FUNCTION__,
            'settings' => $settings,
            'product' => $product,
            'topProducts' => $this->arrTopProducts,
        ];
        return view('website.'. __FUNCTION__, compact('data'));
    }
}
