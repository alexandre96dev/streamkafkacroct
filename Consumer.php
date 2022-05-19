<?php
require './vendor/autoload.php';
include_once('IpStack.php');

//$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
// Create the logger
$access_key = "1cc9fca0d7ee9e8ca26468cc9046a641";
$logger = new Logger('my_logger');
// Now add some handlers
$logger->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::DEBUG));

$config = \Kafka\ConsumerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(1000);
$config->setMetadataBrokerList('localhost:9092');
$config->setGroupId('test');
$config->setBrokerVersion('1.0.0');
$config->setTopics(['test']);
//$config->setOffsetReset('earliest');
$consumer = new \Kafka\Consumer();
$consumer->setLogger($logger);
$consumer->start(function($topic, $part, $message) {
	//var_dump($message["message"]["value"]);
    
    $ipstack = new IpStack();
    $ipstack->getGeoLocalization('http://api.ipstack.com/'.$message["message"]["value"].'?access_key=1cc9fca0d7ee9e8ca26468cc9046a641');
});