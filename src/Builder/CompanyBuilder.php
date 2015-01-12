<?php

namespace ABC\Builder;

use \ABC\Builder\BuilderAbstract;
use \ABC\Builder\Address;
use \ABC\Builder\Company;
use \ABC\Builder\Person;
use \DOMDocument;

class CompanyBuilder extends BuilderAbstract
{
    /** @var \ABC\Builder\Company */
    public $company      = null;

    public function __construct()
    {
        $this->company = new Company();
        $this->setUpValidations();
    }

    /**
     * @param \ABC\Builder\Address $address
     *
     * @return \ABC\Builder\Company
     */
    public function withAddress(Address $address)
    {
        $action = new CompanyBuilderAction('withAddress', array($this->company, 'appendAddress'));
        $action->arguments = array($address);
        $this->addAction($action);
        return $this;
    }

    /**
     * @param \ABC\Builder\Person $person
     *
     * @return \ABC\Builder\Company
     */
    public function withPerson(Person $person)
    {
        $action = new CompanyBuilderAction('withPerson', array($this->company, 'appendPerson'));
        $action->arguments = array($person);
        $this->addAction($action);
        return $this;
    }

    /**
     * Returns executed object as JSON.
     * Throws an exception when builder actions
     * have not been executed.
     *
     * @throws \Exception
     *
     * @return string
     */
    public function asJson()
    {
        $this->checkStatus();
        return json_encode($this->company);
    }

    /**
     * Returns executed object as XML.
     * Throws an exception when builder actions
     * have not been executed.
     *
     * @throws \Exception
     *
     * @return string
     */
    public function asXml()
    {
        $this->checkStatus();

        $xml = new DOMDocument('1.0', 'utf-8');
        $company = $xml->createElement('Company');

        $addresses = $xml->createElement('Addresses');
        foreach ($this->company->addresses as $address) {
            $addressElement = $xml->createElement('Address');
            $addressElement->appendChild($xml->createElement('Address1', $address->address1));
            $addressElement->appendChild($xml->createElement('Address2', $address->address2));
            $addressElement->appendChild($xml->createElement('City', $address->city));
            $addressElement->appendChild($xml->createElement('State', $address->province));
            $addressElement->appendChild($xml->createElement('PostalCode', $address->postalCode));
            $addressElement->appendChild($xml->createElement('Country', $address->country));
            $addresses->appendChild($addressElement);
        }
        unset($address);

        $people = $xml->createElement('Employees');
        foreach ($this->company->people as $person) {
            $personElement = $xml->createElement('Person');
            $personElement->appendChild($xml->createElement('FirstName', $person->firstName));
            $personElement->appendChild($xml->createElement('LastName', $person->lastName));
            $people->appendChild($personElement);
        }
        unset($person);

        $company->appendChild($addresses);
        $company->appendChild($people);
        $xml->appendChild($company);

        return $xml->saveXml();
    }

    /**
     * Ensures there is at least one address.
     *
     * @param arraay $actionCounts
     *
     * @return bool
     */
    public function atLeastOneAddress($actionCounts)
    {
        return isset($actionCounts['withAddress']) && $actionCounts['withAddress'] > 0;
    }

    /**
     * Ensures there is at least one person.
     *
     * @param arraay $actionCounts
     *
     * @return bool
     */
    public function atLeastOnePerson($actionCounts)
    {
        return isset($actionCounts['withPerson']) && $actionCounts['withPerson'] > 0;
    }

    /**
     * Setups up validations for building Company objects.
     *
     * @return null
     */
    private function setUpValidations()
    {
        $this
            ->addValidation(array($this, 'atLeastOneAddress'), 'Exception', 'Company needs at least one address')
            ->addValidation(array($this, 'atLeastOnePerson'), 'Exception', 'Company needs at least one person');
    }
}
