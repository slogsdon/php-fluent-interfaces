<?php

namespace ABC\Builder;

use \ABC\Builder\Address;
use \ABC\Builder\BuilderAbstract;

class AddressBuilder extends BuilderAbstract
{
    public $address = null;

    public function __construct($address = null)
    {
        if ($address != null) {
            $this->address = $address;
        } else {
            $this->address = new Address();
        }
    }
}
