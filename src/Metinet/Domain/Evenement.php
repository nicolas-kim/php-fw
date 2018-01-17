<?php
namespace Core\Domains;
use Core\Domains\DateEvenement;
use Core\Domains\Salle;
class Evenement {
    private $nom;
    private $description;
    private $objectifs;
    private $type;
    private $date;
    private $salle;
    private $nombrePlaces;

    public function __construct(string $nom, string $description, array $objectifs, int $type, DateEvenement $date, Salle $salle, int $nombrePlaces) {
        $this->nom = $nom;
        $this->description = $description;
        $this->objectifs = $objectifs;
        $this->type = $type;
        $this->date = $date;
        $this->salle = $salle;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getType(): int {
        return $this->type;
    }

    public function getDate(): DateEvenement {
        return $this->date;
    }

    public function getSalle(): Salle {
        return $this->salle;
    }
}