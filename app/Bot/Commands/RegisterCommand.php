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
        $this->replyWithMessage(['text' => 'You are registered']);

        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);
    }
}
