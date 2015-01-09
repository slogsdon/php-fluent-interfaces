<?php

namespace ABC\AspectBuilder;

use \ABC\AspectBuilder\BaseAbstract;
use \ABC\AspectBuilder\Address;

/**
 * @method \ABC\AspectBuilder\Person setName(string $name)
 * @method \ABC\AspectBuilder\Person setAddress(\ABC\AspectBuilder\Address $address)
 */
class Person extends BaseAbstract
{
    /** @var string|null */
    public $firstName = null;

    /** @var string|null */
    public $lastName  = null;

    /** @var \ABC\AspectBuilder\Address|null */
    public $address   = null;
}
