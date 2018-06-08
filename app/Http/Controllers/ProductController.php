<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Products_stat;
use App\Events\ProductViewed;

class ProductController extends Controller
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
     * Display a listing of the products.
     *
     * @return Response
     */
    public function index()
    {
        //get all the products
        $products = Product::paginate(5);

        // load the view and pass the products
        return View::make('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new product.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @return Response
     */
    public function store()
    {
         // validate
        $rules = array(
            'name'       => 'required',
            'sku'      => 'required',
            'price' => 'required',
            'description' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('dashboard/products/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $product = new Product;
            $product->name = Input::get('name');
            $product->sku  = Input::get('sku');
            $product->price = Input::get('price');
            $product->description = Input::get('description');
            $product->save(); //make this add initial product stats
            $initial_stats = new Products_stat(['avaragebid' => 0, 'lowestbid' => 0, 'highestbid' => 0, 'views' => 0]);
            $product->product_stats()->save($initial_stats);
   
            // redirect
            Session::flash('message', 'Successfully created product!');
            return Redirect::to('dashboard/products');
        }
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the product
        $product = Product::find($id);

        //get product bids 
        $all_bids = $product->product_bids()->paginate(6);

        //increment the product views
        event(new ProductViewed($product));
       
        //check if user placed a bid already
        $product->bid_placed = $product->product_bids()->where('ip', \Request::ip())->first();
        
        return View::make('products.show')
            ->with('product', $product)
            ->with('all_bids', $all_bids);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the product
        $product = Product::find($id);

        // show the edit form and pass the product
        return View::make('products.edit')
            ->with('product', $product);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        $rules = array(
            'name'       => 'required',
            'sku'      => 'required',
            'price' => 'required',
            'description' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('dashboard/products/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $product = Product::find($id);
            $product->name       = Input::get('name');
            $product->sku      = Input::get('sku');
            $product->price = Input::get('price');
            $product->description = Input::get('description');
            $product->save();

            // redirect
            Session::flash('message', 'Successfully updated product!');
            return Redirect::to('dashboard/products');
        }
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $product = Product::find($id);
        $product->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the product!');
        return Redirect::to('dashboard/products');
    }

}
