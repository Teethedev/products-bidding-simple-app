<?php

namespace App\Listeners;

use App\Events\BidSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Products_stat;
use App\Products_bid;

class UpdateProductStats
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the bid.
     *
     * @param  BidSaved  $event
     * @return void
     */
    public function handle(BidSaved $event)
    {
          //get all bids for this product 
          $all_bids = Products_bid::where('productid',$event->bid->productid)->get();

         //update the stats of the product 
          Products_stat::where('productid',$event->bid->productid)->update(['avaragebid'=>$all_bids->avg('bid'), 
                                                                            'lowestbid' => $all_bids->min('bid'), 
                                                                            'highestbid'  => $all_bids->min('bid')]);
    }
}
