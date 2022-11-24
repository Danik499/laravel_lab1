<?php
namespace App\Bot\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class UnregisterCommand extends Command
{
    /* @var string Command Name
     */
    protected $name = "unregister";

    /* @var string Command Description
     */
    protected $description = "Unregister from Random Coffee";

    /**
     * @inheritdoc
     */
    public function handle()
    {
        $this->replyWithMessage(['text' => 'You are unregistered from Random Coffee']);
    }
}
