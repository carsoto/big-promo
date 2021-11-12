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

    public function videosGalery()
    {
        return view('user.videos');
    }

    public function exchange()
    {
        // dd(auth()->user());
        return view('user.exchange');
    }

    public function fq()
    {
        return view('user.fq');
    }

    public function history()
    {
        return view('user.history');
    }
}
