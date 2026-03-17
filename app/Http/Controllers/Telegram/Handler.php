<?php

namespace App\Http\Controllers\Telegram;

use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\Cast\Void_;

class Handler extends WebhookHandler
{

    public function hello(string $text): void
    {
        $this->reply("На курточке надпись $text");
    }

    protected function handleUnknownCommand(\Stringable $text): void
    {
        if($text->value === "/start"){
            $this->reply("Трудное начало");
        } else {
            $this->reply("Не пойму, о чём речь");
        }
    }

    protected function handleChatMessage(\Stringable $message): void
    {
        Log::info(json_encode($this->message->toArray()));
    }

    public function random(): void
    {
        $randomPhrase = collect(__('messages'))->random();
        $this->reply($randomPhrase);
    }

    public function end(): Void
    {
        $isDead = collect(['Умер в конце фильма', "Да не умер он в конце фильма!"])->random();
        $this->reply($isDead);
    }
}