<?php

namespace App\Http\Controllers;

use App\Models\Recycle;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RecycleController extends Controller
{
   public function add_recycle_item(Request $req)
{
    
    $user = Auth::guard('sanctum')->user();
    
    $validatedData = $req->validate([
        'material_name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'secret' => 'required|string'
    ]);

    $item = new Recycle();
    $item->user_id = $user->id; 
    $item->material_name = $validatedData['material_name'];
    $item->reward = $validatedData['price'];
    $item->save();

    
    return response()->json([
        'message' => 'Recycle item saved successfully',
        'data' => $req->all()
    ], 201);

 }

 public function streak(){
  $user = Auth::guard('sanctum')->user();
    
  
    if (!$user instanceof \App\Models\User) {
        return response()->json([
            'error' => 'User is not an instance of the User model',
        ], 400);
    }

    $now = now();  
    $lastRecycle = Recycle::where('user_id', $user->id)->latest('recycled_date')->first();

    if ($lastRecycle && $lastRecycle->recycled_date->diffInHours($now) <= 24) {
        $user->streak += 1;
    } else {
        $user->streak = 0;
    }

    // Save the user data
    $user->save();

    return response()->json([
        'message' => 'Recycling recorded successfully!',
        'streak' => $user->streak,
    ]); 


 }

}