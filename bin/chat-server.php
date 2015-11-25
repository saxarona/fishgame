<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\Http\OriginCheck;
use MyApp\Server;

$myIP = '192.168.1.79'; //Change to match your server IP address

require dirname(__DIR__) . '/vendor/autoload.php';

$checkedApp = new OriginCheck(new WsServer(new Server()), array($myIP));
$checkedApp->allowedOrigins[] = 'localhost';

$server = IoServer::factory(new HttpServer($checkedApp), 8080);
$server->run();
?>