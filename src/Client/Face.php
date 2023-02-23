<?php

/**
 * Face
 * PHP version 5
 *
 * @category Class
 * @package  Youverse\Face
 * @author   Youverse dev
 * @link     https://github.com/dev-yoonik/YK-Face-SDK-PHP
 */

/**
 * Youverse.Face API
 *
 * Functionalities for biometric processing (detection, verification and identification) for Youverse.Face.
 *
 */

namespace Youverse\Face\Client;

use Youverse\Face\Client\Configurations\ClientSetup;
use Youverse\Face\Client\Configurations\ObjectSerializer;
use \Youverse\Face\Model\ProcessRequest;
use \Youverse\Face\Model\VerifyRequest;

/**
 * Face Class 
 *
 * @category Class
 * @package  Youverse\Face
 * @author   Youverse dev
 * @link     https://github.com/dev-yoonik/YK-Face-SDK-PHP
 */
class Face extends ClientSetup
{

    /**
     * Operation verify
     *
     * Compares two descriptors and outputs a similarity score
     *
     * @param  \Youverse\Face\Model\VerifyRequest $payload payload (required)
     *
     * @throws \Youverse\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Youverse\Face\Model\MatchingResult
     */
    public function verify($payload)
    {
        $this->checkParameters($payload,'payload');

        $returnModel = '\Youverse\Face\Model\MatchingResult';
        $request = $this->prepareRequest($payload, '/face/verify', 'POST');

        list($response) = $this->request($request, $returnModel);
        return $response;
    }

    /**
     * Operation verifyImages
     *
     * Given an image and a set of configuration parameters and minimal set of parameters return an array of Youverse biometric object
     *
     * @param  \Youverse\Face\Model\VerifyImages $payload payload (required)
     *
     * @throws \Youverse\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Youverse\Face\Model\MatchingResult
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

        $returnModel = '\Youverse\Face\Model\MatchingResult';
        $request = $this->prepareRequest($payload, '/face/verify', 'POST');

        list($response) = $this->request($request, $returnModel);
        return $response;
    }

    /**
     * Operation process
     *
     * Given an image and a set of configuration parameters return an array of Youverse biometric object
     *
     * @param  \Youverse\Face\Model\ProcessRequest $payload payload (required)
     *
     * @throws \Youverse\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Youverse\Face\Model\ProcessResponse
     */
    public function process($payload)
    {
        $this->checkParameters($payload,'payload');

        $returnModel = '\Youverse\Face\Model\ProcessResponse';
        $request = $this->prepareRequest($payload, '/face/process', 'POST');

        list($response) = $this->request($request, $returnModel);
        return $response;
    }
    
    /**
     * Operation identify
     *
     * Search an identification template against the enrollment set of a specified gallery
     *
     * @param  \Youverse\Face\Model\IdentifyRequest $payload payload (required)
     *
     * @throws \Youverse\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Youverse\Face\Model\CandidatesSchema
     */
    public function identify($payload)
    {
        $this->checkParameters($payload,'payload');

        $returnModel = '\Youverse\Face\Model\CandidatesSchema';
        $request = $this->prepareRequest($payload, '/face/identify', 'POST');

        list($response) = $this->request($request, $returnModel);
        return $response;
    }

    /**
     * Operation verifyId
     *
     * Match template with a specific id in a gallery
     *
     * @param  \Youverse\Face\Model\VerifyIdRequest $payload payload (required)
     *
     * @throws \Youverse\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Youverse\Face\Model\MatchingResult
     */
    public function verifyId($payload)
    {
        $this->checkParameters($payload,'payload');

        $returnModel = '\Youverse\Face\Model\MatchingResult';
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
     * @throws \Youverse\Face\ApiException on non-2xx response
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
     * @throws \Youverse\Face\ApiException on non-2xx response
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
     * @throws \Youverse\Face\ApiException on non-2xx response
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
     * @param  \Youverse\Face\Model\TemplateRequest $payload payload (required)
     *
     * @throws \Youverse\Face\ApiException on non-2xx response
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
     * @throws \Youverse\Face\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Youverse\Face\Model\TemplateRequest
     */
    public function getTemplateToGallery($gallery_id, $person_id)
    {
        $this->checkParameters($gallery_id,'gallery_id');
        $this->checkParameters($person_id,'person_id');
        
        //encode
        $gallery_id=ObjectSerializer::toPathValue($gallery_id);
        $person_id=ObjectSerializer::toPathValue($person_id);
        $returnType = '\Youverse\Face\Model\TemplateRequest';
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
     * @throws \Youverse\Face\ApiException on non-2xx response
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
