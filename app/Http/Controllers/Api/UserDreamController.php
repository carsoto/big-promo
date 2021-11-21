<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserDream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use FFMpeg;
use FFMpeg\Filters\Video\VideoFilters;



class UserDreamController extends Controller
{
    public function store(Request $request)
    {
        set_time_limit(0);
        /*$data = new UserDream;
        $data->user_id = auth()->user()->id;

        if ($request->hasFile('video'))
        {
            $file = $request->file->store('public');

            $dream = $request->file('video')->store('videos', ['disk' => 'videos']);
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

        $file = tap($request->file('video'))->store('videos', ['disk' => 'videos']);
        $filename = pathinfo($file->hashName(), PATHINFO_FILENAME);
        

        FFMpeg::fromFilesystem(Storage::disk('videos'))->open('videos/'.$file->hashName())->export()->toDisk('videos')->inFormat(new \FFMpeg\Format\Video\X264('libmp3lame', 'libx264'))->save('converted/'.$filename.'.mp4');
        $data->dream = '/converted/'.$filename.'.mp4';

        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Sueño registrado exitosamente',
            'data'    => [],
        ], 200);
    }

    public function saveVideo(Request $request) {
        $filename = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('videos'), $filename);
        
        $data = new UserDream;
        $data->user_id = auth()->user()->id;
        $data->dream = '/videos/'.$filename;
        $data->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Sueño registrado exitosamente',
            'data'    => $request->all(),
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
