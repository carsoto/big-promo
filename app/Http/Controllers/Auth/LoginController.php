<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

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
            return response()->json(['user' => auth()->user(), 'token' => $token, 'msg' => 'Haz confirmado correctamente tu correo!'], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
