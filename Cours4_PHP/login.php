<?php 
session_start();
?>


<h1>Page Login</h1>


<a href="index.php">Retour_page_initiale</a>
<br>
<a href="contact.php">page_contact</a>
<br>
<a href="profil.php">page_profil</a>
<br>
<a href="inscription.php">page_inscription</a>
<br>
<br>


<form action="traitement_donnees.php" method="post">
    <label for="id">id:</label>
    <br>
    <input type="id" id="" name="id">
    <br>
    <label for="password">Password:</label>
    <br>
    <input type="password" id="1203" name="password">
    <br>
    <button type="submit">Envoyer</button>
    <br>
</form>


<footer style="width: 100%; height: 50px; background-color: #333; color: #fff; display: flex; justify-content: center; align-items: center; position: absolute; bottom: 0;">
  <p>COPYRIGHT 2023 - Tous Droits Réservés</p>
  <p>Al Rifai Asma</p>
</footer>