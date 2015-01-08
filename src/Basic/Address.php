<?php

namespace ABC\Basic;

use ABC\Basic\Base;

/**
 * Address
 *
 * Holds information for an entity's location.
 *
 * @method \ABC\Basic\Address setAddress1(string $address1)
 * @method \ABC\Basic\Address setAddress2(string $address2)
 * @method \ABC\Basic\Address setCity(string $city)
 * @method \ABC\Basic\Address setProvince(string $province)
 * @method \ABC\Basic\Address setCountry(string $country)
 * @method \ABC\Basic\Address setPostalCode(string $postalCode)
 */
class Address extends Base
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
