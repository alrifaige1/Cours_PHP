<?php 
session_start();
?>


<h1>Profil</h1>


<?php
require 'menu.php';
?>


<br>
<br>

<p>Je suis Asma Al Rifai, étudiante en BUT informatique en BAC+3.</p>
<p>Cette année a été très riche en apprentissage, on a apprit de nombreux langages et réalisé de nombreux projets.</p>
<p>On a fait du langage Java et réalisé un projet de jeu d'échecs.</p> 
<br>
<br>

<?php
// Vérifiez si un message est stocké dans la variable de session 
if (isset($_SESSION['message'])) { 
  // Affichez le message   
  echo $_SESSION['message']; 
  // Supprimez le message une fois affiché  pour mettre à jour le message et en renvoyer un autre
  unset($_SESSION['message']); 
}
?>



<footer style="width: 100%; height: 50px; background-color: #333; color: #fff; display: flex; justify-content: center; align-items: center; position: absolute; bottom: 0;">
  <p>COPYRIGHT 2023 - Tous Droits Réservés</p>
  <p>Al Rifai Asma</p>
</footer>
