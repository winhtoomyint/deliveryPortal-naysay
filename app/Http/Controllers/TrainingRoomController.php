<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Models\Showplaylist;
use App\Models\Video;
use Illuminate\Support\Facades\DB;

class TrainingRoomController extends Controller
{
    public function index()
    {
        $showplaylists = Showplaylist::first();
        if($showplaylists != null){
            $playlistname = $showplaylists->playlist->name;        
            $videos = Video::query()
                    ->where('playlist_id', '=', $showplaylists->id)
                    ->get();
        }else{
            $playlistname ='';
            $videos = [];
        }
        return view('TrainingRoom.index', compact('videos', 'playlistname'));
    }

    public function videoshow(Request $request)
    {
        $playvideos = Video::find($request->videoid);
        $showplaylists = Showplaylist::first();
        $playlistname = $showplaylists->playlist->name;
        
        $videos = Video::query()
            ->where('playlist_id', '=', $showplaylists->id)
            ->get();
        return view('TrainingRoom.videoshow',compact('videos','playlistname','playvideos'));
    }
}
