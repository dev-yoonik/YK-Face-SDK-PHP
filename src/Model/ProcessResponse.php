<?php

/**
 * ProcessResponse
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
 * ProcessResponse Class 
 *
 * @category Class
 * @package  Youverse\Face
 * @author   Youverse dev
 * @link     https://github.com/dev-yoonik/YK-Face-SDK-PHP
 */
class ProcessResponse implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $modelName = 'process_response';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $types = [
        'biometric_type' => 'string',
        'x' => 'double',
        'y' => 'double',
        'width' => 'double',
        'height' => 'double',
        'z' => 'double',
        'matching_score' => 'double',
        'template' => 'string',
        'template_version' => 'string',
        'matching_image' => 'string',
        'tracking_id' => 'string',
        'template_id' => 'string',
        'biometric_points' => 'object[]',
        'quality_metrics' => 'object[]'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $formats = [
        'biometric_type' => null,
        'x' => 'double',
        'y' => 'double',
        'width' => 'double',
        'height' => 'double',
        'z' => 'double',
        'matching_score' => 'double',
        'template' => 'byte',
        'template_version' => null,
        'matching_image' => 'byte',
        'tracking_id' => null,
        'template_id' => null,
        'biometric_points' => null,
        'quality_metrics' => null
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
        'biometric_type' => 'biometric_type',
        'x' => 'x',
        'y' => 'y',
        'width' => 'width',
        'height' => 'height',
        'z' => 'Z',
        'matching_score' => 'matching_score',
        'template' => 'template',
        'template_version' => 'template_version',
        'matching_image' => 'matching_image',
        'tracking_id' => 'tracking_id',
        'template_id' => 'template_id',
        'biometric_points' => 'biometric_points',
        'quality_metrics' => 'quality_metrics'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'biometric_type' => 'setBiometricType',
        'x' => 'setX',
        'y' => 'setY',
        'width' => 'setWidth',
        'height' => 'setHeight',
        'z' => 'setZ',
        'matching_score' => 'setMatchingScore',
        'template' => 'setTemplate',
        'template_version' => 'setTemplateVersion',
        'matching_image' => 'setMatchingImage',
        'tracking_id' => 'setTrackingId',
        'template_id' => 'setTemplateId',
        'biometric_points' => 'setBiometricPoints',
        'quality_metrics' => 'setQualityMetrics'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'biometric_type' => 'getBiometricType',
        'x' => 'getX',
        'y' => 'getY',
        'width' => 'getWidth',
        'height' => 'getHeight',
        'z' => 'getZ',
        'matching_score' => 'getMatchingScore',
        'template' => 'getTemplate',
        'template_version' => 'getTemplateVersion',
        'matching_image' => 'getMatchingImage',
        'tracking_id' => 'getTrackingId',
        'template_id' => 'getTemplateId',
        'biometric_points' => 'getBiometricPoints',
        'quality_metrics' => 'getQualityMetrics'
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
        $this->container['biometric_type'] = isset($data['biometric_type']) ? $data['biometric_type'] : null;
        $this->container['x'] = isset($data['x']) ? $data['x'] : null;
        $this->container['y'] = isset($data['y']) ? $data['y'] : null;
        $this->container['width'] = isset($data['width']) ? $data['width'] : null;
        $this->container['height'] = isset($data['height']) ? $data['height'] : null;
        $this->container['z'] = isset($data['z']) ? $data['z'] : null;
        $this->container['matching_score'] = isset($data['matching_score']) ? $data['matching_score'] : null;
        $this->container['template'] = isset($data['template']) ? $data['template'] : null;
        $this->container['template_version'] = isset($data['template_version']) ? $data['template_version'] : null;
        $this->container['matching_image'] = isset($data['matching_image']) ? $data['matching_image'] : null;
        $this->container['tracking_id'] = isset($data['tracking_id']) ? $data['tracking_id'] : null;
        $this->container['template_id'] = isset($data['template_id']) ? $data['template_id'] : null;
        $this->container['biometric_points'] = isset($data['biometric_points']) ? $data['biometric_points'] : null;
        $this->container['quality_metrics'] = isset($data['quality_metrics']) ? $data['quality_metrics'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['template']) && !preg_match("/^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/", $this->container['template'])) {
            $invalidProperties[] = "invalid value for 'template', must be conform to the pattern /^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/.";
        }

        if (!is_null($this->container['matching_image']) && !preg_match("/^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/", $this->container['matching_image'])) {
            $invalidProperties[] = "invalid value for 'matching_image', must be conform to the pattern /^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/.";
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
     * Gets biometric_type
     *
     * @return string
     */
    public function getBiometricType()
    {
        return $this->container['biometric_type'];
    }

    /**
     * Sets biometric_type
     *
     * @param string $biometric_type biometric_type
     *
     * @return $this
     */
    public function setBiometricType($biometric_type)
    {
        $this->container['biometric_type'] = $biometric_type;

        return $this;
    }

    /**
     * Gets x
     *
     * @return double
     */
    public function getX()
    {
        return $this->container['x'];
    }

    /**
     * Sets x
     *
     * @param double $x detection center coordinate x
     *
     * @return $this
     */
    public function setX($x)
    {
        $this->container['x'] = $x;

        return $this;
    }

    /**
     * Gets y
     *
     * @return double
     */
    public function getY()
    {
        return $this->container['y'];
    }

    /**
     * Sets y
     *
     * @param double $y detection center coordinate y
     *
     * @return $this
     */
    public function setY($y)
    {
        $this->container['y'] = $y;

        return $this;
    }

    /**
     * Gets width
     *
     * @return double
     */
    public function getWidth()
    {
        return $this->container['width'];
    }

    /**
     * Sets width
     *
     * @param double $width detection bounding box width
     *
     * @return $this
     */
    public function setWidth($width)
    {
        $this->container['width'] = $width;

        return $this;
    }

    /**
     * Gets height
     *
     * @return double
     */
    public function getHeight()
    {
        return $this->container['height'];
    }

    /**
     * Sets height
     *
     * @param double $height detection bounding box width
     *
     * @return $this
     */
    public function setHeight($height)
    {
        $this->container['height'] = $height;

        return $this;
    }

    /**
     * Gets z
     *
     * @return double
     */
    public function getZ()
    {
        return $this->container['z'];
    }

    /**
     * Sets z
     *
     * @param double $z detection center 3D coordinate Z
     *
     * @return $this
     */
    public function setZ($z)
    {
        $this->container['z'] = $z;

        return $this;
    }

    /**
     * Gets matching_score
     *
     * @return double
     */
    public function getMatchingScore()
    {
        return $this->container['matching_score'];
    }

    /**
     * Sets matching_score
     *
     * @param double $matching_score Matching score obtained with template_id person
     *
     * @return $this
     */
    public function setMatchingScore($matching_score)
    {
        $this->container['matching_score'] = $matching_score;

        return $this;
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
     * @param string $template Biometric template
     *
     * @return $this
     */
    public function setTemplate($template)
    {

        if (!is_null($template) && (!preg_match("/^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/", $template))) {
            throw new \InvalidArgumentException("invalid value for $template when calling ProcessResponse., must conform to the pattern /^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/.");
        }

        $this->container['template'] = $template;

        return $this;
    }

    /**
     * Gets template_version
     *
     * @return string
     */
    public function getTemplateVersion()
    {
        return $this->container['template_version'];
    }

    /**
     * Sets template_version
     *
     * @param string $template_version Template version
     *
     * @return $this
     */
    public function setTemplateVersion($template_version)
    {
        $this->container['template_version'] = $template_version;

        return $this;
    }

    /**
     * Gets matching_image
     *
     * @return string
     */
    public function getMatchingImage()
    {
        return $this->container['matching_image'];
    }

    /**
     * Sets matching_image
     *
     * @param string $matching_image Thumbnail/crop used for template extraction
     *
     * @return $this
     */
    public function setMatchingImage($matching_image)
    {

        if (!is_null($matching_image) && (!preg_match("/^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/", $matching_image))) {
            throw new \InvalidArgumentException("invalid value for $matching_image when calling ProcessResponse., must conform to the pattern /^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/.");
        }

        $this->container['matching_image'] = $matching_image;

        return $this;
    }

    /**
     * Gets tracking_id
     *
     * @return string
     */
    public function getTrackingId()
    {
        return $this->container['tracking_id'];
    }

    /**
     * Sets tracking_id
     *
     * @param string $tracking_id Tracking id. Available when processing video.
     *
     * @return $this
     */
    public function setTrackingId($tracking_id)
    {
        $this->container['tracking_id'] = $tracking_id;

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
     * @param string $template_id Template Id
     *
     * @return $this
     */
    public function setTemplateId($template_id)
    {
        $this->container['template_id'] = $template_id;

        return $this;
    }

    /**
     * Gets biometric_points
     *
     * @return object[]
     */
    public function getBiometricPoints()
    {
        return $this->container['biometric_points'];
    }

    /**
     * Sets biometric_points
     *
     * @param object[] $biometric_points biometric_points
     *
     * @return $this
     */
    public function setBiometricPoints($biometric_points)
    {
        $this->container['biometric_points'] = $biometric_points;

        return $this;
    }

    /**
     * Gets quality_metrics
     *
     * @return object[]
     */
    public function getQualityMetrics()
    {
        return $this->container['quality_metrics'];
    }

    /**
     * Sets quality_metrics
     *
     * @param object[] $quality_metrics quality_metrics
     *
     * @return $this
     */
    public function setQualityMetrics($quality_metrics)
    {
        $this->container['quality_metrics'] = $quality_metrics;

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
