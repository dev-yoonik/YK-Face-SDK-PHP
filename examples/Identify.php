<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$apiKey = "YOUR-X-API-KEY";
$baseUrl = "YOUR-API-ENDPOINT";

$client = new Youverse\Face\Client\Face(
    $apiKey,
    $baseUrl
);

$payload = new Youverse\Face\Model\IdentifyRequest();
$payload->setTemplate("<TEMPLATE>");
$payload->setCandidateListLength(1);
$payload->setMinimumScore(0.6);
$payload->setGalleryId('<GALLERY_ID>');

 try {
    $result = $client->identify($payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FaceApi->identify: ', $e->getMessage(), PHP_EOL;
}

