<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_stat extends Model
{
    protected $fillable = array('avaragebid', 'lowestbid', 'highestbid', 'views');
}
