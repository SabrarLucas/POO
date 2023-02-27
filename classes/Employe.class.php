<?php
    class Employe
    {
        public $nom;
        public $prenom;
        public $dateEmbauche;
        public $poste;
        public $salaire;
        public $service;

        public function __construct($nom, $prenom, $dateEmbauche, $poste, $salaire, $service)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->dateEmbauche = $dateEmbauche;
            $this->poste = $poste;
            $this->salaire = $salaire;
            $this->service = $service;
        }

        public function presEmploye()
        {
            echo "$this->nom $this->prenom <br>
            $this->poste, $this->salaire € brut annuelle.<br>";
        }

        public function nbDAnnee()
        {
            $today = date("d/m");

            $dateVersement = "11/30";    // day / month
            $datejour = new DateTime();
            $dateEntree = new DateTime($this->dateEmbauche);
            //calcul du nombre d'année dans l'entreprise
            $intv = $datejour->diff($dateEntree);
            echo "$intv->y années dans l'entreprise.<br>";
            //calcul des primes
            $prime = $this->salaire * (5/100);  //prime fin d'année
            $ancien = $this->salaire * ((2/100)*$intv->y);  //prime ancien
            $total = $prime + $ancien;  
            
            if($today == $dateVersement)
            {
                echo "L'ordre de transfert a été envoyé à la banque d'un montant de $total € pour vos primes<br>";
            }

            if($intv->y > 1)
            {
                echo "Peut avoir des chèques-vacances<br>";
            }
        }
    }

    class Magasins extends Employe
    {
        public $nomMaga;
        public $adresse;
        public $codePostal;
        public $ville;
        public $restoration;

        public function __construct($nom, $prenom, $dateEmbauche, $poste, $salaire, $service, $nomMaga, $adresse, $codePostal, $ville, $restoration)
        {
            parent::__construct($nom, $prenom, $dateEmbauche, $poste, $salaire, $service);

            $this->nomMaga = $nomMaga;
            $this->adresse = $adresse;
            $this->codePostal = $codePostal;
            $this->ville = $ville;
            $this->restoration = $restoration;
        }

        public function affiche()
        {
            echo "$this->nom $this->prenom<br>
            Il est dans le magasin '$this->nomMaga', situer au $this->adresse $this->codePostal, $this->ville.<br>";
        }

        public function Resto()
        {
            if($this->restoration == "self")
            {
                echo "Bénéficient d'un restaurant d'entreprise<br>";
            } elseif($this->restoration == "ticket")
            {
                echo "Pas de self, des tickets resto<br>";
            }
        }
    }

    //employee = new Employe("$nom", "$prenom", "$dateEmbauche(Y-m-d)", "$poste", $salaire, "$service")
    $employee1 = new Employe("Lucas", "Pinchon", "2001-01-03", "Patron", 300000, "Dev");
    $employee2 = new Employe("Paul", "fezecz", "2023-01-30", "Stagiaire", 1000, "Comm");
    $employee3 = new Employe("Jacque", "eczqec", "2013-09-30", "Chef", 15000, "Comm");
    $employee4 = new Employe("Pierre", "azerty", "2012-11-30", "Chef", 10000, "Comm");
    $employee5 = new Employe("Magalie", "azerty", "2021-01-25", "Chef", 60000, "Comm");

    $employee1->presEmploye();
    $employee1->nbDAnnee();
    echo "<br>";

    $employee2->presEmploye();
    $employee2->nbDAnnee();
    echo "<br>";

    $employee3->presEmploye();
    $employee3->nbDAnnee();
    echo "<br>";

    $employee4->presEmploye();
    $employee4->nbDAnnee();
    echo "<br>";

    $employee5->presEmploye();
    $employee5->nbDAnnee();
    echo "<br>";

    $magasin1 = new Magasins("Lucas", "Pinchon", "2001-01-03", "Patron", 300000, "Dev", "Magasin","70 rue Quelque Part", 80000, "Amiens", "ticket");
    $magasin2 = new Magasins("Paul", "fezecz", "2010-10-30", "Stagiaire", 1000, "Comm", "Magasin2","70 rue Quelque Part", 80000, "Amiens", "self");
    $magasin3 = new Magasins("Jacque", "eczqec", "2013-09-30", "Chef", 15000, "Comm", "Magasin3","70 rue Quelque Part", 80000, "Amiens", "self");

    $magasin1->affiche();
    $magasin1->Resto();
    echo "<br>";

    $magasin2->affiche();
    $magasin2->Resto();
    echo "<br>";

    $magasin3->affiche();
    $magasin3->Resto();
?>