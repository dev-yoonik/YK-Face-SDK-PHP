<?php

/**
 * VerifyRequest
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
 * VerifyRequest Class 
 *
 * @category Class
 * @package  Yoonik\Face
 * @author   Yoonik dev
 * @link     https://github.com/dev-yoonik/YK-Face-SDK-PHP
 */
class VerifyRequest implements ModelInterface
{

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $modelName = 'verify_request';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $types = [
        'first_template' => 'string',
        'second_template' => 'string'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $formats = [
        'first_template' => null,
        'second_template' => null
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
        'first_template' => 'first_template',
        'second_template' => 'second_template'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'first_template' => 'setFirstTemplate',
        'second_template' => 'setSecondTemplate'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'first_template' => 'getFirstTemplate',
        'second_template' => 'getSecondTemplate'
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
        $this->container['first_template'] = isset($data['first_template']) ? $data['first_template'] : null;
        $this->container['second_template'] = isset($data['second_template']) ? $data['second_template'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
     * Gets first_template
     *
     * @return string
     */
    public function getFirstTemplate()
    {
        return $this->container['first_template'];
    }

    /**
     * Sets first_template
     *
     * @param string $first_template first_template
     *
     * @return $this
     */
    public function setFirstTemplate($first_template)
    {
        $this->container['first_template'] = $first_template;

        return $this;
    }

    /**
     * Gets second_template
     *
     * @return string
     */
    public function getSecondTemplate()
    {
        return $this->container['second_template'];
    }

    /**
     * Sets second_template
     *
     * @param string $second_template second_template
     *
     * @return $this
     */
    public function setSecondTemplate($second_template)
    {
        $this->container['second_template'] = $second_template;

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
