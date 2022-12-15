<?php

session_start();

$conn = new mysqli("localhost", "root", "", "mydata");

if (isset($_POST["nom"], $_POST["mdp"]) && !empty($_POST["nom"]) && !empty($_POST["mdp"])) {
    $nom = htmlspecialchars($_POST["nom"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    $_SESSION["mdp"] = $_POST["mdp"];
    $_SESSION["nom"] = $_POST["nom"];


    $select = "SELECT * FROM user WHERE nom= '$nom' AND mdp= '$mdp'";
    $result = $conn->query($select);

    if ($result->num_rows > 0) {
        while ($users = $result->fetch_assoc()) {
            echo "<span class=' message message-success'>Bienvenue, '$nom' connexion avec succès</span>";
        }
    } elseif (isset($_SESSION["mdp"]) !== $mdp) {
        echo "<span class=' message message-error'>Mot de passe incorrect</span>";
    }
} elseif (empty($_POST["nom"])) {
    echo "<span class=' message message-error'>Saisisser votre nom d'utilisateur </span>";
} elseif (empty($_POST["mdp"])) {
    echo "<span class=' message message-error'>Saisisser votre mot de passe </span>";
}
