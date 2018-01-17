<?php
namespace Core\Domains;
class Externe {
    private $nom;
    private $prenom;

    public function __construct(string $nom, string $prenom) {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
}