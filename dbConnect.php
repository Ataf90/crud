<?php
// les identifiants de connexion pour la base dedonées
$user = "root";
$pass = "";
try {
    // on se connect à notre bdd
    //https://www.php.net/manual/fr/pdo.connections.php
    $dbh = new PDO('mysql:host=localhost;dbname=crud', $user, $pass);
    //si tout va bien retourne la conncexion
     return $dbh;
} catch (PDOException $e) {
    // Affichage d'un message d'erreur
    die('erreur : ' . $e->getMessage());
}
?>