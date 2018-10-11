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
    protected $primaryKey = 'user_id';
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
        return $this->belongsToMany('App\Product', 'orders', 'product_id', 'user_id');
        // return $this->belongsToMany('model', 'tabel_berkaitan', 'kolom_relasi', 'kolom_yang_dituju');
    }
}
