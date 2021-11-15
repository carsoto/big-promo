<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Canton;
use App\Models\Parish;
use App\Models\User;

class GeneralController extends Controller
{
    public function cities(){ 
        $data = Canton::orderBy('name', 'ASC')->get();
        
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    //
    public function political_division($type = null){
        switch($type) {
            case "provincias":
                $data = Province::orderBy('name', 'ASC')->get();
                break;
            case "cantones":
                $data = Canton::orderBy('name', 'ASC')->get();
                break;
            case "parroquias":
                $data = Parish::orderBy('name', 'ASC')->get();
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

    public function verify($code)
    {
        $user = User::where('confirmation_code', $code)->first();
        
        if (!$user)
            return redirect('/user-not-found');

        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();
        
        if(auth()->user() != null){
            $user_logged = auth()->user()->token();
            if($user_logged) {
                $user->revoke();
            }    
        }
        
        if (auth()->loginUsingId($user->id)) {
            $token = auth()->user()->createToken('BigPromoToken')->accessToken;
            return redirect()->route('user.exchange');
            //return response()->json(['user' => auth()->user(), 'token' => $token, 'msg' => 'Haz confirmado correctamente tu correo!'], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
