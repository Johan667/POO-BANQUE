
<?php

class Compte
{
    private $_libelle;
    private $_devise;
    private $_balance;
    private $_titulaire;

    public function __construct($libelle, $balance, $devise, Titulaire $titulaire)
    {
        $this->_libelle = $libelle;
        $this->_balance = $balance;
        $this->_devise = $devise;
        $this->_titulaire = $titulaire;
        $titulaire->ajouterCompte($this);
    }

    public function getLibelle()
    {
        return $this->_libelle;
    }

    public function getDevise()
    {
        return $this->_devise;
    }

    public function getTitulaire()
    {
        return $this->_titulaire;
    }

    // Afficher le solde
    public function getBalance()
    {
        echo '<br><p><u>'.$this->_libelle.'</u><br>&nbsp;<b>Solde IMMEDIAT:&nbsp; '.$this->_balance.'&nbsp;  '.$this->_devise.'</p></b><br>';
    }

    public function setLibelle($libelle)
    {
        $this->_libelle = $libelle;
    }

    public function setDevise($devise)
    {
        $this->_devise = $devise;
    }

    public function setTitulaire($titulaire)
    {
        $this->_titulaire = $titulaire;
    }

    // Depot
    public function depot($somme)
    {
        $affic = '<ul><li>Dépot de <b>';
        $affic = $somme;
        $affic .= '</b>&nbsp; ';
        $affic .= $this->_devise;
        $affic .= '</ul></li>';
        $this->_balance += $somme;

        return $affic;
    }

    // Retrait
    public function retrait($somme)
    {
        $affi = '<ul><li>Retrait de <b>';
        $affi = $somme;
        $affi .= '</b>&nbsp; ';
        $affi .= $this->_devise;
        $affi .= '</ul></li>';
        $this->_balance -= $somme;

        return $affi;
    }

    // Virement
    public function virement($somme_virement, $cible)
    {
        $this->retrait($somme_virement);
        $cible->depot($somme_virement);
        $aff = ' Votre virement de ';
        $aff .= $somme_virement;
        $aff .= '&nbsp';
        $aff .= $this->_devise;
        $aff .= '&nbsp';
        $aff .= 'à été éffectuer avec succès<br> Votre Solde ';
        $aff .= " $this->_libelle : $this->_balance";
        $aff .= '&nbsp';
        $aff .= $this->_devise;

        return $aff;
    }

    public function __toString()
    {
        return $this->_libelle.' 
        <br> <b>SOLDE INITIAL</b>:&nbsp;'.$this->_balance.'&nbsp;'.$this->_devise.'<br>';
    }
}
