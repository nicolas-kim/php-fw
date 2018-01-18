<?php

namespace Metinet\Controllers;

use Metinet\Core\Http\Request;
use Metinet\Core\Http\Response;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

class ConferencesController
{
    public function createConference(Request $request): Response {
        $nom = $_GET['nom'];
        return new Response(sprintf('nom: '.$nom, $request->getQuery()->get()));
    }
}
