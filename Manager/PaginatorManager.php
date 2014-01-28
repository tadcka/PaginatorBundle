<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\PaginatorBundle\Manager;

use Symfony\Component\Templating\EngineInterface;
use Tadcka\Component\Paginator\Pagination;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 1/26/14 7:52 PM
 */
class PaginatorManager 
{
    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var string
     */
    private $paginationClass;

    /**
     * @var string
     */
    private $paginationLinksClass;

    /**
     * @var string
     */
    private $paginationLinkClass;

    /**
     * @var int
     */
    private $maxNearPages;

    /**
     * Constructor.
     *
     * @param EngineInterface $templating
     * @param string $paginationClass
     * @param string $paginationLinksClass
     * @param string $paginationLinkClass
     * @param string $maxNearPages
     */
    public function __construct(EngineInterface $templating, $paginationClass, $paginationLinksClass, $paginationLinkClass, $maxNearPages)
    {
        $this->templating = $templating;
        $this->paginationClass = $paginationClass;
        $this->paginationLinksClass = $paginationLinksClass;
        $this->paginationLinkClass = $paginationLinkClass;
        $this->maxNearPages = $maxNearPages;
    }

    /**
     * Get paginator html.
     *
     * @param Pagination $pagination
     * @param null|string $routeName
     * @param array $routeParameters
     *
     * @return string
     */
    public function getPaginatorHtml(Pagination $pagination, $routeName = null, $routeParameters = array())
    {
        return $this->templating->render(
            'TadckaPaginatorBundle::pagination.html.twig',
            array(
                'pagination' => $pagination,
                'route_name' => $routeName,
                'route_parameters' => $routeParameters,
                'pagination_class' => $this->paginationClass,
                'pagination_links_class' => $this->paginationLinksClass,
                'pagination_link_class' => $this->paginationLinkClass,
                'max_near_pages' => $this->maxNearPages,
            )
        );
    }
}
