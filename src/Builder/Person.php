<?php

namespace ABC\Builder;

use \ABC\Builder\BaseAbstract;
use \ABC\Builder\Address;

/**
 * @method \ABC\Builder\Person setName(string $name)
 * @method \ABC\Builder\Person setAddress(\ABC\Builder\Address $address)
 */
class Person extends BaseAbstract
{
    /** @var string|null */
    public $firstName = null;

    /** @var string|null */
    public $lastName  = null;

    /** @var \ABC\Builder\Address|null */
    public $address   = null;
}
