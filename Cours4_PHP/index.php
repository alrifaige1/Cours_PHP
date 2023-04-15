<?php 
session_start()
?>

<?php
require 'config.php';
?>


<title>"Page generale"</title>

<h1>Je suis sur la page index</h1>
<h2>Hello World !</h2>

<?php
    if(isset ($_SESSION['message'])){
        echo $_SESSION['message'];
    }
?>

<ul>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="login.php">Connexion</a></li>
    <li><a href="profil.php">page_profil</a></li>
    <li><a href="inscription.php">page_inscription</a></li>
</ul>

<?php
    dbConnect();
    // getUsers(); //pour verifier si on pouvait s'inscrire et vérifier si les mots de passes
    // étaient justes par rapport à la base de données
?>


<footer style="width: 100%; height: 50px; background-color: #333; color: #fff; display: flex; justify-content: center; align-items: center; position: absolute; bottom: 0;">
  <p>COPYRIGHT 2023 - Tous Droits Réservés</p>
  <p>Al Rifai Asma</p>
</footer>