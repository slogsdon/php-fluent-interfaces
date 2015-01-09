<?php

namespace ABC\Test\Basic;

use \PHPUnit_Framework_TestCase;
use \ABC\Basic\Address;

class AddressTest extends PHPUnit_Framework_TestCase
{
    /** @var string */
    const ADDRESS_1   = '123 One Way';

    /** @var string */
    const ADDRESS_2   = '';

    /** @var string */
    const CITY        = 'Anytown';

    /** @var string */
    const PROVINCE    = 'AK';

    /** @var string */
    const COUNTRY     = 'US';

    /** @var string */
    const POSTAL_CODE = '12345-6789';

    public function testCanSetupWithSetters()
    {
        $address = (new Address())->
            setAddress1(self::ADDRESS_1)->
            setAddress2(self::ADDRESS_2)->
            setCity(self::CITY)->
            setProvince(self::PROVINCE)->
            setCountry(self::COUNTRY)->
            setPostalCode(self::POSTAL_CODE);

        $this->assertEquals(self::ADDRESS_1, $address->address1);
        $this->assertEquals(self::ADDRESS_2, $address->address2);
        $this->assertEquals(self::CITY, $address->city);
        $this->assertEquals(self::PROVINCE, $address->province);
        $this->assertEquals(self::COUNTRY, $address->country);
        $this->assertEquals(self::POSTAL_CODE, $address->postalCode);
    }

    /** @expectedException \ABC\Basic\UnknownPropertyException */
    public function testThrowsExceptionWithUnknownProperty()
    {
        (new Address())->setNonExistent('');
    }

    public function testUnknownMethodReturnsFalse()
    {
        $this->assertEquals(false, (new Address())->notAMethod());
    }

    /**
     * @return \ABC\Basic\Address
     */
    protected function expectedAddress()
    {
        $address = new Address();

        $address->address1   = self::ADDRESS_1;
        $address->address2   = self::ADDRESS_2;
        $address->city       = self::CITY;
        $address->province   = self::PROVINCE;
        $address->country    = self::COUNTRY;
        $address->postalCode = self::POSTAL_CODE;

        return $address;
    }
}
