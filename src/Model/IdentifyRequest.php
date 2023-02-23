<?php
/**
 * IdentifyRequest
 *
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
namespace Youverse\Face\Model;

use \Youverse\Face\Client\Configurations\ObjectSerializer;

/**
 * IdentifyRequest Class 
 *
 * @category Class
 * @package  Youverse\Face
 * @author   Youverse dev
 * @link     https://github.com/dev-yoonik/YK-Face-SDK-PHP
 */
class IdentifyRequest implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $modelName = 'identify_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $types = [
        'template' => 'string',
        'candidate_list_length' => 'int',
        'minimum_score' => 'double',
        'gallery_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $formats = [
        'template' => null,
        'candidate_list_length' => null,
        'minimum_score' => 'double',
        'gallery_id' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function types()
    {
        return self::$types;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function formats()
    {
        return self::$formats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'template' => 'template',
        'candidate_list_length' => 'candidate_list_length',
        'minimum_score' => 'minimum_score',
        'gallery_id' => 'gallery_id'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'template' => 'setTemplate',
        'candidate_list_length' => 'setCandidateListLength',
        'minimum_score' => 'setMinimumScore',
        'gallery_id' => 'setGalleryId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'template' => 'getTemplate',
        'candidate_list_length' => 'getCandidateListLength',
        'minimum_score' => 'getMinimumScore',
        'gallery_id' => 'getGalleryId'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$modelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['template'] = isset($data['template']) ? $data['template'] : null;
        $this->container['candidate_list_length'] = isset($data['candidate_list_length']) ? $data['candidate_list_length'] : null;
        $this->container['minimum_score'] = isset($data['minimum_score']) ? $data['minimum_score'] : -1.0;
        $this->container['gallery_id'] = isset($data['gallery_id']) ? $data['gallery_id'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['template'] === null) {
            $invalidProperties[] = "'template' can't be null";
        }
        if (!is_null($this->container['candidate_list_length']) && ($this->container['candidate_list_length'] < 1)) {
            $invalidProperties[] = "invalid value for 'candidate_list_length', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['minimum_score']) && ($this->container['minimum_score'] < -1)) {
            $invalidProperties[] = "invalid value for 'minimum_score', must be bigger than or equal to -1.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets template
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->container['template'];
    }

    /**
     * Sets template
     *
     * @param string $template template
     *
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->container['template'] = $template;

        return $this;
    }

    /**
     * Gets candidate_list_length
     *
     * @return int
     */
    public function getCandidateListLength()
    {
        return $this->container['candidate_list_length'];
    }

    /**
     * Sets candidate_list_length
     *
     * @param int $candidate_list_length candidate_list_length
     *
     * @return $this
     */
    public function setCandidateListLength($candidate_list_length)
    {

        if (!is_null($candidate_list_length) && ($candidate_list_length < 1)) {
            throw new \InvalidArgumentException('invalid value for $candidate_list_length when calling IdentifyRequest., must be bigger than or equal to 1.');
        }

        $this->container['candidate_list_length'] = $candidate_list_length;

        return $this;
    }

    /**
     * Gets minimum_score
     *
     * @return double
     */
    public function getMinimumScore()
    {
        return $this->container['minimum_score'];
    }

    /**
     * Sets minimum_score
     *
     * @param double $minimum_score minimum_score
     *
     * @return $this
     */
    public function setMinimumScore($minimum_score)
    {

        if (!is_null($minimum_score) && ($minimum_score < -1)) {
            throw new \InvalidArgumentException('invalid value for $minimum_score when calling IdentifyRequest., must be bigger than or equal to -1.');
        }

        $this->container['minimum_score'] = $minimum_score;

        return $this;
    }

    /**
     * Gets gallery_id
     *
     * @return string
     */
    public function getGalleryId()
    {
        return $this->container['gallery_id'];
    }

    /**
     * Sets gallery_id
     *
     * @param string $gallery_id gallery_id
     *
     * @return $this
     */
    public function setGalleryId($gallery_id)
    {
        $this->container['gallery_id'] = $gallery_id;

        return $this;
    }
    

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


