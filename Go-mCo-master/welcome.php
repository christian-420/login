<?php

session_start();

$conn = new mysqli("localhost", "root", "", "mydata");

if (isset($_SESSION["nom"]) !== "" && (isset($_SESSION["mdp"]) == true)) {
    $nom = $_SESSION["nom"];
} else {
    header("location: index.html");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="my.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.6.1.min.js"></script>
    <title>Welcome</title>

    <script>
        $(document).ready(function() {
            $(".logout").click(function() {
                $(".titre").hide();
                $(".pseudo").hide();
                $(".logout").hide();
                $(".tableau").hide();
                $(".load").fadeIn(3000);
                $(".title").fadeIn(1000);
                var temps = 5;
                var interval = setInterval(function() {
                    $(".count").text("Déconnexion dans :" + " " + temps + " " + "secondes");
                    temps = temps - 1;

                    if (temps == -1) {
                        clearInterval(interval);
                        $(".count").fadeOut();
                        window.location = "logout.php";
                    }
                }, 1000);
            });
        });
    </script>

</head>

<body>
    <div class="loader">
        <span class="lettre">C</span>
        <span class="lettre">H</span>
        <span class="lettre">A</span>
        <span class="lettre">R</span>
        <span class="lettre">G</span>
        <span class="lettre">E</span>
        <span class="lettre">M</span>
        <span class="lettre">E</span>
        <span class="lettre">N</span>
        <span class="lettre">T</span>
    </div>
    <div class="container">
        <div class="row " align="center">
            <div class="col-">
                <div class="dashboard">
                    <div class="titre">
                        <h2>Bienvenu</h2>
                    </div>
                    <div class="title out">
                        <h2>Au revoir</h2>
                    </div>
                    <div class="load out">
                        <img src="1480.gif">
                    </div>
                    <div class="count">
                        <p></p>
                    </div>
                    <div class="pseudo">
                        <p> "<?= $nom; ?>" vous êtes connecté</p>
                    </div>
                    <div class="logout">
                        <a href="#"> Deconnexion</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tableau">
            <div align="center">
                <h4 class="titre">Liste des visiteurs</h4>
            </div>
            <div class="row mx-2">
                <div class="col-">
                    <table class="table-bordered table-light w-100" align="center">
                        <tr align="center">
                            <th class="id w-25">id</th>
                            <th class="nom w-25">Nom</th>
                            <th class="mdp w-75">Mot de passe</th>
                        </tr>
                    </table>
                    <?php

                    $recupusers = "SELECT * FROM user";
                    $result = $conn->query($recupusers);

                    if ($result->num_rows > 0) {
                        while ($user = $result->fetch_assoc()) {
                            $id = $user["id"];
                            $nom = $user["nom"];
                            $mdp = $user["mdp"];
                    ?>
                            <div class="row">
                                <div class="col-">
                                    <table class="table-bordered table-light w-100" align="center">
                                        <tr align="center">
                                            <td class="id w-25">
                                                <?= $id; ?>
                                            </td>
                                            <td class="nom w-25">
                                                <?= $nom; ?>
                                            </td>
                                            <td class="mdp w-50">
                                                <?= base64_encode($mdp); ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                    <?php
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="loader.js"></script>
</body>

</html>