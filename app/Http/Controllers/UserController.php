<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login()
    {
        return view('user.auth.login');
    }

    public function register()
    {
        return view('user.auth.register');
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
        $accumulated = auth()->user()->user_exchanges->sum('points') + auth()->user()->user_exchanges->sum('aditional_points');
        $data = [];
        $data['total_accumulated'] = $accumulated;
        $data['accumulated'] = $accumulated;
        $data['recorder'] = false;
        $max_points = env('MAX_POINTS', 5000);
        
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
        $data['max_points'] = $max_points;
        return $data;
    }
}
