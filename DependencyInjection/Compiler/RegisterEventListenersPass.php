<?php
namespace Sonata\DashboardBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RegisterEventListenersPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $renderListeners = $container->findTaggedServiceIds('sonata.layout.render');
        $definition = $container->getDefinition('event_dispatcher');
        
        foreach ($renderListeners as $id => $listener)
        {
            $definition->addMethodCall('addListenerService', array('sonata.layout.render.body_end', array($id, 'onBeforeBodyEnd'), 0));            
        }        
    }
}
