<?php
/**
 * VerifyIdRequest
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
 * VerifyIdRequest Class 
 *
 * @category Class
 * @package  Youverse\Face
 * @author   Youverse dev
 * @link     https://github.com/dev-yoonik/YK-Face-SDK-PHP
 */
class VerifyIdRequest implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $modelName = 'verify_id_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $types = [
        'template' => 'string',
        'template_id' => 'string',
        'gallery_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $formats = [
        'template' => null,
        'template_id' => null,
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
        'template_id' => 'template_id',
        'gallery_id' => 'gallery_id'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'template' => 'setTemplate',
        'template_id' => 'setTemplateId',
        'gallery_id' => 'setGalleryId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'template' => 'getTemplate',
        'template_id' => 'getTemplateId',
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
        $this->container['template_id'] = isset($data['template_id']) ? $data['template_id'] : null;
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
        if ($this->container['template_id'] === null) {
            $invalidProperties[] = "'template_id' can't be null";
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
     * Gets template_id
     *
     * @return string
     */
    public function getTemplateId()
    {
        return $this->container['template_id'];
    }

    /**
     * Sets template_id
     *
     * @param string $template_id template_id
     *
     * @return $this
     */
    public function setTemplateId($template_id)
    {
        $this->container['template_id'] = $template_id;

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


