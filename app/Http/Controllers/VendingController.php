<?php

namespace App\Http\Controllers;

use App\Models\vendinglocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class VendingController extends Controller
{
   
     public function addvendinglocation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'latitude' => 'required|',
            'longitude' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

         vendinglocation::create([
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
           
        ]);

        return response()->json(['message' => 'Location added successfully'], 201);
    }

     public function getvendinglocation(Request $request)
    { $location = vendinglocation::all();
    return response()->json($location, 200);
    }
 
  
}