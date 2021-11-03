<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use File;
use App\Models\Province;
use App\Models\Canton;
use App\Models\Parish;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces_json = File::get("database/data/provincias.json");
        $provinces = json_decode($provinces_json);
  
        foreach ($provinces as $p_key => $p_value) {
            
            //echo "\nPROVINCIA: ".$p_value->provincia;
            $provincia = Province::create(["name" => $p_value->provincia]);
            
            foreach ($p_value->cantones as $c_key => $c_value) {
                
                //echo "\nCANTON:".$c_value->canton;
                $canton = Canton::create(["name" => $c_value->canton, 'province_id' => $provincia->id]);
                
                foreach ($c_value->parroquias as $pp_key => $pp_value) {
                    //echo "\nPARROQUIA: ".$pp_value;
                    Parish::create(["name" => $pp_value, 'canton_id' => $canton->id]);
                }
                //echo "\n";
            }
        }
    }
}
