<?php

namespace ABC\Test\Builder;

use \PHPUnit_Framework_TestCase;
use \ABC\Builder\Address;
use \ABC\Builder\Company;
use \ABC\Builder\CompanyBuilder;
use \ABC\Builder\Person;

class CompanyBuilderTest extends PHPUnit_Framework_TestCase
{
    public function testBuilderExecutionAddsValuesToProperties()
    {
        $builder = new CompanyBuilder();
        $builder = $builder
            ->withAddress($this->address())
            ->withPerson($this->person1())
            ->withPerson($this->person2());

        $this->assertEquals(new Company(), $builder->company);

        $builder = $builder->executeActions();

        $this->assertEquals($this->expectedCompany(), $builder->company);
    }

    public function testBuilderWithInitialValueNoActions()
    {
        $builder = new CompanyBuilder($this->expectedCompany());

        $this->assertEquals($this->expectedCompany(), $builder->company);

        $builder = $builder->executeActions();

        $this->assertEquals($this->expectedCompany(), $builder->company);
    }

    public function testBuilderWithInitialValueSomeActions()
    {
        $company = new Company();
        $company->addresses = array($this->address());

        $builder = new CompanyBuilder($company);
        $builder = $builder
            ->withPerson($this->person1())
            ->withPerson($this->person2());

        $builder = $builder->executeActions();

        $this->assertEquals($this->expectedCompany(), $builder->company);
    }

    public function testBuilderAsJson()
    {
        $builder = new CompanyBuilder($this->expectedCompany());
        $json = $builder->asJson();

        $this->assertEquals($this->expectedJson(), $json);
    }

    public function testBuilderAsXml()
    {
        $builder = new CompanyBuilder($this->expectedCompany());
        $xml = $builder->asXml();

        $this->assertEquals($this->expectedXml(), $xml);
    }

    /** @var \ABC\Builder\Company */
    protected function expectedCompany()
    {
        $company = new Company();
        $company->addresses = array($this->address());
        $company->people = array($this->person1(), $this->person2());
        return $company;
    }

    /** @var string */
    protected function expectedJson()
    {
        return '{"name":null,"addresses":[{"address1":null,"address2":null,"city":null,"province":null,"country":null,"postalCode":"12345"}],"people":[{"firstName":"John","lastName":"Smith","address":null},{"firstName":"Tom","lastName":"Smith","address":null}]}';
    }

    /** @var string */
    protected function expectedXml()
    {
        return "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<Company><Addresses><Address><Address1/><Address2/><City/><State/><PostalCode>12345</PostalCode><Country/></Address></Addresses><Employees><Person><FirstName>John</FirstName><LastName>Smith</LastName></Person><Person><FirstName>Tom</FirstName><LastName>Smith</LastName></Person></Employees></Company>\n";
    }

    /** @var \ABC\Builder\Address */
    protected function address()
    {
        $address = new Address();
        $address->postalCode = '12345';
        return $address;
    }

    /** @var \ABC\Builder\Person */
    protected function person1()
    {
        $person = new Person();
        $person->firstName = 'John';
        $person->lastName = 'Smith';
        return $person;
    }

    /** @var \ABC\Builder\Person */
    protected function person2()
    {
        $person = new Person();
        $person->firstName = 'Tom';
        $person->lastName = 'Smith';
        return $person;
    }
}
