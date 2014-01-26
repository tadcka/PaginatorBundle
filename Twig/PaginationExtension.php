<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\PaginatorBundle\Twig;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Tadcka\PaginatorBundle\Helper\RequestHelper;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.lt>
 *
 * @since 1/26/14 5:12 PM
 */
class PaginationExtension extends \Twig_Extension
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * Constructor.
     *
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'tadcka_pagination_url' => new \Twig_Function_Method($this, 'getPaginationUrl', array())
        );
    }

    public function getPaginationUrl(Request $request, $routeName, array $parameters = array())
    {
        if ($routeName) {
            return $this->router->generate($routeName, $parameters);
        }

        return $this->getPaginationRelativeUrl($request, $parameters);
    }

    /**
     * Get relative url.
     *
     * @param Request $request
     * @param array $parameters
     *
     * @return string
     */
    private function getPaginationRelativeUrl(Request $request, array $parameters = array())
    {
        $relativeUrl = new RequestHelper($request, $this->router);

        return $relativeUrl->getRelativeUrl($parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'tadcka_pagination_extension';
    }
}
