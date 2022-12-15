<?php
session_start();

$conn = new mysqli("localhost", "root", "", "mydata");



    if(isset($_POST["nom"],$_POST["mdp"], $_POST["confirme"]) && !empty($_POST["nom"]) && !empty($_POST["mdp"]) && !empty($_POST["confirme"])) {
        $nom = htmlspecialchars($_POST["nom"]);
        $mdp = htmlspecialchars($_POST["mdp"]);
        $confirme = htmlspecialchars($_POST["confirme"]);
        $_SESSION["nom"] = $nom;
            $select = "SELECT * FROM user WHERE nom='".$nom."' and mdp='".$mdp."'";
            $result = $conn-> query($select);

            if($result-> num_rows>0) {
                echo "<span class=' message message-error'>Vous êtes déjà inscrit</span>";
            } elseif (strlen($_POST["mdp"]) < 6) {
                echo "<span class=' message message-error'>Mot de passe doit être supérieur à 6 caractères</span>";
            } else {
                    $nom = htmlspecialchars($_POST["nom"]);
                    $mdp =htmlspecialchars($_POST["mdp"]);
                    $confirme =htmlspecialchars($_POST["confirme"]);

                        $ins = "INSERT INTO user(nom,mdp,confirme) VALUES ('$nom', '$mdp', '$confirme')";
                            if($confirme == $mdp && $conn->query($ins)) {
                                $_SESSION["mdp"] = $confirme;
                                echo "<span class=' message message-success'>Félicitation, $nom vous êtes inscrit</span>";
                            } else {
                                echo "<span class=' message message-error'>Mot de passe invalide</span>";
                            }
            }
    } elseif (empty($_POST["nom"])) {
        echo "<span class=' message message-error'>Veuillez compléter le Nom d'utilisateur </span>";
    } elseif (empty($_POST["mdp"])) {
        echo "<span class=' message message-error'>Veuillez compléter le mot de passe </span>";
    } elseif (empty($_POST["confirme"])) {
        echo "<span class=' message message-error'>Veuillez connfirmer le mot de passe </span>";
    }
