<?php

namespace ABC\AspectBuilder;

use \Exception;

/**
 * Exception to be thrown when a property that
 * doesn't exist attempts to be set using
 * \ABC\AspectBuilder\BaseAbstract::__call magic method.
 */
class UnknownPropertyException extends Exception
{
    /**
     * Instantiates new \ABC\AspectBuilder\UnknownPropertyException.
     *
     * @param object     $obj
     * @param string     $property
     * @param int        $code
     * @param \Exception $inner
     *
     * @return \ABC\AspectBuilder\UnknownPropertyException
     */
    public function __construct($obj, $property, $code = 0, Exception $inner = null)
    {
        $className = get_class($obj) || 'Unknown Class';
        $message = 'Failed to set non-existent property "' . $property
                 . '" on class "' . $className . '"';
        parent::__construct($message, $code, $inner);
    }
}
