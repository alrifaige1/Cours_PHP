<?php // donne URL à d'où je me connecte (local) dans MyAdmin; le nom du projet auquel je suis
define ("DB_URL", "mysql:host=localhost;dbname=bd_php"); 
define ("DB_USER", "root"); // nom d'utilisateur = root 
define ("DB_PASS", ""); // mot de passe vide car on est sous windows
?>



<?php
function dbConnect() {    // récup de l'id de connection à la BD dans MyAdmin
    global $pdo; // variable globale visible dans seulement ce fichier là 
    try {
        $pdo = new PDO(DB_URL, DB_USER, DB_PASS); // la clé pour connecter à BD MyAdmin
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
//OBTENIR LES USERS : nom, prenom, mot de passe et l'id apres qu'ils soient connecter à MyAdmin
function getUsers() {
	define ("SQL_ALL_USER", "SELECT * FROM user ORDER BY id");
	global $pdo; // pour preparer les requetes et se connecter
	$query = $pdo->prepare(SQL_ALL_USER); // pdo : rentrer dans la BD et query : demander à ranger par ordre de l'id
	$query->execute();
	$data = $query->fetchAll(PDO::FETCH_ASSOC); // fetchAll pour recuper les donnees
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
function checkLogin($id, $password) { // quand on envoie les form de connexion : verifie 
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

<?php
function createTweet($contenu, $user) { // on ne precise pas la date et l'id car automatique 
    global $pdo;
    $query = $pdo->prepare("INSERT INTO tweets (date, contenu, user) VALUES (NOW(), :contenu, :user)");
    $query->bindValue(':contenu', $contenu, PDO::PARAM_STR);
    $query->bindValue(':user', $user, PDO::PARAM_STR);
    if ($query->execute()) {
        return true;
    } 
    else {
        return false;
    }
}
?>

<?php
function getTweets($user_id) { //recuperer les tweets d'une personne en particuliers
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM tweets WHERE user = :user_id ORDER BY id DESC");
    $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
?>
<?php
function getLast10Tweets() {  // recuperer les 10 derniers tweets de n'importe quelle personne 
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM tweets ORDER BY id DESC LIMIT 10");
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
?>

<?php
function crypter_mot_de_passe($mot_de_passe) {
    $mot_de_passe_crypte = hash('sha256', $mot_de_passe); // systeme d'hashage pour verifier que
                        // ce que tu tappes est le mot de passe enregistré dans les parametres
    return $mot_de_passe_crypte;
}
?>