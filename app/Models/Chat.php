<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Chat extends Model
{
    use HasFactory;

    public function chatParticipants () {
        return $this->hasMany(ChatParticipant::class);
    }

    public static function registerChat($chat_id)
    {
        DB::table('chats')->insert([
            'chat_id' => $chat_id
        ]);
    }

    public static function unregisterChat($chat_id)
    {
        DB::table('chats')->where('chat_id', '=', $chat_id)->delete();
    }
}
