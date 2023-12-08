<?php

namespace App\Telegram;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Illuminate\Support\Stringable;

class Handler extends WebhookHandler
{
    public function hello(): void
    {
        $this->reply('Приветствую тебя, друг!');
    }

    public function help(): void
    {
        $this->reply('Пока ничего не умею.');
    }

    public function handleUnknownCommand(Stringable $text): void
    {
        if ($text->value() === '/start') {
            $this->reply('Рад тебя видеть! Давай начнем пользоваться мной!');
        } else {
            $this->reply('Неизвестная команда');
        }
    }

    public function actions(): void
    {
        Telegraph::message('Выбери действие')
        ->keyboard(
            Keyboard::make()->buttons([
                Button::make('Перейти в гугл')->url('https://www.google.com'),
                Button::make('Поставить лайк')->action('like'),
                Button::make('Подписаться')->action('subscribe')->param('channel_name', '@traveling_peddler_bot'),
            ])
        )->send();
    }

    public function like(): void
    {
        $this->reply('Спасибо за лайк!');
    }

    public function subscribe(): void
    {
        $this->reply("Спасибо за подписку на {$this->data->get('channel_name')}!");
    }
}
