<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chat_Participant extends Model
{
    public function chats()
    {
        return $this->belongsTo(Chat::class);
    }

    public static function registerMember($participant_id, $first_name, $last_name, $chat_id)
    {
        DB::table('chat_participants')->insert([
            'participant_id' => $participant_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'chat_id' => $chat_id
        ]);
    }

    public static function unregisterMember($participant_id)
    {
        DB::table('chat_participants')->where('participant_id', '=', $participant_id)->delete();
    }

    public static function getRandomPairs($chat_id)
    {
        $participants = DB::table('chat_participants')
                            ->where('chat_id', '=', $chat_id)
                            ->inRandomOrder()
                            ->get();

        $pairs = [];

        for ($i = 1; $i < count($participants); $i += 2) {
            array_push($pairs, [$participants[$i-1], $participants[$i]]);
        }

        if (count($participants) % 2 != 0) {
            array_push($pairs[count($pairs) - 1], end($participants));
        }

        return $pairs;
    }
}
