<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Domain;

class InvalidDateEvenement extends \Exception
{
    public static function mustNotBeInThePast(): self
    {
        return new self('pas dans le passé');
    }
    public static function mustBeOkek(): self {
        return new self('la date de fin est supérieure à la date de début');
    }
}
