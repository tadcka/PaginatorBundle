<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\PaginatorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.lt>
 *
 * @since 1/26/14 5:12 PM
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tadcka_paginator');

        $rootNode
            ->children()
                ->integerNode('max_near_pages')->cannotBeEmpty()->end()
                ->arrayNode('template_class')->cannotBeEmpty()
                    ->children()
                        ->scalarNode('pagination')->cannotBeEmpty()->end()
                        ->scalarNode('pagination_links')->cannotBeEmpty()->end()
                        ->scalarNode('pagination_link')->cannotBeEmpty()->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
