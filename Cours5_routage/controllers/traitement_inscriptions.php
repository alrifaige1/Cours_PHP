<?php 
session_start()
?>

<?php
require 'config.php';
?>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // regarde si est ce qu'on envoie qqchose
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = $_POST['password'];
    $mdpCrypter = crypter_mot_de_passe($mdp); // on met dans mdpCrypter le mot de passe hashé
    dbConnect(); // interagir avec la base de données
    createUser($nom, $prenom, $mdpCrypter); // crée compte utilisateur avec le mdp hashé (caché)
    header('Location: index.php'); // revenir à la page index.php apres envoie du formulaire
    exit;
} ?>

