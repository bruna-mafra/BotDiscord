<?php

include __DIR__ . '/vendor/autoload.php';
include 'env.php';

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

$discord = new Discord([
    'token' => getenv('TOKEN_BOT'),
    'intents' => Intents::getDefaultIntents()
]);

$discord->on('ready', function (Discord $discord) {
    echo "Bot is ready!", PHP_EOL;

    $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
        if ($message->author->bot) {
            return;
        }
        $message->reply('O bot está respondendo esta mensagem');
    });
});

$discord->run();
