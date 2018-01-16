<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';

use Metinet\Core\Http\Request;
use Metinet\Core\Http\Response;
use Metinet\Core\Routing\RouteUrlMatcher;
use Metinet\Core\Routing\RouteNotFound;
use Metinet\Core\Routing\JsonFileLoader;
use Metinet\Core\Routing\CsvFileLoader;
use Metinet\Core\Routing\PhpFileLoader;
use Metinet\Core\Routing\ChainLoader;
use Metinet\Core\Controller\ControllerResolver;

function throwError($message): Response {
    return new Response(sprintf('<p>Error: %s</p>', $message), 500);
}

$request = Request::createFromGlobals();

$loader = new ChainLoader([
    new JsonFileLoader([__DIR__ . '/../conf/routing.json']),
    new CsvFileLoader([__DIR__ . '/../conf/routing.csv']),
    new PhpFileLoader([__DIR__ . '/../conf/routing.php'])
]);

try {
    $controllerResolver = new ControllerResolver(new RouteUrlMatcher($loader->load()));
    $callableAction = $controllerResolver->resolve($request);
    $response = call_user_func($callableAction, $request);
} catch (RouteNotFound $e) {
    $response = new Response('Aucune page ici', 404);
} catch (Exception $e) {
    $response = throwError($e->getMessage());
}
$response->send();
