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
use App\Products_bid;
use App\Events\BidSaved;
use App\Events\ProductViewed;

class FrontendController extends Controller
{
     /**
     * Display a listing of the products.
     *
     * @return Response
     */
    public function index()
    {
        //get all the products
        $products = Product::paginate(6);

        // load the view and pass the products
        return View::make('frontend.index')
            ->with('products', $products);
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
        
        return View::make('frontend.show')
            ->with('product', $product)
            ->with('all_bids', $all_bids);
    }

    /**
     * Store bid.
     *
     * @return Response
     */
    public function bid()
    {
         // validate
        $rules = array(
            'id'       => 'required',
            'email'      => 'required',
            'bid' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) { //redirect back
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $ip = \Request::ip();
            $bid = new Products_bid;
            $bid->productid = Input::get('id');
            $bid->email  = Input::get('email');
            $bid->ip  = $ip; /*this is not unique enough, local computers sharing 
                             a single ip will create issues. Refined identifier could 
                             work with addition of cookies perhaps?*/
            $bid->bid = Input::get('bid');
            $bid->save();

            //Dispatch bid saved event
            event(new BidSaved($bid));
           
          /*try {
             $bid->save();
          } catch (\Illuminate\Database\QueryException $e) {
              //var_dump($e->errorInfo);
               // redirect
            Session::flash('message', 'Bid submitted before!');
            return Redirect::back()->withInput();
           }*/
            // redirect
            Session::flash('message', 'Successfully placed a bid!');
            return Redirect::to('frontend');
        }
    }

      /**
     * Search Products
     *
     * @return $products
     */
    public function search()
    {
          $string = Input::get('search');
          $products = Product::search($string)->paginate(6);

          return View::make('frontend.index')
            ->with('products', $products);
        
    }
}
