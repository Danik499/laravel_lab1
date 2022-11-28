<?php

namespace App\Bot\Commands;

use App\Models\Chat;
use App\Models\ChatParticipant;
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

        Chat::unregisterChat($telegramChat->id);

        ChatParticipant::unregisterMember($telegramUser->id);

        $this->replyWithMessage(['text' => 'Done']);

    }
}
