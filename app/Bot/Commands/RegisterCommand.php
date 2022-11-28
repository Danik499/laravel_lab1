<?php

namespace App\Bot\Commands;

use App\Models\Chat;
use App\Models\Chat_Participant;
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

        try {
            $chat = Chat::query()
                ->where('chat_id', '=', $telegramChat->id)
                ->get()
                ->first();

            if(!$chat)
                Chat::registerChat($telegramChat->id);

                Chat_Participant::registerMember(
                    $telegramUser->id,
                    $telegramUser->firstName,
                    $telegramUser->lastName,
                    $telegramChat->id
            );

            $this->replyWithMessage(['text' => 'Done']);
        } catch (\Exception $exception) {
            $this->replyWithMessage(['text' => "Oops... Something went wrong. {$exception->getMessage()}"]);
        }

}
}
