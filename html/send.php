<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('10.5.0.10', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('Integration', false, false, false, false);
$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'Integration');

echo " [x] Sent 'Hello World!'\n";
