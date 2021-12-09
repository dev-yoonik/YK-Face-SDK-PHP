<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$apiKey = "YOUR-X-API-KEY";
$baseUrl = "YOUR-API-ENDPOINT";

$client = new Yoonik\Face\Client\Face(
    $apiKey,
    $baseUrl
);

try {
    $result = $client->deleteTemplateToGallery('<GALLERY_ID>', '<PERSON_ID>');
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FaceApi->deleteTemplateToGallery: ', $e->getMessage(), PHP_EOL;
}
