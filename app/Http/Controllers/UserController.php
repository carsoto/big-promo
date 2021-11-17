<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function home_big()
    {
        if(auth()->user() == null){
            return view('user.home');
        } else {
            $data = $this->validate_recorder();
            return view('user.exchange', ['data' => $data]);
        }
    }

    public function login()
    {
        if(auth()->user() == null){
            return view('user.auth.login');
        } else {
            $data = $this->validate_recorder();
            return view('user.exchange', ['data' => $data]);
        }
    }

    public function register()
    {
        if(auth()->user() == null){
            return view('user.auth.register');
        } else {
            $data = $this->validate_recorder();
            return view('user.exchange', ['data' => $data]);
        }
    }

    public function recorder()
    {
        return view('user.recorder');
    }

    public function videosGallery()
    {
        return view('user.videos');
    }

    public function exchange()
    {
        $data = $this->validate_recorder();
        return view('user.exchange', ['data' => $data]);
    }

    public function fq()
    {
        return view('user.fq');
    }

    public function history()
    {
        return view('user.history');
    }

    public function validate_recorder() {
        $max_points = env('MAX_POINTS', 5000);
        $data = array('accumulated' => 0, 'total_accumulated' => 0, 'max_points' => $max_points, 'recorder' => false, 'progress' => 0);

        if(auth()->user() != null){
            $accumulated = auth()->user()->user_exchanges->sum('points') + auth()->user()->user_exchanges->sum('aditional_points');
            $data['total_accumulated'] = $accumulated;
            $data['accumulated'] = $accumulated;
            if($accumulated > $max_points){
                $dreams = auth()->user()->user_dreams()->count();
                $points_used = $dreams * $max_points;
                $dreams_points = $accumulated - $points_used;
                $data['accumulated'] = $dreams_points;
    
                if(floor($accumulated/$max_points) > $dreams){
                    $data['recorder'] = true;
                }
            }
            $percent = ($data['accumulated'] * 100)/$max_points;
            $percent < 100 ? $data['progress'] = round($percent, 0) : $data['progress'] = 100;
        }
        
        return $data;
    }

    public function recoverPassword() {
        return view('user.auth.recoverPassword');
    }

    public function resetPassword($token) {
        return view('user.auth.resetPassword', ['token' => $token]);
    }
}
