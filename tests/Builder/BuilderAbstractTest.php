<?php

namespace ABC\Test\Builder;

use \PHPUnit_Framework_TestCase;
use \ABC\Builder\BuilderAction;
use \ABC\Test\Builder\SimpleBuilder;

class BuilderAbstractTest extends PHPUnit_Framework_TestCase
{
    /** @var string */
    const BUILDER_ACTION_NAME   = 'actionName';

    /** @var null */
    const BUILDER_ACTION_ACTION = null;

    public function testCanAddActions()
    {
        $builder = new SimpleBuilder();
        $action = $this->expectedAction();

        $builder->addAction($action);

        $this->assertEquals($this->expectedAction(), $builder->builderActions[0]);
    }

    /** @var \ABC\Builder\BuilderAction.php */
    protected function expectedAction()
    {
        $action = new BuilderAction();
        $action->name = self::BUILDER_ACTION_NAME;
        $action->action = self::BUILDER_ACTION_ACTION;
        return $action;
    }

    /** @returns null */
    protected function hello()
    {
    }
}
