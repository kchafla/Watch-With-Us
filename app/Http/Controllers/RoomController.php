<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Chat;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function newroom()
    {
        $sales = Room::where('user_id', Auth::id())->get();

        if (count($sales) < 6) {
            $room = new Room;
            $room->setAttribute("user_id", Auth::id());
            $room->setAttribute("name", "Sala");
            $room->setAttribute("token", bin2hex(random_bytes(16)));
            $room->save();

            $chat = new Chat;
            $chat->setAttribute("room_id", $room->id);
            $chat->setAttribute("token", bin2hex(random_bytes(8)));
            $chat->save();
        }

        return back();
    }
}
