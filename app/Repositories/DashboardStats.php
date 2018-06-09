<?php

namespace App\Repositories;


class DashboardStats
{

    /**
     * prepare dashboard data.
     *
     * @return returned_stats
     */
    public function get_dashboard_stats($products){
           $returned_stats = array();
           $product_names = array();
           $product_views = array();
           foreach ($products as $product){
             array_push($product_names,$product->name);
             array_push($product_views,$product->product_stats->views);
           }
  
          $product_names = json_encode($product_names);
          $product_views = json_encode($product_views);
          array_push($returned_stats, $product_names, $product_views );

          return $returned_stats;
    }
}
