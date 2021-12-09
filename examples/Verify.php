<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$apiKey = "YOUR-X-API-KEY";
$baseUrl = "YOUR-API-ENDPOINT";

$client = new Yoonik\Face\Client\Face(
    $apiKey,
    $baseUrl
);

$payload = new Yoonik\Face\Model\VerifyRequest();
$payload->setFirstTemplate("<TEMPLATE>");
$payload->setSecondTemplate("<TEMPLATE>");
 try {
    $result = $client->verify($payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FaceApi->verify: ', $e->getMessage(), PHP_EOL;
}

