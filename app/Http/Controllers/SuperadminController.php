<?php

namespace App\Http\Controllers;

use App\Models\Recycle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
class SuperadminController extends Controller
{
    public function getalluser(){

        $user =User::all();
        $reward = Recycle::all();
            return response()->json([
        'message' => 'All users',
        'user' => $user,
        'reward'=>$reward
    ], 201);


    }
}