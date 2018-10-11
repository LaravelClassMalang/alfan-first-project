<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'product_id', 'user_id'
    ];

    public function products() {
        return $this->belongsTo('App\Product', 'product_id', 'product_id');
    }

    public function users() {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }
}
