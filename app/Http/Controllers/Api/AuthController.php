<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use DB;
use Carbon\Carbon;

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
            'phone'                    => $request->phone,
            'aditional_phone'          => $request->aditional_phone,
            'city_id'                  => $request->city_id,
            'birthday'                 => $request->birthday,
            'email'                    => $request->email,
            'password'                 => bcrypt($request->password),
            'terms_conditions'         => $request->terms_conditions,
            'confirmation_code'        => $confirmation_code
        ]);

        $data = $request->toArray();
        $data['confirmation_code'] = $confirmation_code;

        // Send confirmation code
        Mail::send('emails.users.confirmation_code', $data, function($message) use ($data, $user) {
            $message->to($data['email'], $user->fullName())->subject('Por favor confirma tu correo');
        });

        return response()->json([
            'success' => true,
            'message' => 'Se ha enviado un correo para la confirmación de su registro, revisar en su bandeja de entrada o spam',
            'data'    => []
        ], 200);
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

            if(auth()->user()->confirmed) {
                return response()->json([
                    'success' => true,
                    'message' => 'Ha iniciado sesión exitosamente',
                    'data'    => auth()->user(),
                    'token'   => $token
                ], 200);
            }
            else {
                return response()->json([
                    'success' => false,
                    'message' => 'Debe confirmar su correo antes de iniciar sesión',
                    'data'    => [],
                ], 200);
            }

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no autorizado',
                'data'    => [],
            ], 401);
        }
    }

    public function logout(){
        $user = auth()->user()->token();
        $user->revoke();
        return response()->json([
            'success' => true,
            'message' => 'Ha cerrado sesión',
            'data'    => auth()->user(),
        ], 200);
    }

    public function recoverPassword(Request $request){
        $data = $request->toArray();
        $user = User::where('email', $data['email'])->first();

        if($user == null){
            return response()->json([
                'success' => false,
                'message' => 'Este correo no se encuentra registrado en nuestra plataforma',
                'data'    => []
            ], 200); 
        }

        $data = $user->toArray();

        $token = Str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $data['email'], 'token' => $token, 'created_at' => Carbon::now()]
        );
      
        $data['confirmation_code'] = $token;

        Mail::send('emails.users.recoverPassword', $data, function($message) use ($data, $user) {
            $message->to($data['email'], $user->fullName())->subject('Recupera tu contraseña BIG');
        });

        return response()->json([
            'success' => true,
            'message' => 'Se ha enviado un correo para recuperar la contraseña, revisar en su bandeja de entrada o spam',
            'data'    => []
        ], 200);
        
    }

    public function resetPassword(Request $request) {
        $updatePassword = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();

        if(!$updatePassword) {
            return response()->json([
                'success' => false,
                'message' => 'Este correo no se encuentra registrado en nuestra plataforma',
                'data'    => []
            ], 200);
        }
        
        $user = User::where('email', $request->email)->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return response()->json([
            'success' => true,
            'message' => 'Contraseña actualizada exitosamente.',
            'data'    => []
        ], 200);
    }
}
