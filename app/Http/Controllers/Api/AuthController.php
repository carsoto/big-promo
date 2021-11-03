<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Registration
     */
    public function register(UserRequest $request)
    {
        $confirmation_code = Str::random(25);

        $user = User::create([
            'name'                     => $request->name,
            'lastname'                 => $request->lastname,
            'email'                    => $request->email,
            'document_identification'  => $request->document_identification,
            'password'                 => bcrypt($request->password),
            'phone'                    => $request->phone,
            'type'                     => 'user',
            'city_id'                  => $request->city,
            'confirmation_code'        => $confirmation_code
        ]);
        
        $data = $request->toArray();
        $data['confirmation_code'] = $confirmation_code;

        // Send confirmation code
        Mail::send('emails.users.confirmation_code', $data, function($message) use ($data, $user) {
            $message->to($data['email'], $user->fullName())->subject('Por favor confirma tu correo');
        });


        //$token = $user->createToken('BigPromoToken')->accessToken;
        //return response()->json(['user' => $user, 'token' => $token], 200);

        return response()->json(['msg' => 'Se ha enviado un correo de confirmación'], 200);
    }
 
    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('BigPromoToken')->accessToken;
            return response()->json(['user' => auth()->user(), 'token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    } 

    public function logout(){
        $user = auth()->user()->token();
        $user->revoke();
        return response()->json(['msg' => 'Logged out'], 200);
    }
}
