<?php 
session_start()
?>

<title>"Page recherche tweets"</title>
<?php
require 'menu.php';
?>

<h1>Je suis sur la page de la recherche des tweets</h1>
<!-- chercher les differents tweets -->
<form action="traitement_recherche.php" method="post">
    <label for="profils">Profils:</label>
    <br>
    <input type="profils" id="" name="profils">
    <br>
    <button type="submit">Envoyer</button>
    <br>
</form>
<!-- chercher les  10 tweets -->
<form action="traitement_recherche.php" method="post">
    <button type="submit" name="10">10derniers_tweets</button>
    <br>
</form>

<?php // pour mettre à la ligne apres chaque tweet
function formatTweet($tweet) {
    $output = "";
    $output .= $tweet['id'] . " ";
    $output .= $tweet['contenu'] . " ";
    $output .= "par l'utilisateur #" . $tweet['user'] . " ";
    $output .= "le " . date('d/m/Y H:i:s', strtotime($tweet['date']));
    $output .= "<br>";
    return $output;
}
?>


<?php
// Vérifiez si un message est stocké dans la variable de session 
if (isset($_SESSION['tweet'])) { 
    foreach ($_SESSION['tweet'] as $value) { 
        print_r(formatTweet($value)) ;  // affiche tous les contenus des tweets qu'il y a  
    }
  // Supprimez le message une fois affiché   
  unset($_SESSION['tweet']); 
}
?>
