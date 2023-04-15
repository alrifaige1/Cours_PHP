<?php 
session_start()
?>

<title>"Page d'inscription"</title>

<h1>Je suis sur la page d'inscription</h1>


<?php
require 'controllers/menu.php';
?>

<form action="traitement_inscriptions.php" method="POST"> <!-- utilisation methode POST : envoie -->
                                    <!--donnees des utilisateurs vers traitements_inscriptions.php-->
    <label for="nom">Nom:</label>
    <br>
    <input type="nom" id="" name="nom">
    <br>
    <label for="prenom">Prenom:</label>
    <br>
    <input type="prenom" id="" name="prenom">
    <br>
    <label for="password">Password:</label>
    <br>
    <input type="password" id="" name="password">
    <br>
    <button type="submit">Envoyer</button>
</form>


<footer style="width: 100%; height: 50px; background-color: #333; color: #fff; display: flex; justify-content: center; align-items: center; position: absolute; bottom: 0;">
  <p>COPYRIGHT 2023 - Tous Droits Réservés<br></p>
  <p>Al Rifai Asma</p>
</footer>