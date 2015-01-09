<?php

namespace ABC\AspectBuilder;

use \Go\Aop\Aspect;
use \Go\Aop\Intercept\MethodInvocation;
use \Go\Lang\Annotation\Around;
use \Go\Lang\Annotation\Before;
use \ABC\AspectBuilder\BaseAbstract;

class FluentAspect implements Aspect
{
    /**
     * @Around("within(BaseAbstract+) && execution(public **->__call(*))")
     *
     * @param MethodInvocation $invocation
     *
     * @return mixed|null|object
     */
    protected function aroundMethodExecution(MethodInvocation $invocation)
    {
        $args = $invocation->getArguments();
        switch (true) {
            case substr($args[0], 0, 3) === 'set':
                return $this->aroundSetMethodExecution($invocation);
                break;
            case substr($args[0], 0, 8) === 'validate':
                return $this->aroundValidateMethodExecution($invocation);
                break;
        }
    }

    /**
     * Before("dynamic(public ABC\AspectBuilder\BaseAbstract->set*(*))")
     *
     * @param MethodInvocation $invocation
     *
     * @return mixed|null|object
     */
    protected function aroundSetMethodExecution(MethodInvocation $invocation)
    {
        $result = $invocation->proceed();
        return $result !== null ? $result : $invocation->getThis();
    }

    /**
     * Around("within(BaseAbstract+) && dynamic(public **->validate*(*))")
     *
     * @param MethodInvocation $invocation
     *
     * @return mixed|null|object
     */
    protected function aroundValidateMethodExecution(MethodInvocation $invocation)
    {
        $result = $invocation->proceed();
        return $result !== null ? $result : true;
    }
}
