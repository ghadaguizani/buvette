<?php 
$serveurBD="localhost";
$nomUtilisateur="root";
$motDePasse="";
$basedeDonnees="dsi_projet_buvette";

$idConnexion=mysqli_connect('localhost', 'root', '', 'dsi_projet_buvette')
or die ("Probléme de connexion a la base!!");
//mysqli_select_db () est utilisée pour changer la base de données par défaut pour la connexion.
$connexionBase=mysqli_select_db($idConnexion,$basedeDonnees)
or die ("Probléme de selection de la base!!");
?>