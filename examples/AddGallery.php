<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$apiKey = "YOUR-X-API-KEY";
$baseUrl = "YOUR-API-ENDPOINT";

$client = new Youverse\Face\Client\Face(
    $apiKey,
    $baseUrl
);

try {
    $result = $client->addGallery('<GALLERY_ID>');
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FaceApi->addGallery: ', $e->getMessage(), PHP_EOL;
}
