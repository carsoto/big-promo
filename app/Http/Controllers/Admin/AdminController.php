<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserExchange;
use App\Models\Canton;
use DB;

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

    public function dashboard()
    {
        //Número de registros diarios
        $daily_user_records = DB::table('users')->select(DB::raw('DATE(created_at) as fecha'), DB::raw('COUNT(*) AS cantidad'))->groupBy('fecha')->get();
        
        //Total de usuarios
        $total_users = User::all()->count();

        //Número de registros confirmados
        $users_confirmed = User::where('confirmed', true)->count();

        //Número de personas que han canjeado tapas
        $exchanges = UserExchange::all()->count();

        //Número de personas que completaron los puntos y de estos cuántos subieron el video
        
        //Qué formatos han canjeado
        $format_exchanges = DB::table('user_exchanges')->select('bot_presentation', DB::raw('COUNT(*) AS cantidad'))->groupBy('bot_presentation')->orderBy('bot_presentation', 'asc')->pluck('cantidad', 'bot_presentation')->toArray();

        //De qué ciudades están participando
        $participating_cities = DB::table('users')
            ->join('cantons', 'cantons.id', '=', 'users.city_id')
            ->select('cantons.name', 'users.city_id', DB::raw('count(*) as cantidad'))
            ->groupBy('users.city_id')
            ->get();

        $data['daily_user_records'] = $daily_user_records;
        $data['total_users'] = $total_users;
        $data['users_confirmed'] = $users_confirmed;
        $data['exchanges'] = $exchanges;
        $data['format_exchanges'] = $format_exchanges;
        $data['participating_cities'] = $participating_cities;
        $data['bot_presentation'] = ['1' => 300, '2' => 911, '3' => 1800, '4' => 2250, '5' => 3050];

        return view('admin.dashboard.index', ['data' => $data]);
    }

    public function usersIndex()
    {
        $users = User::where('is_admin', false)->get();
 
        return view('admin.users.index', ['users' => $users]);
    }

    public function userDetails($id)
    {
        $user = User::find($id);
        return view('admin.users.details', ['user' => $user]);
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
