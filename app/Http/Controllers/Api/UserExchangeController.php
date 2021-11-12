<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserExchange;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserExchangeRequest;

class UserExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserExchangeRequest $request)
    {
        $aditional_points = rand(0,1);
        $aditional = 0;

        if($aditional_points){
            if($this->quote_aditional_points())
                $aditional = $request->bot_presentation;
        }

        $user_exchange = UserExchange::create([
            'user_id' => auth()->user()->id,
            'bot_presentation' => $request->bot_presentation,
            'code' => $request->code,
            'points' => $request->bot_presentation,
            'aditional_points' => $aditional
        ]);

        $accumulated = auth()->user()->user_exchanges->sum('points') + auth()->user()->user_exchanges->sum('aditional_points');
        
        $user_exchange->save();
        $data['points'] = $user_exchange->points;
        $data['aditional_points'] = $user_exchange->aditional_points;
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

        return response()->json([
            'success' => true,
            'message' => 'Código registrado exitosamente',
            'data'    => $data,
        ], 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserExchange  $userExchange
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = auth()->user()->user_exchanges;
        return response()->json([
            'success' => true,
            'message' => '',
            'data'    => $data,
        ], 200);
    }

    private function quote_aditional_points(){
        $quote = UserExchange::where('aditional_points', '>', 0)->get()->count();
        $max_points_aditional = env('MAX_QUOTE', 1000000);
        if($quote < $max_points_aditional){
            return true;
        }
        return false;
    }
}