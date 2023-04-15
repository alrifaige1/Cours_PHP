<?php 
session_start()
?>

<?php
require 'config.php';
?>



<?php // faire la connexion entre cherche_tweet (formulaires des user_id ) et traitement_donnees
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // est ce qu'on envoie qqchose
    dbConnect();
    if(isset($_POST['10'])){
        $_SESSION['tweet']= getLast10Tweets(); // les 10 derniers tweets
    }
    else{
        $_SESSION['tweet']= getTweets($_POST['profils']);// num profil = id personne qui a tweeté
    }
    
    header('Location: cherche_tweet.php');
    exit;
} ?>

