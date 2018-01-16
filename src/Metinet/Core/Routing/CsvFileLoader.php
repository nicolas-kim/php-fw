<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Core\Routing;

class CsvFileLoader implements FileLoader
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
            $f = fopen($path, 'rb');
            while (false !== $data = fgetcsv($f)) {
                [,$path, $methods, $action] = $data;
                $methods = explode('|', $methods);
                $routes->add(new Route(
                    $methods,
                    $path,
                    $action
                ));
            }
}

        return $routes;
    }
}
