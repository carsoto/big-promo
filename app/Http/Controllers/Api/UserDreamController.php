<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserDream;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class UserDreamController extends Controller
{
    public function store(Request $request)
    {
        /*$data = new UserDream;
        $data->user_id = auth()->user()->id;

        if ($request->hasFile('file'))
        {
            $file = $request->file->store('public');

            $dream = $request->file('file')->store('videos', ['disk' => 'videos']);
            $data->dream = "/".$dream;
        }

        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Sueño registrado exitosamente',
            'data'    => [],
        ], 200);*/

        $data = new UserDream;
        $data->user_id = auth()->user()->id;

        $file = tap($request->file('video'))->store('local');
        $filename = pathinfo($file->hashName(), PATHINFO_FILENAME);

        FFMpeg::fromDisk('local')->open('videos/'.$file->hashName())->export()->toDisk('local')->inFormat(new \FFMpeg\Format\Video\x264('libmp3lame', 'libx264'))->save('converted_videos/'.$filename.'.mp4');
        $data->dream = "/converted_videos/".$filename.".mp4";

        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Sueño registrado exitosamente',
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
