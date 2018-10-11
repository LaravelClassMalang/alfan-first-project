<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // Menggunakan 'softdelete'
    use SoftDeletes;

    protected $table = 'products';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name', 'price', 'stock', 'category_id'
    ];

    protected $dates = ['deleted_at'];

    public function category() {
        return $this->belongsTo('App\Category', 'category_id', 'category_id');
    }
}
