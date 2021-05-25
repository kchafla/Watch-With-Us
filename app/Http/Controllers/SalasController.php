<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Video;
use App\Models\Joined;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;


class SalasController extends Controller
{
    public function recoversalas() {
        $data["salas"] = array();
        $data["videos"] = array();

        $salas = Room::where("user_id", Auth::id())->get();
        
        foreach ($salas as $key => $sala) {
            $last = Video::where("room_id", $sala->id)->orderByDesc("id")->first();

            array_push($data["salas"], $sala);
            if ($last != null) {
                array_push($data["videos"], $last->link);
            } else {
                array_push($data["videos"], "E2sSvVCRI4s");
            }
        }

        $data["joinedsalas"] = array();
        $data["joinedvideos"] = array();

        $joined = Joined::where("user_id", Auth::id())->get();

        foreach ($joined as $key => $join) {
            $room = Room::where("id", $join->room_id)->first();
            $video = Video::where("room_id", $room->id)->orderByDesc("id")->first();

            array_push($data["joinedsalas"], $room);
            if ($video != null) {
                array_push($data["joinedvideos"], $video->link);
            } else {
                array_push($data["joinedvideos"], "jtyFdK2Y33s");
            }
        }

        return view("dashboard", $data);
    }
}
