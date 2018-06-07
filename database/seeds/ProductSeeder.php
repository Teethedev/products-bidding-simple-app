<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Product::class, 20)->create()->each(function($p) {
        $p->product_stats()->save(factory(App\Products_stat::class)->make());
        $p->product_bids()->save(factory(App\Products_bid::class)->make());
     });
    }
}