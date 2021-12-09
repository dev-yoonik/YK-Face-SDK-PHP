<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$apiKey = "YOUR-X-API-KEY";
$baseUrl = "YOUR-API-ENDPOINT";

$client = new Yoonik\Face\Client\Face(
    $apiKey,
    $baseUrl
);

$payload = new Yoonik\Face\Model\TemplateRequest();
$payload->setTemplate("<TEMPLATE>");

try {
    $result = $client->addTemplateToGallery('<GALLERY_ID>', '<PERSON_ID>', $payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FaceApi->addTemplateToGallery: ', $e->getMessage(), PHP_EOL;
}
