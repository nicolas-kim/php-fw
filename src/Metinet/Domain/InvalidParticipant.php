<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Domain;

class InvalidParticipant extends \Exception
{
    public static function mustBeParticipant(): self
    {
        return new self("c'est pas un participant ça");
    }

    public static function alreadyExists(): self
    {
        return new self("déjà dans la liste");
    }

    public static function notEnoughPlaces(): self
    {
        return new self("pas assez de places pour accueillir tout ça");
    }
}
