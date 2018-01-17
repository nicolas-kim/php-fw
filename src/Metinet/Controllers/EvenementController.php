<?php

namespace Controllers;

use Core\Http\Request;
use Core\Http\Response;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

class EvenementController
{
    public function createEvenement(Request $request): Response {
        $nom = $_POST['nom'];
        return new Response(sprintf('nom: '.$nom, $request->getQuery()->get('nom', 'oui')));
    }

    public function sayHello(Request $request): Response
    {
        return new Response(sprintf('<p>Hello %s</p>', $request->getQuery()->get('name', 'Anonymous')));
    }
}
