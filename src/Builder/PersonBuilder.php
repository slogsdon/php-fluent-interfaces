<?php

namespace ABC\Builder;

use \ABC\Builder\Person;
use \ABC\Builder\BuilderAbstract;

class PersonBuilder extends BuilderAbstract
{
    public $person = null;

    public function __construct($person = null)
    {
        if ($person != null) {
            $this->person = $person;
        } else {
            $this->person = new Person();
        }
    }
}
