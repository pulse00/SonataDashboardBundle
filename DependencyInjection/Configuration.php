<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) 2010-2011 Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\DashboardBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('sonata_dashboard')->children();

        $node
            ->arrayNode('google')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('authorize_template')->defaultValue('SonataDashboardBundle:Block/Google:authorize.html.twig')->end()
                    ->scalarNode('chart_width')->defaultValue(700)->end()
                    ->scalarNode('chart_height')->defaultValue(300)->end()
                    ->scalarNode('chart_days')->defaultValue(30)->end()
                    ->arrayNode('stats')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('visits')
                            ->defaultTrue()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
        
    }
}
