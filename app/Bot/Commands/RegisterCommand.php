<?php

namespace App\Bot\Commands;

use App\Models\Chat;
use App\Models\ChatParticipant;
use Telegram\Bot\Commands\Command;
use Illuminate\Support\Facades\DB;

class RegisterCommand extends Command
{

    protected $name = "register";

    protected $description = "Register Command to add you to Random Coffee";

    public function handle()
    {
        $telegramUpdate = $this->getUpdate();
        $telegramChat = $telegramUpdate->getChat();
        $telegramUser = $telegramUpdate->getMessage()->from;


        $chat = Chat::query()
            ->where('chat_id', '=', $telegramChat->id)
            ->get()
            ->first();

        if(!$chat)
            Chat::registerChat($telegramChat->id);

            ChatParticipant::registerMember(
                $telegramUser->id,
                $telegramUser->firstName,
                $telegramUser->lastName,
                $telegramChat->id
        );

        $this->replyWithMessage(['text' => 'Done']);

}
}
