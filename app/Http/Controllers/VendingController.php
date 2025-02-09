<?php

namespace App\Http\Controllers;

use App\Models\vendinglocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class VendingController extends Controller
{
   
     public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'latitude' => 'required|',
            'longitude' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = vendinglocation::create([
            'name' => $request->name,
            'email' => $request->email,
           
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }

 
  
}