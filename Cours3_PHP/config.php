<?php
define ("DB_URL", "mysql:host=localhost;dbname=bd_php"); 
define ("DB_USER", "root"); 
define ("DB_PASS", "");
?>




<?php
function dbConnect() {    // récup de l'id de connection BD
    global $pdo;
    try {
        $pdo = new PDO(DB_URL, DB_USER, DB_PASS);
        // Paramétrage de la liaison PHP <-> MySQL, les données sont encodées en UTF-8.
        $pdo->exec('SET NAMES UTF8');
    }
    catch (PDOException $e) {
        //$html [] = "<p class='error'>Erreur: " . $e->getMessage() . "</p>";
        die("<p class='error'>Erreur: " . $e->getMessage() . "</p>");    // on arrête tout!
    }
}
?>


<?php
//OBTENIR LES USERS : nom, prenom, mot de passe et l'id
function getUsers() {
	define ("SQL_ALL_USER", "SELECT * FROM user ORDER BY id");
	global $pdo; // pour preparer les requetes et se connecter
	$query = $pdo->prepare(SQL_ALL_USER);
	$query->execute();
	$data = $query->fetchAll(PDO::FETCH_ASSOC);
	//var_dump ($data); // données ok?
	foreach ($data as $user) {
        echo "
            {$user["nom"]}
            {$user["prenom"]}
            {$user["mdp"]}
            {$user["id"]}
        ";
	}
}
?>

<?php
function checkLogin($id, $password) {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM user WHERE id = :id AND mdp = :password");
    $query->bindValue(':id', $id, PDO::PARAM_STR); 
    $query->bindValue(':password', $password, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        return true;
    } 
    else {
        return false;
    }
}
?>

<?php
function createUser($nom, $prenom, $mdp) {
    global $pdo;
    $query = $pdo->prepare("INSERT INTO user (nom, prenom, mdp) VALUES (:nom, :prenom, :mdp)");
    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    if ($query->execute()) {
        return true;
    } 
    else {
        return false;
    }
}
?>