
<?php 
session_start();
?>

<?php
require 'config.php';
?>




<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $password = $_POST['password'];
    dbConnect();
    if(checkLogin($id,$password)){
        $_SESSION['message']= 'Succes '.$id;
    }
    else{
        $_SESSION['message']= 'echec';
    }
    header('Location: index.php');
    exit;
} ?>