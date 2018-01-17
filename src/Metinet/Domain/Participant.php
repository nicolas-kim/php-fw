<?php
namespace Core\Domains;
class Participant {
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $type;

    public function __construct(string $nom, string $prenom, string $email, int $telephone) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
    }
}