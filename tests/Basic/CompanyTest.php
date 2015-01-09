<?php

namespace ABC\Test\Basic;

use \PHPUnit_Framework_TestCase;
use \ABC\Basic\Address;
use \ABC\Basic\Company;
use \ABC\Test\Basic\AddressTest;

class CompanyTest extends PHPUnit_Framework_TestCase
{
    /** @var string */
    const NAME = 'Company XYZ';

    public function testCanSetupWithSettersAndWithStatements()
    {
        $company = (new Company())
            ->setName(self::NAME)
            ->withAddress(
                (new Address)
                    ->setAddress1(AddressTest::ADDRESS_1)
                    ->setAddress2(AddressTest::ADDRESS_2)
                    ->setCity(AddressTest::CITY)
                    ->setProvince(AddressTest::PROVINCE)
                    ->setCountry(AddressTest::COUNTRY)
                    ->setPostalCode(AddressTest::POSTAL_CODE)
            )
            ->withAddress(
                (new Address)
                    ->setAddress1(AddressTest::ADDRESS_2)
                    ->setAddress2(AddressTest::ADDRESS_1)
                    ->setCity(AddressTest::CITY)
                    ->setProvince(AddressTest::PROVINCE)
                    ->setCountry(AddressTest::COUNTRY)
                    ->setPostalCode(AddressTest::POSTAL_CODE)
            );

        $this->assertEquals(self::NAME, $company->name);
        $this->assertEquals($this->expectedAddress1(), $company->addresses[0]);
        $this->assertEquals($this->expectedAddress2(), $company->addresses[1]);
    }

    /** @expectedException \ABC\Basic\UnknownPropertyException */
    public function testThrowsExceptionWithUnknownProperty()
    {
        (new Company)->setNonExistent('');
    }

    /**
     * @return \ABC\Basic\Address
     */
    protected function expectedAddress1()
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

    /**
     * @return \ABC\Basic\Address
     */
    protected function expectedAddress2()
    {
        $address = new Address;

        $address->address1   = AddressTest::ADDRESS_2;
        $address->address2   = AddressTest::ADDRESS_1;
        $address->city       = AddressTest::CITY;
        $address->province   = AddressTest::PROVINCE;
        $address->country    = AddressTest::COUNTRY;
        $address->postalCode = AddressTest::POSTAL_CODE;

        return $address;
    }
}
