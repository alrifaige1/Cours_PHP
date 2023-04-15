<?php 
session_start()
?>

<title>"Page des tweets"</title>
<?php
require 'menu.php';
?>

<h1>Je suis sur la page Tweets</h1>

<?php // affiche les tweets : si pas connecte alors on ne peut pas creer de tweets d'où echo form
if (isset($_SESSION['message'])) { 
    if($_SESSION['message'] === 'Succes'){
        echo 
        '<form action="traitement_creer_tweets.php" method="post">
            <label for="tweets">Tweets:</label>
            <br>
            <input type="tweets" id="" name="tweets">
            <br>
            <button type="submit">Envoyer</button>
            <br>
        </form>';
    }
   
}
?>