<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $products = Product::paginate(10);

        //(take this into a class repository)
        $product_names = array();
        $product_views = array();
        foreach ($products as $product){
           array_push($product_names,$product->name);
           array_push($product_views,$product->product_stats->views);
        }

        $product_names = json_encode($product_names);
        $product_views = json_encode($product_views);

        return view('dashboard')
               ->with('products', $products)
               ->with('product_names', $product_names)
               ->with('product_views', $product_views);
    }
}
