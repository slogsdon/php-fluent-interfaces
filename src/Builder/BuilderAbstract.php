<?php

namespace ABC\Builder;

use \ABC\Builder\BuilderAction;

abstract class BuilderAbstract
{
    /** @var array(\ABC\Builder\BuilderAction) */
    public $builderActions = array();

    /**
     * @return null
     */
    public function executeActions()
    {
        foreach ($this->builderActions as $action) {
            call_user_func_array($action->action, $action->arguments);
        }
        return $this;
    }

    /**
     * @return \ABC\Builder\BaseAbstract
     */
    public function addAction($action)
    {
        $this->builderActions[] = $action;
        return $this;
    }
}
