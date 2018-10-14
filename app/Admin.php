<?php

namespace App;

// use Illuminate\Database\Eloquent\User as Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table ='admins';

    protected $fillable = [
        'display_admin',
        'admin_name',
        'admin_email',
    ];
    
    protected $hidden = [
        'password', 
        'created_at',
        'updated_at',
    ];

    public function getAuthPassword() {
        return $this->admin_password;
    }
}
