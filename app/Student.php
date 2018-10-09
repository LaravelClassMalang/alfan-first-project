<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";

    // protected $primaryKey = "student_id";

    protected $fillable = [
        "student_name"
    ];

    // Kolom yang disembunyikan saat get data
    protected $hidden = [
        "created_at",
        "update_at"
    ];
}
