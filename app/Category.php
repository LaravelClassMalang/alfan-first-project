<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'category_id','category_name',
    ];

    public function products() {
    	return $this->hasMany('App\Product', 'category_id');
    }
}
