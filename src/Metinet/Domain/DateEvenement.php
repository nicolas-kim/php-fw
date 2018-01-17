<?php
namespace Core\Domains;
class DateEvenement {

    private $dateDebut;
    private $dateFin;

    private function __construct(DateTime $dateDebut, DateTime $dateFin)
    {
        if ($this->dateDebut < new \DateTimeImmutable('now') && $this->dateFin > new \DateTimeImmutable('now')) {
            throw InvalidDateEvenement::mustNotBeInThePast();
        }
        if ($this->dateFin > $this->dateDebut) {
            throw InvalidDateEvenement::mustBeOkek();
        }
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }
}