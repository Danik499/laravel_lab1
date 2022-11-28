<?php

namespace App\Bot\Commands;

use App\Models\Chat;
use App\Models\Chat_Participant;
use Telegram\Bot\Commands\Command;
use Illuminate\Support\Facades\DB;

class UnregisterCommand extends Command
{

    protected $name = "unregister";

    protected $description = "Unregister Command to remove you from RandomCoffee";

    public function handle()
    {
        $telegramUpdate = $this->getUpdate();
        $telegramChat = $telegramUpdate->getChat();
        $telegramUser = $telegramUpdate->getMessage()->from;

        try {

            Chat::unregisterChat($telegramChat->id);

            Chat_Participant::unregisterMember($telegramUser->id);

            $this->replyWithMessage(['text' => 'Done']);
        } catch (\Exception $exception) {
            $this->replyWithMessage(['text' => "Oops... Something went wrong. {$exception->getMessage()}"]);
        }

    }
}
