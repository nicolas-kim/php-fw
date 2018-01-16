<?php

namespace Metinet\Controllers;

use Metinet\Core\Http\Response;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

class CandidatesController
{
    public function sayHello(): Response
    {
//        throw new \Exception('Je ne dis pas bonjour aux Anonymous :(');

        return new Response(sprintf('<p>Hello %s</p>', $name ?? 'Anonymous'));
    }

    public function disBonjour(): Response
    {
        return new Response(sprintf('<p>Bonjour %s</p>', $name ?? 'Anonyme'));
    }

    public  function retrieveMemberList(): Response {
        $members = [
            ['name' => 'Boris', 'birthday' => '1984-08-21']
        ];
        $content = sprintf('<p>Affiche la liste des membres</p>');
        foreach ($members as $member) {
            $content .= sprintf('<li>%s</li>', $member['name']);
        }

        return new Response($content);
    }
}
