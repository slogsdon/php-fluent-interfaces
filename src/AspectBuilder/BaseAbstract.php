<?php

namespace ABC\AspectBuilder;

use \ABC\AspectBuilder\UnknownPropertyException;

/**
 * Base class for basic Fluent Interfaces
 * for child classes.
 */
abstract class BaseAbstract
{
    /**
     * Allows for automatic setter functions
     * in child classes.
     *
     * @param string $name
     * @param array  $args
     *
     * @throws \ABC\AspectBuilder\UnknownPropertyException
     *
     * @return \ABC\AspectBuilder\BaseAbstract
     */
    public function __call($name, array $args)
    {
        $action = substr($name, 0, 3);

        switch ($action) {
            case 'set':
                $property = substr($name, 3);
                $property = strtolower(substr($property, 0, 1)) . substr($property, 1);

                if (property_exists($this, $property)) {
                    $this->{$property} = $args[0];
                } else {
                    throw new UnknownPropertyException($this, $property);
                }
                break;
            default:
                return false;
        }
    }
}
