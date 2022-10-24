<?php

namespace Yoonik\Face\Client\Configurations;

use ArrayObject;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Yoonik\Face\Client\Configurations\ApiException;
use Yoonik\Face\Client\Configurations\Configuration;
use Yoonik\Face\Client\Configurations\HeaderSelector;
use Yoonik\Face\Client\Configurations\ObjectSerializer;


class ClientSetup
{

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var ApiKey
     */
    protected $apiKey;

    /**
     * JSON append to all body's requests
     * 
     * @var ConfigBody
     */
    protected $configBody;

    /**
     * @param String   $apiKey
     * @param String   $host
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        $apiKey,
        $host
    ) {
        $this->client = new Client();
        $this->config = new Configuration();
        $this->headerSelector = new HeaderSelector();
        $this->apiKey = $apiKey;
        $this->config->setHost($host);
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Send request
     *
     * @param  \GuzzleHttp\Psr7\Request $request (required)
     * @param  String $returnModel (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Yoonik\Face\Model\MatchingResult
     */
    protected function request($request, $returnModel)
    {
        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $this->checkStatusCode($response, $request->getUri());

            $responseBody = $response->getBody();

            $content = $responseBody->getContents();
            if ($returnModel !== 'string') {
                $content = json_decode($content);
            }



            return [
                ObjectSerializer::deserialize($content, $returnModel, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        $returnModel,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Check Response Status
     *
     * @param  $response (required)
     * @param  String $uri (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @return void
     */
    protected function checkStatusCode($response, $uri)
    {
        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf(
                    '[%d] Error connecting to the API (%s)',
                    $statusCode,
                    $uri
                ),
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        }
    }


    /**
     * Prepare request
     *
     * @param  $payload (required)
     * @param  String $path endpoint (required)
     * @param  String $method endpoint (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function prepareRequest($payload, $path, $method)
    {

        $resourcePath = $path;
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';


        // body params
        if (isset($payload)) {
            $httpBody = $payload;
        }

        $headers = $this->headerSelector->selectHeaders(
            ['Content-Type'],
            ['application/json']
        );

        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass) {
            $httpBody = json_encode($httpBody);
        }
        // array has no __toString(), so we should encode it manually
        if (is_array($httpBody)) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($httpBody));
        }

        if ($this->configBody) {
            $arr = json_decode($httpBody, TRUE);
            foreach ($this->configBody as $key => $value) {
                $arr[$key] = $value;
            }
            $httpBody = json_encode($arr);
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
            $defaultHeaders['x-api-key'] = $this->apiKey;
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = http_build_query($queryParams);
        return new Request(
            $method,
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Check input parameters
     *
     * @throws \InvalidArgumentException
     * @return void
     */
    protected function checkParameters($input, $varname)
    {
        // verify the required parameter 'input' is set
        if ($input === null || (is_array($input) && count($input) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $' . $varname . ' when calling ' . debug_backtrace()[1]['function']
            );
        }
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }

    /**
     * Add json to body request
     *
     * @return array of http client options
     */
    public function addJSONtoBody($json)
    {
        $this->configBody = $json;
    }
}
