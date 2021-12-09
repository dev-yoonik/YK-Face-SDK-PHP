![https://yk-website-images.s3.eu-west-1.amazonaws.com/LogoV4_TRANSPARENT.png](https://yk-website-images.s3.eu-west-1.amazonaws.com/LogoV4_TRANSPARENT.png)

# YooniK Face API Client SDK PHP

[![License](https://img.shields.io/github/license/dev-yoonik/YK-Face-SDK-PHP)](https://github.com/dev-yoonik/YK-Face-SDK-PHP/blob/master/LICENSE)
[![Version](https://img.shields.io/packagist/v/yoonik/face-api)](https://packagist.org/packages/yoonik/face-api)

This repository implements an integration SDK to facilitate the consumption of the YooniK.Face API, an [YooniK Services](https://yoonik.me) offering.

For more information please [contact us](mailto:tech@yoonik.me).

## Requirements

PHP 5.5 and later

## Getting Started

```
composer require yoonik/face-api
```

## Example

Verifies the faces similarity between two images in base 64

```php
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

If you're interested in using YooniK.Face API for identification purposes, please visit our [examples](https://github.com/dev-yoonik/YK-Face-SDK-PHP/tree/main/examples).