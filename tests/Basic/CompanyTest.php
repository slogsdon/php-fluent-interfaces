<?php

namespace ABC\Test\Basic;

use \PHPUnit_Framework_TestCase;
use \ABC\Basic\Address;
use \ABC\Basic\Company;
use \ABC\Basic\Person;
use \ABC\Test\Basic\AddressTest;
use \ABC\Test\Basic\PersonTest;

class CompanyTest extends PHPUnit_Framework_TestCase
{
    /** @var string */
    const NAME = 'Company XYZ';

    public function testCanSetupWithSettersAndWithStatements()
    {
        $company = (new Company())
            ->setName(self::NAME)
            ->withAddress(
                (new Address())
                    ->setAddress1(AddressTest::ADDRESS_1)
                    ->setAddress2(AddressTest::ADDRESS_2)
                    ->setCity(AddressTest::CITY)
                    ->setProvince(AddressTest::PROVINCE)
                    ->setCountry(AddressTest::COUNTRY)
                    ->setPostalCode(AddressTest::POSTAL_CODE)
            )
            ->withAddress(
                (new Address())
                    ->setAddress1(AddressTest::ADDRESS_2)
                    ->setAddress2(AddressTest::ADDRESS_1)
                    ->setCity(AddressTest::CITY)
                    ->setProvince(AddressTest::PROVINCE)
                    ->setCountry(AddressTest::COUNTRY)
                    ->setPostalCode(AddressTest::POSTAL_CODE)
            )
            ->withPerson(
                (new Person())
                    ->setFirstName(PersonTest::FIRST_NAME)
                    ->setLastName(PersonTest::LAST_NAME)
                    ->setAddress($this->expectedAddress1())
            );

        $this->assertEquals(self::NAME, $company->name);
        $this->assertEquals($this->expectedAddress1(), $company->addresses[0]);
        $this->assertEquals($this->expectedAddress2(), $company->addresses[1]);
    }

    /** @expectedException \ABC\Basic\UnknownPropertyException */
    public function testThrowsExceptionWithUnknownProperty()
    {
        (new Company())->setNonExistent('');
    }

    public function testUnknownMethodReturnsFalse()
    {
        $this->assertEquals(false, (new Company())->notAMethod());
    }

    /**
     * @return \ABC\Basic\Address
     */
    protected function expectedAddress1()
    {
        $address = new Address();

        $address->address1   = AddressTest::ADDRESS_1;
        $address->address2   = AddressTest::ADDRESS_2;
        $address->city       = AddressTest::CITY;
        $address->province   = AddressTest::PROVINCE;
        $address->country    = AddressTest::COUNTRY;
        $address->postalCode = AddressTest::POSTAL_CODE;

        return $address;
    }

    /**
     * @return \ABC\Basic\Address
     */
    protected function expectedAddress2()
    {
        $address = new Address();

        $address->address1   = AddressTest::ADDRESS_2;
        $address->address2   = AddressTest::ADDRESS_1;
        $address->city       = AddressTest::CITY;
        $address->province   = AddressTest::PROVINCE;
        $address->country    = AddressTest::COUNTRY;
        $address->postalCode = AddressTest::POSTAL_CODE;

        return $address;
    }

    /**
     * @return \ABC\Basic\Person
     */
    protected function expectedPerson()
    {
        $person = new Person();

        $person->firstName = PersonTest::FIRST_NAME;
        $person->lastName = PersonTest::LAST_NAME;
        $person->address = $this->expectedAddress1();

        return $person;
    }
}
