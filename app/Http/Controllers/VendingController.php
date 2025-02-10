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
   public function getdistance(Request $req)
{
    $lat1 = $req['latitude'];
    $lon1 = $req['longitude'];
    $distance = [];
    $vending = vendinglocation::all();

    foreach ($vending as $k) {
        $lat2 = $k['latitude'];
        $lon2 = $k['longitude'];
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper('K');
        $distance[] = ['vending' => $k, 'distance' => $miles * 1.609344];
    }

    usort($distance, function ($a, $b) {
        return $a['distance'] <=> $b['distance']; 
    });

    return response()->json($distance, 201); 
}
}