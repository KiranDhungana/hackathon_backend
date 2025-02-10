<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recycle extends Model
{
    protected $casts = [
        'recycled_date' => 'datetime',  // This ensures it gets cast to a Carbon instance
    ];
        protected $fillable = [
        'name',
        'material_name',
        'user_id',
        'recycled_date'
    ];
    public $timestamps = false; //by default timestamp true

}