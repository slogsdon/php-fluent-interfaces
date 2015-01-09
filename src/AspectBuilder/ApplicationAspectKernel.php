<?php

namespace ABC\AspectBuilder;

use \Go\Core\AspectKernel;
use \Go\Core\AspectContainer;
use \ABC\AspectBuilder\FluentAspect;

class ApplicationAspectKernel extends AspectKernel
{
    /**
     * Configure an AspectContainer with advisors,
     * aspects, and pointcuts.
     *
     * @param AspectContainer $container
     *
     * @return void
     */
    protected function configureAop(AspectContainer $container)
    {
        $container->registerAspect(new FluentAspect());
    }
}
