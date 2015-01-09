<?php

namespace ABC\AspectBuilder;

use \ABC\AspectBuilder\AspectBuilderAction;

abstract class AspectBuilderAbstract
{
    /** @var array(\ABC\AspectBuilder\AspectBuilderAction) */
    protected $AspectBuilderActions = array();

    /**
     * @return null
     */
    abstract public function execute();

    /**
     * @return \ABC\AspectBuilder\BaseAbstract
     */
    public function addAction($action)
    {
        $this->AspectBuilderActions[] = $action;
        return $this;
    }
}
