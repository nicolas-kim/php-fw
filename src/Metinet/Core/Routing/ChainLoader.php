<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Core\Routing;

class ChainLoader implements FileLoader
{
    /** @var FileLoader[] */
    private $loaders;

    public function __construct(array $loaders)
    {
        $this->loaders = $loaders;
    }

    public function load(): RouteCollection
    {
        $routes = new RouteCollection();
        foreach ($this->loaders as $loader) {
            foreach ($loader->load()->all() as $route) {
                $routes->add($route);
            }
        }

        return $routes;
    }
}
