<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\UserDream;

class UserDreamController extends Controller
{
    public function uploadDream(Request $request)
    {
        /*$this->validate($request, [
            'dream' => 'required|file|mimetypes:video/mp4',
        ]);*/

        $video = new UserDream;
        $video->user_id = auth()->user()->id;

        if ($request->hasFile('dream'))
        {
            //$path = $request->file('dream')->store('videos', ['disk' => 'bigpromo_dreams']);
            $video->dream = $request->dream;
        }

        if($video->save()) {
            return response()->json([
                'success' => true,
                'data' => [],
                'msg' => "Video guardado exitosamente"
            ], 200);    
        }
    }

    public function getDreams($type = 'user') {
        
        if($type == 'all'){
            $data = UserDream::all();    
        }else {
            $data = auth()->user()->dreams();
        }
        
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
}
