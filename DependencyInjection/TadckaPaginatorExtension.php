<?php

namespace Tadcka\PaginatorBundle\DependencyInjection;

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.lt>
 *
 * @since 1/26/14 5:12 PM
 */
class TadckaPaginatorExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        if (false === isset($config['template_class']) || false === isset($config['template_class']['pagination'])) {
            $config['template_class']['pagination'] = 'pagination';
        }

        if (false === isset($config['template_class']) || false === isset($config['template_class']['pagination_links'])) {
            $config['template_class']['pagination_links'] = 'pagination_links';
        }

        if (false === isset($config['template_class']) || false === isset($config['template_class']['pagination_link'])) {
            $config['template_class']['pagination_link'] = 'pagination_link';
        }

        if (false === isset($config['max_near_pages'])) {
            $config['max_near_pages'] = 2;
        }

        $container->setParameter('tadcka_paginator.pagination_class', $config['template_class']['pagination']);
        $container->setParameter('tadcka_paginator.pagination_links_class', $config['template_class']['pagination_links']);
        $container->setParameter('tadcka_paginator.pagination_link_class', $config['template_class']['pagination_link']);
        $container->setParameter('tadcka_paginator.max_near_pages', $config['max_near_pages']);
    }
}
