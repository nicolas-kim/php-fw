<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Core\Routing;

class PhpFileLoader implements FileLoader
{
    private $paths;

    public function __construct(array $paths)
    {
        $this->paths = $paths;
    }

    public function load(): RouteCollection
    {
        $routes = new RouteCollection();

        foreach ($this->paths as $path) {
            $phpRoutes = require $path;
            foreach ($phpRoutes as $route) {
                $routes->add($route);
            }
        }

        return $routes;
    }
}
