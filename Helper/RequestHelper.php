<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\PaginatorBundle\Helper;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.lt>
 *
 * @since 1/26/14 5:19 PM
 */
class RequestHelper
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(Request $request, RouterInterface $router)
    {
        $this->request = $request;
        $this->router = $router;
    }

    /**
     * Get relative url.
     *
     * @param array $parameters
     *
     * @return string
     */
    public function getRelativeUrl(array $parameters = array())
    {
        $route = $this->request->attributes->get('_route');

        $parameters = array_merge($this->getParameters(), $parameters);

        return $this->router->generate($route, $parameters);
    }

    /**
     * Get parameters.
     *
     * @return array
     */
    private function getParameters()
    {
        $routeParameters = $this->request->attributes->get('_route_params');
        $parameters = $this->request->query->all();

        if ($routeParameters) {
            $parameters = array_merge($routeParameters, $parameters);
        }

        return $parameters;
    }
}
