<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$apiKey = "YOUR-X-API-KEY";
$baseUrl = "YOUR-API-ENDPOINT";

$client = new Yoonik\Face\Client\Face(
    $apiKey,
    $baseUrl
);

$payload = new Yoonik\Face\Model\ProcessRequest();

//convert image to base64
$im = file_get_contents("<IMAGE_PATH>");
$imdata = base64_encode($im);
$payload->setImage($imdata);

 try {
    $result = $client->process($payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FaceApi->process: ', $e->getMessage(), PHP_EOL;
}

