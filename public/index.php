<?php

require __DIR__ . '/../vendor/autoload.php';

use Metinet\Core\Http\Request;
use Metinet\Core\Http\Response;
use Metinet\Core\Routing\Route;
use Metinet\Core\Routing\RouteUrlMatcher;
use Metinet\Core\Routing\RouteNotFound;
use Metinet\Core\Routing\JsonFileLoader;
use Metinet\Core\Routing\CsvFileLoader;
use Metinet\Core\Routing\PhpFileLoader;
use Metinet\Core\Routing\ChainLoader;


function retrieveMemberList(): Response {
    $members = [
        ['name' => 'Boris', 'birthday' => '1984-08-21']
    ];
    $content = sprintf('<p>Affiche la liste des membres</p>');
    foreach ($members as $member) {
        $content .= sprintf('<li>%s</li>', $member['name']);
    }

    return new Response($content);
}

function sayHello(string $name = 'Anonymous'): Response {
    throw new Exception('Je ne dis pas bonjour aux Anonymous');
    return new Response(sprintf('<p>Hello %s</p>', $name));
}

function throwError($message): Response {
    return new Response(sprintf('<p>Error: %s</p>', $message), 500);
}

$request = Request::createFromGlobals();

$loader = new ChainLoader([
    new JsonFileLoader([__DIR__ . '/../conf/routing.json']),
    new CsvFileLoader([__DIR__ . '/../conf/routing.csv']),
    new PhpFileLoader([__DIR__ . '/../conf/routing.php'])
]);

$routeUrlMatcher = new RouteUrlMatcher($loader->load());

try {
    $action = $routeUrlMatcher->match($request);
    $response = call_user_func($action);
} catch (RouteNotFound $e) {
    $response = new Response('Aucune page ici', 404);
} catch (Exception $e) {
    $response = throwError($e->getMessage());
}
$response->send();
