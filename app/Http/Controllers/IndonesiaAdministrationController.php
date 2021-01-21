<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Kecamatan;
use Laravolt\Indonesia\Models\Village;

class IndonesiaAdministrationController extends Controller{
       
       
    public function getCity(Request $request){
        $cities = City::where('province_id', $request->get('id'))
            ->pluck('name', 'id');
    
        return response()->json($cities);
       
    }

    public function getDistrict(Request $request){
        $district = Kecamatan::where('city_id', $request->get('id'))
            ->pluck('name', 'id');
    
        return response()->json($district);
       
    }

    public function getVillage(Request $request){
        $village = Village::where('district_id', $request->get('id'))
            ->pluck('name', 'id');
    
        return response()->json($village);
       
    }
}
