<?php

namespace ABC\Test\Basic;

use \PHPUnit_Framework_TestCase;
use \ABC\Basic\Address;
use \ABC\Basic\Person;
use \ABC\Test\Basic\AddressTest;

class PersonTest extends PHPUnit_Framework_TestCase
{
    /** @var string */
    const FIRST_NAME = 'John';

    /** @var string */
    const LAST_NAME  = 'Smith';

    public function testCanSetupWithSetters()
    {
        $address = (new Address)
            ->setAddress1(AddressTest::ADDRESS_1)
            ->setAddress2(AddressTest::ADDRESS_2)
            ->setCity(AddressTest::CITY)
            ->setProvince(AddressTest::PROVINCE)
            ->setCountry(AddressTest::COUNTRY)
            ->setPostalCode(AddressTest::POSTAL_CODE);

        $person = (new Person)
            ->setFirstName(self::FIRST_NAME)
            ->setLastName(self::LAST_NAME)
            ->setAddress($address);

        $this->assertEquals(self::FIRST_NAME, $person->firstName);
        $this->assertEquals(self::LAST_NAME, $person->lastName);
        $this->assertEquals($this->expectedAddress(), $person->address);
    }

    /** @expectedException \ABC\Basic\UnknownPropertyException */
    public function testThrowsExceptionWithUnknownProperty()
    {
        (new Person)->setNonExistent('');
    }

    /**
     * @return \ABC\Basic\Address
     */
    protected function expectedAddress()
    {
        $address = new Address;

        $address->address1   = AddressTest::ADDRESS_1;
        $address->address2   = AddressTest::ADDRESS_2;
        $address->city       = AddressTest::CITY;
        $address->province   = AddressTest::PROVINCE;
        $address->country    = AddressTest::COUNTRY;
        $address->postalCode = AddressTest::POSTAL_CODE;

        return $address;
    }
}
