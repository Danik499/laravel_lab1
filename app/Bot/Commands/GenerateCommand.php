<?php

namespace App\Bot\Commands;

use App\Models\Chat;
use App\Models\Chat_Participant;
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

        if($participantsNumber >= 2)
            try {
                Chat_Participant::getRandomPairs($telegramChat->id);

                $this->replyWithMessage(['text' => 'Done']);
            } catch (\Exception $exception) {
                $this->replyWithMessage(['text' => "Oops... Something went wrong. {$exception->getMessage()}"]);
            }
        else
            $this->replyWithMessage(['text' => "Number of participants is less than two"]);

    }
}
