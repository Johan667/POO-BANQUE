<?php

function chargerClasse($classe)
{
    require $classe.'.php';
}
spl_autoload_register('chargerClasse');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>PANEL ADMINISTRATEUR BANQUE</title>
</head>
<body>
    <div class="wrapper">
        <h1>BANQUE PHP EXPRESS </h1>
        <div class="container">
            <div class="containerclient1">

                <?php
                $david = new Titulaire('HELTON', 'David', '1997-05-02', 'Geneve');
                $louis = new Titulaire('HOST', 'Louis', '2003-04-30', 'Eckbolsheim');
                $Courant = new Compte('Compte courant', 1500, 'Francs Suisse', $david);
                $PEA = new Compte('PEA', 2000, 'Euro', $louis);
                $LivretA = new Compte('Livret A', 600, 'Euro', $louis);

                $david->affichercomptes();
                echo '<b><br>Transactions récentes:</b><br>';
                echo $Courant->depot(100);
                echo '<br>';
                echo $Courant->retrait(20);
                ?>

            </div>

                <div class="containerclient2">
                    <?php
                    $louis->affichercomptes();
                    echo '<b>Transactions récente:</b><br>';
                    echo $PEA->depot(3000);
                    echo ''.$PEA->virement(300, $Courant).'';
                    ?>
            </div>
        </div>
    </div>
</body>