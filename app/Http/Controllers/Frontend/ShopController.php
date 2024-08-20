<?php

namespace App\Http\Controllers\Frontend;
use App\Models\{Content, Service, Setting, Tag, Product};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use DB;

class ShopController extends Controller
{

    public function index()
    {

        $products = Product::where('status', 1)->get();

        //SEO =======================================
        $seo = [
            'title' => 'Shop | ' . Setting::first()->site_name,
            'sumary' => '',
            'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        return view('frontend/shop/index', ['seo' => $seo, 'products' => $products]);

    }

    public function product($slug = null)
    {

        $product = Product::where([['slug', $slug], ['status', 1]])->first();

        $sizes = DB::table('product_sizes')
            ->select(DB::raw('product_sizes.id, product_sizes.product_id, sizes.name'))
            ->leftJoin('sizes', 'product_sizes.size_id', '=', 'sizes.id')
            ->where('product_sizes.product_id', $product->id)
            ->orderBy('sizes.sort', 'asc')
            ->get();

        $seo = [
            'title' => $product->name . ' | ' . Setting::first()->site_name,
            'sumary' => $product->sumary,
            'image' => $product->img
        ];

        return view('frontend/shop/product', ['seo' => $seo, 'product' => $product, 'sizes' => $sizes]);

    }

}
