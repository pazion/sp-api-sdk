<?php

declare(strict_types=1);

namespace AmazonPHP\SellingPartner\Model\Orders;

use AmazonPHP\SellingPartner\Exception\AssertionException;
use AmazonPHP\SellingPartner\ModelInterface;
use AmazonPHP\SellingPartner\ObjectSerializer;

/**
 * Selling Partner API for Orders.
 *
 * The Selling Partner API for Orders helps you programmatically retrieve order information. These APIs let you develop fast, flexible, custom applications in areas like order synchronization, order research, and demand-based decision support tools.
 *
 * The version of the OpenAPI document: v0
 *
 * This class was auto-generated by https://openapi-generator.tech
 * Do not change it, it will be overwritten with next execution of /bin/generate.sh
 *
 * @implements \ArrayAccess<TKey, TValue>
 *
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Address implements \ArrayAccess, \JsonSerializable, \Stringable, ModelInterface
{
    final public const DISCRIMINATOR = null;

    final public const ADDRESS_TYPE_RESIDENTIAL = 'Residential';

    final public const ADDRESS_TYPE_COMMERCIAL = 'Commercial';

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static string $openAPIModelName = 'Address';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static array $openAPITypes = [
        'name' => 'string',
        'address_line1' => 'string',
        'address_line2' => 'string',
        'address_line3' => 'string',
        'city' => 'string',
        'county' => 'string',
        'district' => 'string',
        'state_or_region' => 'string',
        'municipality' => 'string',
        'postal_code' => 'string',
        'country_code' => 'string',
        'phone' => 'string',
        'address_type' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     *
     * @phpstan-var array<string, string|null>
     *
     * @psalm-var array<string, string|null>
     */
    protected static array $openAPIFormats = [
        'name' => null,
        'address_line1' => null,
        'address_line2' => null,
        'address_line3' => null,
        'city' => null,
        'county' => null,
        'district' => null,
        'state_or_region' => null,
        'municipality' => null,
        'postal_code' => null,
        'country_code' => null,
        'phone' => null,
        'address_type' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static array $attributeMap = [
        'name' => 'Name',
        'address_line1' => 'AddressLine1',
        'address_line2' => 'AddressLine2',
        'address_line3' => 'AddressLine3',
        'city' => 'City',
        'county' => 'County',
        'district' => 'District',
        'state_or_region' => 'StateOrRegion',
        'municipality' => 'Municipality',
        'postal_code' => 'PostalCode',
        'country_code' => 'CountryCode',
        'phone' => 'Phone',
        'address_type' => 'AddressType',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static array $setters = [
        'name' => 'setName',
        'address_line1' => 'setAddressLine1',
        'address_line2' => 'setAddressLine2',
        'address_line3' => 'setAddressLine3',
        'city' => 'setCity',
        'county' => 'setCounty',
        'district' => 'setDistrict',
        'state_or_region' => 'setStateOrRegion',
        'municipality' => 'setMunicipality',
        'postal_code' => 'setPostalCode',
        'country_code' => 'setCountryCode',
        'phone' => 'setPhone',
        'address_type' => 'setAddressType',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static array $getters = [
        'name' => 'getName',
        'address_line1' => 'getAddressLine1',
        'address_line2' => 'getAddressLine2',
        'address_line3' => 'getAddressLine3',
        'city' => 'getCity',
        'county' => 'getCounty',
        'district' => 'getDistrict',
        'state_or_region' => 'getStateOrRegion',
        'municipality' => 'getMunicipality',
        'postal_code' => 'getPostalCode',
        'country_code' => 'getCountryCode',
        'phone' => 'getPhone',
        'address_type' => 'getAddressType',
    ];

    /**
     * Associative array for storing property values.
     *
     * @var mixed[]
     */
    protected array $container = [];

    /**
     * Constructor.
     *
     * @param null|mixed[] $data Associated array of property values
     *                           initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['name'] = $data['name'] ?? null;
        $this->container['address_line1'] = $data['address_line1'] ?? null;
        $this->container['address_line2'] = $data['address_line2'] ?? null;
        $this->container['address_line3'] = $data['address_line3'] ?? null;
        $this->container['city'] = $data['city'] ?? null;
        $this->container['county'] = $data['county'] ?? null;
        $this->container['district'] = $data['district'] ?? null;
        $this->container['state_or_region'] = $data['state_or_region'] ?? null;
        $this->container['municipality'] = $data['municipality'] ?? null;
        $this->container['postal_code'] = $data['postal_code'] ?? null;
        $this->container['country_code'] = $data['country_code'] ?? null;
        $this->container['phone'] = $data['phone'] ?? null;
        $this->container['address_type'] = $data['address_type'] ?? null;
    }

    /**
     * Array of property to type mappings. Used for (de)serialization.
     */
    public static function openAPITypes() : array
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization.
     */
    public static function openAPIFormats() : array
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     */
    public static function attributeMap() : array
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     */
    public static function setters() : array
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests).
     */
    public static function getters() : array
    {
        return self::$getters;
    }

    /**
     * Gets the string presentation of the object.
     */
    public function __toString() : string
    {
        return (string) \json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * The original name of the model.
     */
    public function getModelName() : string
    {
        return self::$openAPIModelName;
    }

    /**
     * Gets allowable values of the enum.
     *
     * @return string[]
     */
    public function getAddressTypeAllowableValues() : array
    {
        return [
            self::ADDRESS_TYPE_RESIDENTIAL,
            self::ADDRESS_TYPE_COMMERCIAL,
        ];
    }

    /**
     * Validate all properties.
     *
     * @throws AssertionException
     */
    public function validate() : void
    {
        if ($this->container['name'] === null) {
            throw new AssertionException("'name' can't be null");
        }

        $allowedValues = $this->getAddressTypeAllowableValues();

        if (null !== $this->container['address_type'] && !\in_array($this->container['address_type'], $allowedValues, true)) {
            throw new AssertionException(
                \sprintf(
                    "invalid value '%s' for 'address_type', must be one of '%s'",
                    $this->container['address_type'],
                    \implode("', '", $allowedValues)
                )
            );
        }
    }

    /**
     * Gets name.
     */
    public function getName() : ?string
    {
        return $this->container['name'];
    }

    /**
     * Sets name.
     *
     * @param string $name the name
     */
    public function setName(string $name) : self
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets address_line1.
     */
    public function getAddressLine1() : ?string
    {
        return $this->container['address_line1'];
    }

    /**
     * Sets address_line1.
     *
     * @param null|string $address_line1 the street address
     */
    public function setAddressLine1(?string $address_line1) : self
    {
        $this->container['address_line1'] = $address_line1;

        return $this;
    }

    /**
     * Gets address_line2.
     */
    public function getAddressLine2() : ?string
    {
        return $this->container['address_line2'];
    }

    /**
     * Sets address_line2.
     *
     * @param null|string $address_line2 additional street address information, if required
     */
    public function setAddressLine2(?string $address_line2) : self
    {
        $this->container['address_line2'] = $address_line2;

        return $this;
    }

    /**
     * Gets address_line3.
     */
    public function getAddressLine3() : ?string
    {
        return $this->container['address_line3'];
    }

    /**
     * Sets address_line3.
     *
     * @param null|string $address_line3 additional street address information, if required
     */
    public function setAddressLine3(?string $address_line3) : self
    {
        $this->container['address_line3'] = $address_line3;

        return $this;
    }

    /**
     * Gets city.
     */
    public function getCity() : ?string
    {
        return $this->container['city'];
    }

    /**
     * Sets city.
     *
     * @param null|string $city The city
     */
    public function setCity(?string $city) : self
    {
        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets county.
     */
    public function getCounty() : ?string
    {
        return $this->container['county'];
    }

    /**
     * Sets county.
     *
     * @param null|string $county the county
     */
    public function setCounty(?string $county) : self
    {
        $this->container['county'] = $county;

        return $this;
    }

    /**
     * Gets district.
     */
    public function getDistrict() : ?string
    {
        return $this->container['district'];
    }

    /**
     * Sets district.
     *
     * @param null|string $district the district
     */
    public function setDistrict(?string $district) : self
    {
        $this->container['district'] = $district;

        return $this;
    }

    /**
     * Gets state_or_region.
     */
    public function getStateOrRegion() : ?string
    {
        return $this->container['state_or_region'];
    }

    /**
     * Sets state_or_region.
     *
     * @param null|string $state_or_region the state or region
     */
    public function setStateOrRegion(?string $state_or_region) : self
    {
        $this->container['state_or_region'] = $state_or_region;

        return $this;
    }

    /**
     * Gets municipality.
     */
    public function getMunicipality() : ?string
    {
        return $this->container['municipality'];
    }

    /**
     * Sets municipality.
     *
     * @param null|string $municipality the municipality
     */
    public function setMunicipality(?string $municipality) : self
    {
        $this->container['municipality'] = $municipality;

        return $this;
    }

    /**
     * Gets postal_code.
     */
    public function getPostalCode() : ?string
    {
        return $this->container['postal_code'];
    }

    /**
     * Sets postal_code.
     *
     * @param null|string $postal_code the postal code
     */
    public function setPostalCode(?string $postal_code) : self
    {
        $this->container['postal_code'] = $postal_code;

        return $this;
    }

    /**
     * Gets country_code.
     */
    public function getCountryCode() : ?string
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code.
     *
     * @param null|string $country_code The country code. A two-character country code, in ISO 3166-1 alpha-2 format.
     */
    public function setCountryCode(?string $country_code) : self
    {
        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets phone.
     */
    public function getPhone() : ?string
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone.
     *
     * @param null|string $phone The phone number. Not returned for Fulfillment by Amazon (FBA) orders.
     */
    public function setPhone(?string $phone) : self
    {
        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets address_type.
     */
    public function getAddressType() : ?string
    {
        return $this->container['address_type'];
    }

    /**
     * Sets address_type.
     *
     * @param null|string $address_type the address type of the shipping address
     */
    public function setAddressType(?string $address_type) : self
    {
        $this->container['address_type'] = $address_type;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     */
    public function offsetExists($offset) : bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @return null|mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset) : mixed
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     */
    public function offsetSet($offset, $value) : void
    {
        if (null === $offset) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     */
    public function offsetUnset($offset) : void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     *
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed returns data which can be serialized by json_encode(), which is a value
     *               of any type other than a resource
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize() : string
    {
        return \json_encode(ObjectSerializer::sanitizeForSerialization($this), JSON_THROW_ON_ERROR);
    }

    /**
     * Gets a header-safe presentation of the object.
     */
    public function toHeaderValue() : string
    {
        return \json_encode(ObjectSerializer::sanitizeForSerialization($this), JSON_THROW_ON_ERROR);
    }
}
