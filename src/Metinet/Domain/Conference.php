<?php
namespace Core\Domains;
use Core\Domains\DateConference;
use Core\Domains\Salle;
class Conference {
    private $nom;
    private $description;
    private $objectifs;
    private $type;
    private $date;
    private $salle;
    private $nombrePlaces;
    private $participants;
    private $prixPlace;

    public function __construct(string $nom, string $description, array $objectifs, int $type, DateConference $date, Salle $salle, int $nombrePlaces, ?float $prixPlace = 0) {
        $this->nom = $nom;
        $this->description = $description;
        $this->objectifs = $objectifs;
        $this->type = $type;
        $this->date = $date;
        $this->salle = $salle;
        $this->nombrePlaces = $nombrePlaces;
        $this->prixPlace = $prixPlace;
    }

    public function addParticipants(array $participants) {
        foreach($participants as $participant) {
            if(!is_a($participant, 'Participant')) {
                throw InvalidParticipant::mustBeParticipant();
            }
            if(in_array($participant, $this->participants)) {
                throw InvalidParticipant::alreadyExists();
            }
            if(count($participants) + $this->participants > count($this->salle->getPlacesMaximum())) {
                throw InvalidParticipant::notEnoughPlaces();
            }
            array_push($this->participants, $participant);
        }
    }
}