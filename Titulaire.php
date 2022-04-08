<?php

class Titulaire
{
    private $_nom;
    private $_prenom;
    private $_age;
    private $_ville;
    private $_comptes;

    public function __construct($nom, $prenom, $age, $ville)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_age = $age;
        $this->_ville = $ville;
        $this->_comptes = [];
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function getAge()
    {
        $calcul = date_diff(date_create($this->_age), date_create('now'));

        return $calcul->format('%Y ans');
    }

    public function getVille()
    {
        return $this->_ville;
    }

    public function getNumCompte()
    {
        return $this->_numcompte;
    }

    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;
    }

    public function setAge($age)
    {
        $this->_age = $age;
    }

    public function setVille($ville)
    {
        $this->_ville = $ville;
    }

    public function ajouterCompte(Compte $comptes)
    {
        $this->_comptes[] = $comptes;
    }

    public function affichercomptes()
    {
        echo "<b>Informations Comptes Client</b><br><br>$this<br><ul>";
        foreach ($this->_comptes as $compte) {
            echo "<li>$compte</li>";
        }
        echo '</ul>';
    }

    public function __toString()
    {
        return 'Compte de&nbsp;'.$this->_prenom.' '.$this->_nom.'<br>'.$this->_age.'<br>'.$this->_ville.'<br><br>';
    }
}
