<?php
require './vendor/autoload.php';

use Monolog\Handler\StdoutHandler;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Create the logger
$logger = new Logger('my_logger');
// Now add some handlers
$logger->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::DEBUG));

$config = \Kafka\ProducerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList('localhost:9092');
$config->setBrokerVersion('1.0.0');
$config->setRequiredAck(1);
$config->setIsAsyn(false);
$config->setProduceInterval(90000);

$producer = new \Kafka\Producer(
    function() {
        return [
            [
                'topic' => 'test',
                'value' => '200.141.167.99',
                'key' => 'testkey'
            ],
        ];
    }
);
$producer->setLogger($logger);
$producer->success(function($result) {
	var_dump($result);
    echo "ok";
});
$producer->error(function($errorCode) {
		var_dump($errorCode);
        echo "erro";
});
$producer->send(true);