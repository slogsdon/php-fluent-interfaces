<?php

namespace ABC\Basic;

use \ABC\Basic\UnknownPropertyException;

/**
 * Base class for basic Fluent Interfaces
 * for child classes.
 */
abstract class Base
{
    /**
     * Allows for automatic setter functions
     * in child classes.
     *
     * @param string $name
     * @param array  $args
     *
     * @throws \ABC\Basic\UnknownPropertyException
     *
     * @return \ABC\Basic\Base
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
        return $this;
    }
}
