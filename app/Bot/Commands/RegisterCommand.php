<?php
namespace App\Bot\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class RegisterCommand extends Command
{
    /* @var string Command Name
     */
    protected $name = "register";

    /* @var string Command Description
     */
    protected $description = "Register to Random Coffee";

    /**
     * @inheritdoc
     */
    public function handle()
    {
        $telegramUpdate = $this->getUpdate();
        $telegramChat = $telegramUpdate->getChat();
        $telegramUser = $this->getMessage()->from;
        $this->replyWithMessage(['text' => 'You are registered to Random Coffee - '.$telegramChat]);
    }
}
