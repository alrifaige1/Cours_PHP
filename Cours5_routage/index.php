<?php 
session_start() // commencer la session : toutes les variables de sessions ($_SESSION[''])
?>

<?php
require 'config.php'; // importe les fct qui sont dans config.php
?>


<title>Routage</title>

<h1>Je suis sur la page index</h1>
<h2>Hello World !</h2>

<?php
  if(isset ($_SESSION['message'])){ // verifie si on se connecte au site (connexion.php) : 
    echo $_SESSION['message']; // si on y arrive alors succes SINON erreur
  }
?>

<?php
require 'controllers/menu.php'; // affiche les liens de chaques pages sans les ecrire dans chaques fichiers


if(isset($_GET['page'])) {
  $page = $_GET["page"];
  require("controllers/$page");
} 

if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["password"])) {
  createUser($_POST["nom"], $_POST["prenom"], $_POST["password"]);
}

if($_SESSION["connected"]) {
  getUsers();  
} else {
  echo "User not connected";
}
?>

<footer style="width: 100%; height: 50px; background-color: #333; color: #fff; display: flex; justify-content: center; align-items: center; position: absolute; bottom: 0;">
  <p>COPYRIGHT 2023 - Tous Droits Réservés</p>
  <p>Al Rifai Asma</p>
</footer>