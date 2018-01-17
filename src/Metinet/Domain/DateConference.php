<?php
namespace Core\Domains;
class DateConference {

    private $dateDebut;
    private $dateFin;

    private function __construct(DateTime $dateDebut, DateTime $dateFin)
    {
        if ($this->dateDebut < new \DateTimeImmutable('now') && $this->dateFin > new \DateTimeImmutable('now')) {
            throw InvalidDateConference::mustNotBeInThePast();
        }
        if ($this->dateFin > $this->dateDebut) {
            throw InvalidDateConference::mustBeOkek();
        }
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }
}