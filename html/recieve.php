<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('10.5.0.10', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('Integration', false, false, false, false);

echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";

$callback = function($msg) {
  echo " [x] Received ", $msg->body, "\n";
};

$channel->basic_consume('Integration', '', false, true, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}
