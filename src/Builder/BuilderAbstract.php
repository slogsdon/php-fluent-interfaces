<?php

namespace ABC\Builder;

use \ABC\Builder\BuilderAction;
use \Exception;

abstract class BuilderAbstract
{
    /** @var array(\ABC\Builder\BuilderAction) */
    public $builderActions = array();

    /** @var bool */
    public $executed       = false;

    /** @var array(callable) */
    public $validations    = array();

    /**
     * @return null
     */
    public function execute()
    {
        foreach ($this->builderActions as $action) {
            call_user_func_array($action->action, $action->arguments);
        }
        $this->validate();
        $this->executed = true;
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

    /**
     * @throws \Exception
     */
    public function checkStatus()
    {
        if (!$this->executed) {
            throw new Exception('Builder actions not executed');
        }
    }

    /**
     * @throws \Exception
     */
    protected function validate()
    {
        $actions = $this->compileActionCounts();
        foreach ($this->validations as $validation) {
            $result = call_user_func_array($validation['callback'], array($actions));
            if (!$result) {
                $class = $validation['exceptionType'];
                throw new $class($validation['exceptionMessage']);
            }
        }
    }

    /**
     * @return array
     */
    protected function compileActionCounts()
    {
        $counts = array();

        foreach ($this->builderActions as $action) {
            $counts[$action->name] = isset($counts[$action->name]) ? $counts[$action->name]+1 : 1;
        }

        return $counts;
    }

    /**
     * @param callable $callback
     * @param string   $exceptionType
     * @param string   $exceptionMessage
     *
     * @return \ABC\Builder\BuilderAbstract
     */
    protected function addValidation($callback, $exceptionType, $exceptionMessage = '')
    {
        $this->validations[] = array(
            'callback' => $callback,
            'exceptionType' => $exceptionType,
            'exceptionMessage' => $exceptionMessage,
        );
        return $this;
    }
}
