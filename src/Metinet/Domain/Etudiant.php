<?php
namespace Core\Domains;
class Etudiant {
    private $nom;
    private $prenom;

    public function __construct(string $nom, string $prenom) {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
}