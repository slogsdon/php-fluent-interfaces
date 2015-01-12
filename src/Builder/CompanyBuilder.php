<?php

namespace ABC\Builder;

use \ABC\Builder\BuilderAbstract;
use \ABC\Builder\Address;
use \ABC\Builder\Company;
use \ABC\Builder\Person;
use \DOMDocument;

class CompanyBuilder extends BuilderAbstract
{
    public $company      = null;

    public function __construct($company = null)
    {
        if ($company != null) {
            $this->company = $company;
        } else {
            $this->company = new Company();
        }
    }

    public function withAddress(Address $address)
    {
        $action = new CompanyBuilderAction('withAddress', array($this->company, 'appendAddress'));
        $action->arguments = array($address);
        $this->addAction($action);
        return $this;
    }

    public function withPerson(Person $person)
    {
        $action = new CompanyBuilderAction('withPerson', array($this->company, 'appendPerson'));
        $action->arguments = array($person);
        $this->addAction($action);
        return $this;
    }

    public function asJson()
    {
        return json_encode($this->company);
    }

    public function asXml()
    {
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
}
