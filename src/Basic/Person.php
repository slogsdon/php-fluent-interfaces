<?php

namespace ABC\Basic;

use \ABC\Basic\Base;
use \ABC\Basic\Address;

/**
 * @method \ABC\Basic\Person setName(string $name)
 * @method \ABC\Basic\Person setAddress(\ABC\Basic\Address $address)
 */
class Person extends Base
{
    /** @var string|null */
    public $firstName = null;

    /** @var string|null */
    public $lastName  = null;

    /** @var \ABC\Basic\Address|null */
    public $address   = null;
}

