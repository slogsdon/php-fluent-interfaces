<?php

namespace ABC\Builder;

use \ABC\Builder\BaseAbstract;
use \ABC\Builder\Address;
use \ABC\Builder\Person;

/**
 * @method \ABC\Builder\Company setName(string $name)
 * @method \ABC\Builder\Company setAddresses(array $addresses)
 * @method \ABC\Builder\Company setPeople(array $people)
 */
class Company extends BaseAbstract
{
    /** @var string|null */
    public $name      = null;

    /** @var array */
    public $addresses = array();

    /** @var array */
    public $people    = array();

    /**
     * @param \ABC\Builder\Address $address
     *
     * @return \ABC\Builder\Company
     */
    public function withAddress(Address $address)
    {
        $this->addresses[] = $address;
        return $this;
    }

    /**
     * @param \ABC\Builder\Person $person
     *
     * @return \ABC\Builder\Company
     */
    public function withPerson(Person $person)
    {
        $this->people[] = $person;
        return $this;
    }
}
