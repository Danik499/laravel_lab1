<?php
namespace App\Bot\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class GenerateCommand extends Command
{
    /* @var string Command Name
     */
    protected $name = "generate";

    /* @var string Command Description
     */
    protected $description = "Generate list with pairs";

    /**
     * @inheritdoc
     */
    public function handle()
    {
        $this->replyWithMessage(['text' => 'Generating...']);
    }
}
