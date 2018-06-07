<?php

namespace App\Listeners;

use App\Events\ProductViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Products_stat;

class IncrementProductViews
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
     * Handle the event.
     *
     * @param  ProductViewed  $event
     * @return void
     */
    public function handle(ProductViewed $event)
    {
        //update the stats of the product 
          Products_stat::where('productid',$event->product->id)->increment('views');
    }
}
