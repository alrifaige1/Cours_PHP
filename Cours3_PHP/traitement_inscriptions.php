<?php 
session_start()
?>

<?php
require 'config.php';
?>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = $_POST['password'];
    dbConnect();
    createUser($nom, $prenom, $mdp);
    header('Location: index.php');
    exit;
} ?>
