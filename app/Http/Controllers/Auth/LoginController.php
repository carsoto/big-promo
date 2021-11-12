<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login
     */
    public function login_promo(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $data = [];
            if(!auth()->user()->is_admin) {
                if(auth()->user()->confirmed) {
                    $status = true;
                    $message = 'Ha iniciado sesión exitosamente';
                    $data    = auth()->user();
                    $code    = 200;
                }

                else {
                    $status  = false;
                    $message = 'Debe confirmar su correo antes de iniciar sesión';
                    $code    = 200;
                    auth()->logout();
                }    
            } else {
                $status  = false;
                $message = 'Usuario no autorizado';
                $code    = 401;
                auth()->logout();
            }
        } else {
            $status  = false;
            $message = 'Usuario no registrado';
            $code    = 401;
            auth()->logout();
        }

        return response()->json([
            'success' => $status,
            'message' => $message,
            'data'    => $data,
        ], $code);

    }

}
