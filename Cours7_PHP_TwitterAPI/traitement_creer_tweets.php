<?php 
session_start()
?>

<?php
require 'config.php';
?>



<?php // faire la connexion entre cherche_tweet (formulaires des user_id ) et traitement_donnees
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // est ce qu'on envoie qqchose
    dbConnect();
    createTweet($_POST['tweets'], $_SESSION['id']); // envoyer les tweets creer et les range par id
    header('Location: cherche_tweet.php');
    exit;
} ?>

