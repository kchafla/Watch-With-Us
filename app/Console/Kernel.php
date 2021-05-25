<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Models\Room;
use App\Models\Video;
use App\Models\Chat;
use App\Models\Message;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $salas = collect(Room::get());
            $salas->each(function ($room) {
                $videos = Video::where("room_id", $room->id)->orderByDesc("id")->get();
                if ($videos->first()) {
                    $videos = $videos->diff($videos->take(20));
                    foreach ($videos->pluck("id") as $key => $id) {
                        Video::where("id", $id)->delete();
                    }
                }
            });

            $chats = collect(Chat::get());
            $chats->each(function ($chat) {
                $mensajes = Message::where("chat_id", $chat->id)->orderByDesc("id")->get();
                if ($mensajes->first()) {
                    $mensajes = $mensajes->diff($mensajes->take(20));
                    foreach ($mensajes->pluck("id") as $key => $id) {
                        Message::where("id", $id)->delete();
                    }
                }
            });
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
