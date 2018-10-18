<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // custom table name
    protected $table = 'users';
    protected $primaryKey = 'id';
    // custom auto_increment to false
    // protected $incrementing = false;
    // custom timestamp
    // const CREATE_AT = 'creation_date';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products() {
        return $this->belongsToMany('App\Product', 'orders', 'user_id', 'product_id');
        // return $this->belongsToMany('model', 'tabel_berkaitan', 'fk_tabel_berkaitan', 'fk_model');
    }
}
