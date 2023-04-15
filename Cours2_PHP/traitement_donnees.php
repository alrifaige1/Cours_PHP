
<?php 
session_start();
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['message']= $_POST['message']; // Vérifie les info identification/authentifie l'utilisateur   
    // ...   // Redirigez l'utilisateur vers la page d'accueil   
    header('Location: index.php');
    exit;
} ?>

