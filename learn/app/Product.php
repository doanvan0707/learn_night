<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    // Quan he 1 1

    public function product_type()
    {
    	return $this->belongsTo('App\ProductType','id_type','id');
    }

    // Quan he 1 n

    public function bill_detail()
    {
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
}	
