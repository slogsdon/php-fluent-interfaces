<?php

namespace ABC\AspectBuilder;

use \ABC\AspectBuilder\BaseAbstract;
use \ABC\AspectBuilder\Address;
use \ABC\AspectBuilder\Person;

/**
 * @method \ABC\AspectBuilder\Company setName(string $name)
 * @method \ABC\AspectBuilder\Company setAddresses(array $addresses)
 * @method \ABC\AspectBuilder\Company setPeople(array $people)
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
     * @param \ABC\AspectBuilder\Address $address
     *
     * @return \ABC\AspectBuilder\Company
     */
    public function withAddress(Address $address)
    {
        $this->addresses[] = $address;
        return $this;
    }

    /**
     * @param \ABC\AspectBuilder\Person $person
     *
     * @return \ABC\AspectBuilder\Company
     */
    public function withPerson(Person $person)
    {
        $this->people[] = $person;
        return $this;
    }
}
