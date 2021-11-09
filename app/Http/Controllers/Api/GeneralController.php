<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Canton;
use App\Models\Parish;

class GeneralController extends Controller
{
    public function cities(){ 
        $data = Canton::all();
        
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    //
    public function political_division($type = null){
        switch($type) {
            case "provincias":
                $data = Province::all();
                break;
            case "cantones":
                $data = Canton::all();
                break;
            case "parroquias":
                $data = Parish::all();
                break;
            default:
                $provinces = Province::all();
                foreach($provinces AS $key => $province){
                    $data[] = $province;
                    $data[]['cantones'] = $province->cantons;
                    foreach ($province->cantons AS $c_key => $canton){
                        $data[]['cantones']['parroquias'] = $canton->parishs;
                    }
                    
                }
                break;
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
}
