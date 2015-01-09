<?php

namespace ABC\Builder;

use \ABC\Builder\BaseAbstract;

/**
 * Address
 *
 * Holds information for an entity's location.
 *
 * @method \ABC\Builder\Address setAddress1(string $address1)
 * @method \ABC\Builder\Address setAddress2(string $address2)
 * @method \ABC\Builder\Address setCity(string $city)
 * @method \ABC\Builder\Address setProvince(string $province)
 * @method \ABC\Builder\Address setCountry(string $country)
 * @method \ABC\Builder\Address setPostalCode(string $postalCode)
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
