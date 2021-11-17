<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserDream;
use Illuminate\Http\Request;

class UserDreamController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file'))
        {
            $data = new UserDream;
            $data->user_id = auth()->user()->id;

            $file = $request->file->store('public');
            $extension = File::extension($file->getClientOriginalName(), $file->getMimetype());
            $dream = $request->file('file')->store('videos', ['disk' => 'videos']);
            $data->dream = "/".$dream.$extension;


            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('file')->storeAs('public/videos',$fileNameToStore);

            $data->dream = "/".$fileNameToStore;
            
            $data->save();
            return response()->json([
                'success' => true,
                'message' => 'Sueño registrado exitosamente',
                'data'    => [],
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Ocurrió un error registrando el sueño',
            'data'    => [],
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
