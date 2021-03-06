<?php

namespace ABC\Test\Builder;

use \PHPUnit_Framework_TestCase;
use \ABC\Builder\Address;
use \ABC\Builder\Company;
use \ABC\Builder\Person;
use \ABC\Test\Builder\AddressTest;
use \ABC\Test\Builder\PersonTest;

class CompanyTest extends PHPUnit_Framework_TestCase
{
    /** @var string */
    const NAME = 'Company XYZ';

    public function testCanSetupWithSettersAndWithStatements()
    {
        $company  = new Company();
        $address1 = new Address();
        $address2 = new Address();
        $person   = new Person();

        $company = $company
            ->setName(self::NAME)
            ->appendAddress(
                $address1
                    ->setAddress1(AddressTest::ADDRESS_1)
                    ->setAddress2(AddressTest::ADDRESS_2)
                    ->setCity(AddressTest::CITY)
                    ->setProvince(AddressTest::PROVINCE)
                    ->setCountry(AddressTest::COUNTRY)
                    ->setPostalCode(AddressTest::POSTAL_CODE)
            )
            ->appendAddress(
                $address2
                    ->setAddress1(AddressTest::ADDRESS_2)
                    ->setAddress2(AddressTest::ADDRESS_1)
                    ->setCity(AddressTest::CITY)
                    ->setProvince(AddressTest::PROVINCE)
                    ->setCountry(AddressTest::COUNTRY)
                    ->setPostalCode(AddressTest::POSTAL_CODE)
            )
            ->appendPerson(
                $person
                    ->setFirstName(PersonTest::FIRST_NAME)
                    ->setLastName(PersonTest::LAST_NAME)
                    ->setAddress($this->expectedAddress1())
            );

        $this->assertEquals(self::NAME, $company->name);
        $this->assertEquals($this->expectedAddress1(), $company->addresses[0]);
        $this->assertEquals($this->expectedAddress2(), $company->addresses[1]);
    }

    /** @expectedException \ABC\Builder\UnknownPropertyException */
    public function testThrowsExceptionWithUnknownProperty()
    {
        $company = new Company();
        $company->setNonExistent('');
    }

    public function testUnknownMethodReturnsFalse()
    {
        $company = new Company();
        $this->assertEquals(false, $company->notAMethod());
    }

    /**
     * @return \ABC\Builder\Address
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
     * @return \ABC\Builder\Address
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
     * @return \ABC\Builder\Person
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
