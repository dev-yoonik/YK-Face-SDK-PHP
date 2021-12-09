<?php
/**
 * ProcessRequest
 *
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
namespace Yoonik\Face\Model;

use \Yoonik\Face\Client\Configurations\ObjectSerializer;

/**
 * ProcessRequest Class 
 *
 * @category Class
 * @package  Yoonik\Face
 * @author   Yoonik dev
 * @link     https://github.com/dev-yoonik/YK-Face-SDK-PHP
 */
class ProcessRequest implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $modelName = 'process_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $types = [
        'image' => 'string',
        'processings' => 'string[]',
        'configuration' => 'object[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $formats = [
        'image' => null,
        'processings' => null,
        'configuration' => null
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
        'image' => 'image',
        'processings' => 'processings',
        'configuration' => 'configuration'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'image' => 'setImage',
        'processings' => 'setProcessings',
        'configuration' => 'setConfiguration'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'image' => 'getImage',
        'processings' => 'getProcessings',
        'configuration' => 'getConfiguration'
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

    const PROCESSINGS_DETECT = 'detect';
    const PROCESSINGS_ANALYZE = 'analyze';
    const PROCESSINGS_TEMPLIFY = 'templify';
    const PROCESSINGS_NONE = 'none';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getProcessingsAllowableValues()
    {
        return [
            self::PROCESSINGS_DETECT,
            self::PROCESSINGS_ANALYZE,
            self::PROCESSINGS_TEMPLIFY,
            self::PROCESSINGS_NONE,
        ];
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
        $this->container['image'] = isset($data['image']) ? $data['image'] : null;
        $this->container['processings'] = isset($data['processings']) ? $data['processings'] : null;
        $this->container['configuration'] = isset($data['configuration']) ? $data['configuration'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['image'] === null) {
            $invalidProperties[] = "'image' can't be null";
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
     * Gets image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->container['image'];
    }

    /**
     * Sets image
     *
     * @param string $image image
     *
     * @return $this
     */
    public function setImage($image)
    {
        $this->container['image'] = $image;

        return $this;
    }

    /**
     * Gets processings
     *
     * @return string[]
     */
    public function getProcessings()
    {
        return $this->container['processings'];
    }

    /**
     * Sets processings
     *
     * @param string[] $processings Requested biometric processings.
     *
     * @return $this
     */
    public function setProcessings($processings)
    {
        $allowedValues = $this->getProcessingsAllowableValues();
        if (!is_null($processings) && array_diff($processings, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'processings', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['processings'] = $processings;

        return $this;
    }

    /**
     * Gets configuration
     *
     * @return object[]
     */
    public function getConfiguration()
    {
        return $this->container['configuration'];
    }

    /**
     * Sets configuration
     *
     * @param object[] $configuration Extensible configurations for biometric processing.
     *
     * @return $this
     */
    public function setConfiguration($configuration)
    {
        $this->container['configuration'] = $configuration;

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


