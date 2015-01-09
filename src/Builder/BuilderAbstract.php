<?php

namespace ABC\Builder;

use \ABC\Builder\BuilderAction;

abstract class BuilderAbstract
{
    /** @var array(\ABC\Builder\BuilderAction) */
    protected $BuilderActions = array();

    /**
     * @return null
     */
    abstract public function execute();

    /**
     * @return \ABC\Builder\BaseAbstract
     */
    public function addAction($action)
    {
        $this->BuilderActions[] = $action;
        return $this;
    }
}
