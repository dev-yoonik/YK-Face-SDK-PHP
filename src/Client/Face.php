<?php

/**
 * Face
 * PHP version 5
 *
 * @category Class
 * @package  Yoonik\Face
 * @author   Yoonik dev
 * @link     https://github.com/dev-yoonik/YK-Face-SDK-PHP
 */

/**
 * YooniK.Face API
 *
 * Functionalities for biometric processing (detection, verification and identification) for YooniK.Face.
 *
 */

namespace Yoonik\Face\Client;

use Yoonik\Face\Client\Configurations\ClientSetup;
use Yoonik\Face\Client\Configurations\ObjectSerializer;
use \Yoonik\Face\Model\ProcessRequest;
use \Yoonik\Face\Model\VerifyRequest;

/**
 * Face Class 
 *
 * @category Class
 * @package  Yoonik\Face
 * @author   Yoonik dev
 * @link     https://github.com/dev-yoonik/YK-Face-SDK-PHP
 */
class Face extends ClientSetup
{

    /**
     * Operation verify
     *
     * Compares two descriptors and outputs a similarity score
     *
     * @param  \Yoonik\Face\Model\VerifyRequest $payload payload (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Yoonik\Face\Model\MatchingResult
     */
    public function verify($payload)
    {
        $this->checkParameters($payload,'payload');

        $returnModel = '\Yoonik\Face\Model\MatchingResult';
        $request = $this->prepareRequest($payload, '/face/verify', 'POST');

        list($response) = $this->request($request, $returnModel);
        return $response;
    }

    /**
     * Operation verifyImages
     *
     * Given an image and a set of configuration parameters and minimal set of parameters return an array of Yoonik biometric object
     *
     * @param  \Yoonik\Face\Model\VerifyImages $payload payload (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Yoonik\Face\Model\MatchingResult
     */
    public function verifyImages($payload)
    {
        $this->checkParameters($payload,'payload');

        $process_payload = new ProcessRequest();
        $process_payload->setImage($payload->getFirstImage());
        $template1 = $this->process($process_payload);

        $process_payload->setImage($payload->getSecondImage());
        $template2 = $this->process($process_payload);

        $payload = new VerifyRequest();
        $payload->setFirstTemplate($template1[0]->getTemplate());
        $payload->setSecondTemplate($template2[0]->getTemplate());

        $returnModel = '\Yoonik\Face\Model\MatchingResult';
        $request = $this->prepareRequest($payload, '/face/verify', 'POST');

        list($response) = $this->request($request, $returnModel);
        return $response;
    }

    /**
     * Operation process
     *
     * Given an image and a set of configuration parameters return an array of Yoonik biometric object
     *
     * @param  \Yoonik\Face\Model\ProcessRequest $payload payload (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Yoonik\Face\Model\ProcessResponse
     */
    public function process($payload)
    {
        $this->checkParameters($payload,'payload');

        $returnModel = '\Yoonik\Face\Model\ProcessResponse';
        $request = $this->prepareRequest($payload, '/face/process', 'POST');

        list($response) = $this->request($request, $returnModel);
        return $response;
    }
    
    /**
     * Operation identify
     *
     * Search an identification template against the enrollment set of a specified gallery
     *
     * @param  \Yoonik\Face\Model\IdentifyRequest $payload payload (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Yoonik\Face\Model\CandidatesSchema
     */
    public function identify($payload)
    {
        $this->checkParameters($payload,'payload');

        $returnModel = '\Yoonik\Face\Model\CandidatesSchema';
        $request = $this->prepareRequest($payload, '/face/identify', 'POST');

        list($response) = $this->request($request, $returnModel);
        return $response;
    }

    /**
     * Operation verifyId
     *
     * Match template with a specific id in a gallery
     *
     * @param  \Yoonik\Face\Model\VerifyIdRequest $payload payload (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Yoonik\Face\Model\MatchingResult
     */
    public function verifyId($payload)
    {
        $this->checkParameters($payload,'payload');

        $returnModel = '\Yoonik\Face\Model\MatchingResult';
        $request = $this->prepareRequest($payload, '/face/verify_id', 'POST');

        list($response) = $this->request($request, $returnModel);
        return $response;
    }

    /**
     * Operation addGallery
     *
     * Add specified gallery
     *
     * @param  string $gallery_id Gallery name or identifier. (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function addGallery($gallery_id)
    {
        $this->checkParameters($gallery_id,'gallery_id');
        
        //encode
        $gallery_id=ObjectSerializer::toPathValue($gallery_id);

        $request = $this->prepareRequest(null, '/gallery/'.$gallery_id, 'POST');

        list($response) = $this->request($request, '');
        return $response;
    }

    /**
     * Operation getGallery
     *
     * List all enroled ids in a gallery
     *
     * @param  string $gallery_id Gallery name or identifier. (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of strings
     */
    public function getGallery($gallery_id)
    {
        $this->checkParameters($gallery_id,'gallery_id');
        
        //encode
        $gallery_id=ObjectSerializer::toPathValue($gallery_id);
        $returnType = 'string';
        $request = $this->prepareRequest(null, '/gallery/'.$gallery_id, 'GET');

        list($response) = $this->request($request, $returnType);
        return $response;
    }

    /**
     * Operation deleteGallery
     *
     * Remove specified gallery
     *
     * @param  string $gallery_id Gallery name or identifier. (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteGallery($gallery_id)
    {
        $this->checkParameters($gallery_id,'gallery_id');

        //encode
        $gallery_id=ObjectSerializer::toPathValue($gallery_id);
        $request = $this->prepareRequest(null, '/gallery/'.$gallery_id, 'DELETE');

        list($response) = $this->request($request, '');
        return $response;
    }

    /**
     * Operation addTemplateToGallery
     *
     * Insert a template into a gallery
     *
     * @param  string $gallery_id Gallery name or identifier. (required)
     * @param  string $person_id Person id (required)
     * @param  \Yoonik\Face\Model\TemplateRequest $payload payload (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function addTemplateToGallery($gallery_id, $person_id, $payload)
    {
        $this->checkParameters($gallery_id,'gallery_id');
        $this->checkParameters($person_id,'person_id');
        $this->checkParameters($payload,'payload');
        
        //encode
        $gallery_id=ObjectSerializer::toPathValue($gallery_id);
        $person_id=ObjectSerializer::toPathValue($person_id);
        $request = $this->prepareRequest($payload, "/gallery/$gallery_id/$person_id", 'POST');

        list($response) = $this->request($request, '');
        return $response;
    }

    /**
     * Operation getTemplateToGallery
     *
     * Get a template from a gallery
     *
     * @param  string $gallery_id Gallery name or identifier. (required)
     * @param  string $person_id Person id (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Yoonik\Face\Model\TemplateRequest
     */
    public function getTemplateToGallery($gallery_id, $person_id)
    {
        $this->checkParameters($gallery_id,'gallery_id');
        $this->checkParameters($person_id,'person_id');
        
        //encode
        $gallery_id=ObjectSerializer::toPathValue($gallery_id);
        $person_id=ObjectSerializer::toPathValue($person_id);
        $returnType = '\Yoonik\Face\Model\TemplateRequest';
        $request = $this->prepareRequest(null, "/gallery/$gallery_id/$person_id", 'GET');

        list($response) = $this->request($request, $returnType);
        return $response;
    }

    /**
     * Operation deleteTemplateGalleryManagementResource
     *
     * Remove a specific template from a gallery
     *
     * @param  string $gallery_id Gallery name or identifier. (required)
     * @param  string $person_id Person id (required)
     *
     * @throws \Yoonik\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteTemplateToGallery($gallery_id, $person_id)
    {
        $this->checkParameters($gallery_id,'gallery_id');
        $this->checkParameters($person_id,'person_id');
        
        //encode
        $gallery_id=ObjectSerializer::toPathValue($gallery_id);
        $person_id=ObjectSerializer::toPathValue($person_id);
        $request = $this->prepareRequest(null, "/gallery/$gallery_id/$person_id", 'DELETE');

        list($response) = $this->request($request, '');
        return $response;
    }
}
