<?php
namespace Core\Domains;
class ReservationEvenement {

    private $evenement;
    private $participant;

    private function __construct(Evenement $evenement, Participant $participant)
    {
        $this->evenement = $evenement;
        $this->participant = $participant;
    }
}