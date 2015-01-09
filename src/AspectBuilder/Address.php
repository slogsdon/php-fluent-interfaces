<?php

namespace ABC\AspectBuilder;

use \ABC\AspectBuilder\BaseAbstract;

/**
 * Address
 *
 * Holds information for an entity's location.
 *
 * @method \ABC\AspectBuilder\Address setAddress1(string $address1)
 * @method \ABC\AspectBuilder\Address setAddress2(string $address2)
 * @method \ABC\AspectBuilder\Address setCity(string $city)
 * @method \ABC\AspectBuilder\Address setProvince(string $province)
 * @method \ABC\AspectBuilder\Address setCountry(string $country)
 * @method \ABC\AspectBuilder\Address setPostalCode(string $postalCode)
 */
class Address extends BaseAbstract
{
    /** @var string|null */
    public $address1   = null;

    /** @var string|null */
    public $address2   = null;

    /** @var string|null */
    public $city       = null;

    /** @var string|null */
    public $province   = null;

    /** @var string|null */
    public $country    = null;

    /** @var string|null */
    public $postalCode = null;
}
