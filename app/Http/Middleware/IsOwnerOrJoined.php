<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Joined;
use App\Models\Room;

class IsOwnerOrJoined
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $owner = Room::firstWhere([["user_id", Auth::id()], ["id", $request->route('id')]]);
        $joined = Joined::firstWhere([["user_id", Auth::id()], ["room_id", $request->route('id')]]);

        if ($owner || $joined) {
            return $next($request);
        }

        abort('403');
    }
}
