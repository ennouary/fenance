<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('location:index.html');
}
?>
<?php

include 'connect.php';

$recetteData = array();
$masroufData = array();

$resRecette = mysqli_query($con, "SELECT total, date FROM recette");
while ($row = mysqli_fetch_array($resRecette)) {
    $recetteData[] = array("y" => $row["total"], "label" => $row["date"]);
}

$resMasrouf = mysqli_query($con, "SELECT total, date FROM masrouf");
while ($row = mysqli_fetch_array($resMasrouf)) {
    $masroufData[] = array("y" => $row["total"], "label" => $row["date"]);
}


?>
<!DOCTYPE HTML>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .navbar {
        background-color: #333;
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
        background-image: url('https://via.placeholder.com/');
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

    .nav-logoo {
        background-color: #333;
        color: #fff;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        top: 0;
        width: 100%;
        z-index: 1000;
    }

    nav .nav-logo {
        height: 100px;
        width: 100px;
    }
    </style>
    <script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Recettes et Dépenses"
            },
            axisY: {
                title: "Montant (en DH)"
            },
            data: [{
                    type: "column",
                    name: "Masrouf",
                    color: "#fe430a",
                    dataPoints: <?php echo json_encode($masroufData, JSON_NUMERIC_CHECK); ?>
                },
                {
                    type: "column",
                    name: "Recettes",
                    color: "#38fe0a",
                    dataPoints: <?php echo json_encode($recetteData, JSON_NUMERIC_CHECK); ?>
                }

            ]
        });
        chart.render();
    }
    </script>
</head>

<body>
    <nav class="navbar">
        <img src="navbarlogo.png" alt="Navbar Logo" class="nav-logo">
        <h2>Association de Sauvegarde et Protection Des Sourds</h2>
        <div class="logo">GestionFinancière</div>
        <button type="submit" class="btn btn-success m-2" id="homeButton">Accueil</button>
        <!-- <button type="submit" class="btn btn-success m-2" id="redirection">Accueil</button> -->
        <a href="logout.php" class=" btn btn-primary mb-5">logout</a>
    </nav>



    <script>
    // JavaScript to handle the redirect
    document.getElementById("homeButton").addEventListener("click", function() {
        window.location.href = "home.php"; // Replace with your desired URL
    });

    document.getElementById("recetteButton").addEventListener("click", function() {
        window.location.href = "diagnostic.php"; // Replace with your desired URL
    });
    </script>

    <div class="container mt-4">
        <h2>Mettre à jour le total de Recette</h2>
        <p><strong>Légende du diagramme :</strong></p>
        <ul>
            <li><span style="color: #38fe0a;">■</span> Recette (en vert)</li>
            <li><span style="color: #fe430a;">■</span> Dépense (en orange)</li>
        </ul>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>