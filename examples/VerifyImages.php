<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$apiKey = "YOUR-X-API-KEY";
$baseUrl = "YOUR-API-ENDPOINT";
$image1 = "<IMAGE_PATH>";
$image2 = "<IMAGE_PATH>";

$client = new Yoonik\Face\Client\Face(
    $apiKey,
    $baseUrl
);

$payload = new Yoonik\Face\Model\VerifyImages();

//convert image to base64
$img = file_get_contents($image1);
$imgdata = base64_encode($img);
$payload->setFirstImage($imgdata);

$img = file_get_contents($image2);
$imgdata = base64_encode($img);
$payload->setSecondImage($imgdata);

try {
    $result = $client->verifyImages($payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FaceApi->verifyImages: ', $e->getMessage(), PHP_EOL;
}
