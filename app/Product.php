<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products_stat;
use App\Products_bid;

class Product extends Model
{
    /**
     * Get the product stats associated with the product.
     */
    public function product_stats()
    {
        return $this->hasOne('App\Products_stat', 'productid');
    }

    /**
     * Get the product bids associated with the product.
     */
    public function product_bids()
    {
        return $this->hasMany('App\Products_bid', 'productid');
    }

     public function delete()
    {
        // delete all related stats 
        $this->product_stats()->delete();

        // delete all related bids 
        $this->product_bids()->delete();
     
        return parent::delete();
    }

}
