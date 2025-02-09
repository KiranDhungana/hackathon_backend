<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class useramount extends Model
{
      protected $fillable = [
        'redeem_amout',
        'longitude',
        'created_at',
        'updated_at',
        'transictionid'
    ];
}