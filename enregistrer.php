<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('location:index.php');
    exit();
}

$succes = 0;
$user = 0;
$depenseChecked = $recetteChecked = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $type = $_POST['type']; // Get the selected type (depense or recette)

    $sql = "SELECT * FROM `enregistrer2` WHERE cin = '$cin'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $user = 1;
        } else {
            if ($type == 'depense') {
                $sql = "insert into `enregistrer` (nom,prenom,cin) values ('$nom', '$prenom', '$cin')";
            } else {
                $sql = "insert into `enregistrer2`(nom,prenom,cin) values ('$nom', '$prenom', '$cin')";
            }
            $result = mysqli_query($con, $sql);
            if ($result) {
                $succes = 1;
            } else {
                die(mysqli_error($con));
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .navbar {
        background-color:
            #333;
        color: #fff;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar .logo {
        font-size: 24px;
        font-weight: bold;
    }

    .navbar .nav-links {
        list-style: none;
        display: flex;
        gap: 15px;
    }

    .navbar .nav-links a {
        color: #fff;
        text-decoration: none;
        font-size: 18px;
    }

    .hero {
        background-image:
            url('https://via.placeholder.com/');
        background-size: cover;
        background-position: center;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        text-align: center;
    }

    .hero h1 {
        font-size: 48px;
        margin: 0;
    }

    .footer {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
    }
    </style>
</head>

<body>
    <nav class="navbar">
        <h2>Association de Sauvegarde et Protection Des Sourds</h2>
        <div class="logo">GestionFinancière</div>
        <button type="submit" class="btn btn-success m-2" id="redirection">Accueil</button>
        <a href="logout.php" class=" btn btn-primary mb-5">logout</a>
    </nav><?php if ($user) {
        echo '<div id="userAlert" class="alert alert-danger" role="alert">Utilisateur existe déjà</div>';
    }

    if ($succes) {
        echo '<div id="successAlert" class="alert alert-success" role="alert">Vous avez bien enregistré</div>';
    }

    ?>
    <form action="enregistrer.php" method="POST">
        <div class="mb-3"><label for="nom" class="form-label m-3 p-2">Nom</label><input type="text" class="form-control"
                name="nom" id="nom" autocomplete="off"></div>
        <div class="mb-3"><label for="prenom" class="form-label m-3 p-2">Prenom</label><input type="text"
                class="form-control" name="prenom" id="prenom" autocomplete="off"></div>
        <div class="mb-3"><label for="cin" class="form-label m-3 p-2">CIN</label><input type="text" class="form-control"
                name="cin" id="cin" autocomplete="off"></div>
        <div class="mb-3"><label class="form-label m-3 p-2">Type</label>
            <div class="form-check"><input class="form-check-input" type="radio" name="type" id="depense"
                    value="depense" required autocomplete="off"><label class="form-check-label" for="depense">Dépense
                </label></div>
            <div class="form-check"><input class="form-check-input" type="radio" name="type" id="recette"
                    value="recette" required autocomplete="off"><label class="form-check-label" for="recette">Recette
                </label></div>
        </div><button type="submit" class="btn btn-primary m-3 p-2">Enregistrer</button>
    </form>
    <div class="hero">
        <h1>Bienvenue sur Gestion Financière</h1>
    </div>
    <footer class="footer">&copy;
        2024 Association de Sauvegarde et Protection Des Sourds</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {

            // Hide the alerts after 3 seconds
            setTimeout(function() {
                    var userAlert = document.getElementById('userAlert');
                    var successAlert = document.getElementById('successAlert');

                    if (userAlert) {
                        userAlert.style.display = 'none';
                    }

                    if (successAlert) {
                        successAlert.style.display = 'none';

                        // Redirect to home.php after a short delay
                        setTimeout(function() {
                                window.location.href = 'home.php';
                            }

                            , 500);
                    }
                }

                , 3000); // 3 seconds
        }

    );
    document.getElementById("redirection").addEventListener("click", function() {
        window.location.href = "home.php"; // Replace with your desired URL
    });
    </script>
</body>

</html>