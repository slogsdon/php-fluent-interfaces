<?php

namespace ABC\Test\Builder;

use \PHPUnit_Framework_TestCase;
use \ABC\Builder\Address;
use \ABC\Builder\AddressBuilder;

class AddressBuilderTest extends PHPUnit_Framework_TestCase
{
    public function testBuilderWithInitialValueNoActions()
    {
        $builder = new AddressBuilder($this->expectedAddress());

        $this->assertEquals($this->expectedAddress(), $builder->address);

        $builder = $builder->executeActions();

        $this->assertEquals($this->expectedAddress(), $builder->address);
    }

    public function testBuilderWithoutInitialValueNoActions()
    {
        $builder = new AddressBuilder();

        $builder = $builder->executeActions();

        $this->assertEquals(new Address(), $builder->address);
    }

    /** @var \ABC\Builder\Address */
    protected function expectedAddress()
    {
        $address = new Address();
        $address->postalCode = '12345';
        return $address;
    }
}
