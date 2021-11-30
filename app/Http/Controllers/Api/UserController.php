<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
 
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function confirmUser(Request $request) {
        $data = $request->all();
        $user = User::find($data['user_id']);
        $user->confirmed = true;
        if($user->save()) {
            Mail::send('emails.users.email_confirmed', $data, function($message) use ($data, $user) {
                $message->to($user->email, $user->fullName())->subject('Tu usario fue confirmado');
            });
        }
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function confirmAll() {
        $users = User::where('confirmed', false)->get();
        
        foreach($users AS $key => $user) {
            $user->confirmed = true;
            if($user->save()) {
                Mail::send('emails.users.email_confirmed', $data, function($message) use ($data, $user) {
                    $message->to($user->email, $user->fullName())->subject('Tu usario fue confirmado');
                });
            }    
        }
        return response()->json([
            'success' => true,
            'data' => []
        ], 200);
    }
}
