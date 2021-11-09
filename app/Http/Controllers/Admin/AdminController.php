<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function usersIndex()
    {
        $users = User::where('type', 'user')->get();
 
        return view('admin.users.index', ['users' => $users]);
    }

    public function dreamsIndex()
    {
        //$users = User::where('type', 'user')->get();
 
        return view('admin.dreams.index', ['dreams' => []]);
    }

    public function dreamsDetails($date)
    {
        return view('admin.dreams.details', ['date' => $date]);
    }
}
