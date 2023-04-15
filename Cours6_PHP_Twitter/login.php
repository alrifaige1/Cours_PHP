<?php 
session_start();
?>


<h1>Page Login</h1>


<?php
require 'menu.php';
?>


<form action="traitement_donnees.php" method="post"> <!-- utilisation de la methode POST : envoie -->
    <label for="id">id:</label> <!--donnees des utilisateurs vers traitements_donnees.php-->
    <br>
    <input type="id" id="" name="id">
    <br>
    <label for="password">Password:</label>
    <br>
    <input type="password" id="1203" name="password">
    <br>
    <button type="submit">Envoyer</button> <!-- pour permettre l'envoie des donnees-->
    <br>
</form>


<footer style="width: 100%; height: 50px; background-color: #333; color: #fff; display: flex; justify-content: center; align-items: center; position: absolute; bottom: 0;">
  <p>COPYRIGHT 2023 - Tous Droits Réservés</p>
  <p>Al Rifai Asma</p>
</footer>