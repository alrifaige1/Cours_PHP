<?php 
session_start();
?>


<h1>Profil</h1>


<a href="index.php">Retour_page_initiale</a>
<br>
<a href="login.php">page_login</a>
<br>
<a href="contact.php">Contact</a>
<br>
<a href="inscription.php">page_inscription</a>
<br>
<br>



<br>
<br>

<p>Je suis Asma Al Rifai, étudiante en BUT informatique en BAC+3.</p>
<p>Je chreche actuellement un stage de fin d'études de 12 semaines rémunéré en Informatique.
<p>Plus précisément dans le développement logiciels ou développement web.</p>
<p>Cette année a été très riche en apprentissage, on a apprit de nombreux langages et réalisé de nombreux projets.</p>
<p>On a fait du langage Java et réalisé un projet de jeu d'échecs.</p> 
<p>On a aussi fait du python, du php (créer des mini sites avec formulaires) et très peu de C.</p>
<p>On a aussi du HTML, CSS et du JavaScript, on a également réalisé une application ToDo List avec Figma (formulaires et parametres).</p>
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
