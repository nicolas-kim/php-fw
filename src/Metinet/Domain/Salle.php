<?php
namespace Core\Domains;
class Salle {
    private $nom;
    private $lieu;
    private $placesMaximum;

    public function __construct(string $nom, string $lieu, int $placesMaximum) {
        $this->nom = $nom;
        $this->lieu = $lieu;
        $this->placesMaximum = $placesMaximum;
    }

    public function getPlacesMaximum() {
        return $this->placesMaximum;
    }
}