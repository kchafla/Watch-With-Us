<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Events\NewVideoNotification;

class VideoController extends Controller
{
    public function newvideo(Request $request, $id)
    {
        $last = Video::where('room_id', $id)->orderByDesc('id')->first();

        $video = new Video;
        $video->setAttribute("room_id", $id);
        $video->setAttribute("user_id", Auth::id());
        $video->setAttribute("title", $request->title);
        $video->setAttribute("link", $request->link);

        if (!$last || $last->link != $request->link) {
            $video->save();
        }

        event(new NewVideoNotification($video));

        return back();
    }

    public function recovervideo($id)
    {
        $videos = Video::where("room_id", $id)->orderByDesc('id')->get();
        $users = User::get();

        $data["videos"] = array();
        $data["users"] = array();

        for ($n=0; $n < count($videos); $n++) {
            $video = $videos[$n];
            foreach ($users as $key => $value) {
                if ($value->id == $video->user_id) {
                    $user = $value;
                }
            }

            array_unshift($data["videos"], $video);
            array_unshift($data["users"], $user);
        }      

        return $data;
    }
}
