<?php

/**
 * VerifyImages
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
 * VerifyImages Class 
 *
 * @category Class
 * @package  Youverse\Face
 * @author   Youverse dev
 * @link     https://github.com/dev-yoonik/YK-Face-SDK-PHP
 */
class VerifyImages implements ModelInterface
{
    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $modelName = 'verify_images';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $types = [
        'first_image' => 'string',
        'second_image' => 'string'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $formats = [
        'first_image' => null,
        'second_image' => null
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
        'first_image' => 'first_image',
        'second_image' => 'second_image'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'first_image' => 'setFirstImage',
        'second_image' => 'setSecondImage'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'first_image' => 'getFirstImage',
        'second_image' => 'getSecondImage'
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
        $this->container['first_image'] = isset($data['first_image']) ? $data['first_image'] : null;
        $this->container['second_image'] = isset($data['second_image']) ? $data['second_image'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['first_image'] === null) {
            $invalidProperties[] = "'first_image' can't be null";
        }
        if ($this->container['second_image'] === null) {
            $invalidProperties[] = "'second_image' can't be null";
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
     * Gets first_image
     *
     * @return string
     */
    public function getFirstImage()
    {
        return $this->container['first_image'];
    }

    /**
     * Sets first_image
     *
     * @param string $first_image first_image
     *
     * @return $this
     */
    public function setFirstImage($first_image)
    {
        $this->container['first_image'] = $first_image;

        return $this;
    }

    /**
     * Gets second_image
     *
     * @return string
     */
    public function getSecondImage()
    {
        return $this->container['second_image'];
    }

    /**
     * Sets second_image
     *
     * @param string $second_image second_image
     *
     * @return $this
     */
    public function setSecondImage($second_image)
    {
        $this->container['second_image'] = $second_image;

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
