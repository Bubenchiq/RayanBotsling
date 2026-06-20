<?php

namespace App\Console\Commands;

use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Console\Command;

class SendTelegramMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:telegram-message
                            {--chatId=}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @return void
     */
    public function handle(): void
    {
        $chat = TelegraphChat::find(
            $this->option('chatId')
        );

        if (!$chat) {
            $this->error('ChatId not found');
            return;
        }

        $chat->message('Давно не видели тебя в уличных гонках!')->send();
        $this->info('Message sent!');
    }
}
