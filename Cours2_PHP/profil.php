<?php 
session_start();
?>

<a href="index.php">Retour_page_initiale</a>
<br>
<a href="login.php">page_login</a>
<br>
<a href="contact.php">Contact</a>

<br>
<br>

<h1>Profil</h1>

<br>
<br>
<p>Je suis  Asma Al Rifai, étudiante en BUT informatique en BAC+3.</p>
<br>
<p>Je chreche actuellement un stage de fin d'étude en Informatique, plutôt dans le développement logiciels ou web.
    Un stage de 12 semaines rémunéré car la durée est de 3 mois.
</p>

<br>
<br>

<?php
// Vérifiez si un message est stocké dans la variable de session 
if (isset($_SESSION['message'])) { 
  // Affichez le message   
  echo $_SESSION['message']; 
  // Supprimez le message une fois affiché   
  unset($_SESSION['message']); 
}
?>

<footer style="width: 100%; height: 50px; background-color: #333; color: #fff; display: flex; justify-content: center; align-items: center; position: absolute; bottom: 0;">
  <p>COPYRIGHT 2023 - Tous Droits Réservés</p>
  <p>Al Rifai Asma</p>
</footer>
