<?php

namespace Controllers;

use Core\Http\Request;
use Core\Http\Response;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

class ConferencesController
{
    public function createConference(Request $request): Response {
        $nom = $_POST['nom'];
        return new Response(sprintf('nom: '.$nom, $request->getQuery()->get()));
    }
}
