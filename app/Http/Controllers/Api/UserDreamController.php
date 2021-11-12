<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserDream;
use Illuminate\Http\Request;

class UserDreamController extends Controller
{
    public function store(Request $request)
    {
        $data = new UserDream;
        $data->user_id = auth()->user()->id;

        if ($request->hasFile('dream'))
        {
            $file = $request->file->store('public/documents');

            $dream = $request->file('dream')->store('videos', ['disk' => 'videos']);
            $data->path = $dream;
            $data->dream = $dream;
            $data->title = $dream;
        }

        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Sueño registrado exitosamente',
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
        $data = auth()->user()->user_dreams;
        return response()->json([
            'success' => true,
            'message' => '',
            'data'    => $data,
        ], 200);
    }
}
