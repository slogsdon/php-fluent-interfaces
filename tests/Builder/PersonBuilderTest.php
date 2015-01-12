<?php

namespace ABC\Test\Builder;

use \PHPUnit_Framework_TestCase;
use \ABC\Builder\Person;
use \ABC\Builder\PersonBuilder;

class PersonBuilderTest extends PHPUnit_Framework_TestCase
{
    public function testBuilderWithInitialValueNoActions()
    {
        $builder = new PersonBuilder($this->expectedPerson());

        $this->assertEquals($this->expectedPerson(), $builder->person);

        $builder = $builder->executeActions();

        $this->assertEquals($this->expectedPerson(), $builder->person);
    }

    public function testBuilderWithoutInitialValueNoActions()
    {
        $builder = new PersonBuilder();

        $builder = $builder->executeActions();

        $this->assertEquals(new Person(), $builder->person);
    }

    /** @var \ABC\Builder\Person */
    protected function expectedPerson()
    {
        $person = new Person();
        $person->firstName = 'John';
        $person->firstName = 'Smith';
        return $person;
    }
}
