<?php 
    class Personnage
    {
        private $nom;
        private $prenom;
        private $age;
        private $sexe;

        public function __construct($nom, $prenom, $age, $sexe)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->age = $age;
            $this->sexe = $sexe;
        }

        public function presentation()
        {
            echo ("Nom : $this->nom $this->prenom, age : $this->age. $this->sexe.");
        }
    }
?>