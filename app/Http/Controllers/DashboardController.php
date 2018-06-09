<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Repositories\DashboardStats;

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

        $dashboard_stats = new DashboardStats;
        $dashboard_data = $dashboard_stats->get_dashboard_stats($products);

        return view('dashboard')
               ->with('products', $products)
               ->with('product_names', $dashboard_data[0])
               ->with('product_views', $dashboard_data[1]);
    }

     /**
     * Obtain search results.
     *
     * @return $results
     */
    public function search()
    {
          $string = Input::get('search');
          $products = Product::search($string)->paginate(10);

          $dashboard_stats = new DashboardStats;
          $dashboard_data = $dashboard_stats->get_dashboard_stats($products);

          return view('dashboard')
               ->with('products', $products)
               ->with('product_names', $dashboard_data[0])
               ->with('product_views', $dashboard_data[1]);
        
    }
}
