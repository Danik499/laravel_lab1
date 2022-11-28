<?php

namespace App\Bot\Commands;

use App\Models\Chat;
use App\Models\ChatParticipant;
use Telegram\Bot\Commands\Command;
use Illuminate\Support\Facades\DB;

class GenerateCommand extends Command
{

    protected $name = "generate";

    protected $description = "Generate Command to select coffee pairs";

    public function handle()
    {
        $telegramUpdate = $this->getUpdate();
        $telegramChat = $telegramUpdate->getChat();

        $participantsNumber = DB::table('chat_participants')
                                    ->where('chat_id', '=', $telegramChat->id)
                                    ->count();

        if($participantsNumber >= 2) {
            $participants =  Chat_Participant::getRandomPairs($telegramChat->id);

            $text = "";

            for ($i = 0; $i < count($pairs); $i++) {
                $text .= "Pair №" . $i . ":";
                for ($j = 0; $j < count($pairs($i)); $j++) {
                    $text .= $pairs[$i][$j] . ". ";
                }
                $text .= "\n";
            }

            $this->replyWithMessage(['text' => $text]);
        } else {
            $this->replyWithMessage(['text' => "Number of participants is not enough. There has to be at least 2."]);
        }

    }
}
