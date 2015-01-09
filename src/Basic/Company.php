<?php

namespace ABC\Basic;

use \ABC\Basic\Base;
use \ABC\Basic\Address;
use \ABC\Basic\Person;

/**
 * @method \ABC\Basic\Company setName(string $name)
 * @method \ABC\Basic\Company setAddresses(array $addresses)
 * @method \ABC\Basic\Company setPeople(array $people)
 */
class Company extends Base
{
    /** @var string|null */
    public $name      = null;

    /** @var array */
    public $addresses = array();

    /** @var array */
    public $people    = array();

    /**
     * @param \ABC\Basic\Address $address
     *
     * @return \ABC\Basic\Company
     */
    public function withAddress(Address $address)
    {
        $this->addresses[] = $address;
        return $this;
    }

    /**
     * @param \ABC\Basic\Person $person
     *
     * @return \ABC\Basic\Company
     */
    public function withPerson(Person $person)
    {
        $this->people[] = $person;
        return $this;
    }
}
