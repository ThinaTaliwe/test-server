<?php

require __DIR__ . '/vendor/autoload.php';

use App\WebSockets\ChatServer;
use Ratchet\App;
use Illuminate\Support\Facades\Log;

$server = new App('192.168.1.8', 8080);
$server->route('/chat', new ChatServer, ['*']);
echo('/chat. Web server running...');
$server->run();