![https://yk-website-images.s3.eu-west-1.amazonaws.com/LogoV4_TRANSPARENT.png](https://yk-website-images.s3.eu-west-1.amazonaws.com/LogoV4_TRANSPARENT.png)

# Youverse Face API Client SDK PHP

[![License](https://img.shields.io/github/license/dev-yoonik/YK-Face-SDK-PHP)](https://github.com/dev-yoonik/YK-Face-SDK-PHP/blob/master/LICENSE)
[![Version](https://img.shields.io/github/v/release/dev-yoonik/YK-Face-SDK-PHP?display_name=tag)](https://github.com/dev-yoonik/YK-Face-SDK-PHP)

This repository implements an integration SDK to facilitate the consumption of the Youverse.Face API, an [Youverse Services](https://youverse.id) offering.

For more information please [contact us](mailto:tech@youverse.id).

## Requirements

PHP 5.5 and later

## Getting Started

```
composer require youverse/face-api
```

## Example

Verifies the faces similarity between two images in base 64

```php
require dirname(__DIR__) . '/vendor/autoload.php';

$apiKey = "YOUR-X-API-KEY";
$baseUrl = "YOUR-API-ENDPOINT";
$image1 = "<IMAGE_PATH>";
$image2 = "<IMAGE_PATH>";

$client = new Youverse\Face\Client\Face(
    $apiKey,
    $baseUrl
);

$payload = new Youverse\Face\Model\VerifyImages();

//convert image 1 to base64
$img = file_get_contents($image1);
$imgdata = base64_encode($img);
$payload->setFirstImage($imgdata);

//convert image 2 to base64
$img = file_get_contents($image2);
$imgdata = base64_encode($img);
$payload->setSecondImage($imgdata);

try {
    $result = $client->verifyImages($payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FaceApi->verifyImages: ', $e->getMessage(), PHP_EOL;
}
```

If you're interested in using Youverse.Face API for identification purposes, please visit our [examples](https://github.com/dev-yoonik/YK-Face-SDK-PHP/tree/main/examples).