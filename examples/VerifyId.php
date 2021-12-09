<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$apiKey = "YOUR-X-API-KEY";
$baseUrl = "YOUR-API-ENDPOINT";

$client = new Yoonik\Face\Client\Face(
    $apiKey,
    $baseUrl
);

$payload = new Yoonik\Face\Model\VerifyIdRequest();
$payload->setTemplate("<TEMPLATE>");
$payload->setTemplateId("<TEMPLATE_ID>");
$payload->setGalleryId('<GALLERY_ID>');

 try {
    $result = $client->verifyId($payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FaceApi->verifyId: ', $e->getMessage(), PHP_EOL;
}

