<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vendinglocation extends Model
{
       protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
    ];
}