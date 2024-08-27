<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Page d'Acceil</title>
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
        color: #333;
        grb text-align: center;
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

    nav .nav-logo {
        height: 100px;
        width: 100px;
    }
    </style>
</head>

<body>
    <nav class="navbar">
        <img src="navbarlogo.png" alt="Navbar Logo" class="nav-logo">
        <h2>Association de Sauvegarde et Protection Des Sourds</h2>
        <a href="logout.php" class=" btn btn-primary mb-5">logout</a>
    </nav>

    <div class="dropdown m-5">
        <button class="btn btn-secondary" type="button"
            onclick="window.location.href='enregistrer.php'">Enregistrer</button>
        <button type="button" class="btn btn-primary m-5" onclick="window.location.href='depense.php'">Dépense</button>
        <button type="button" class="btn btn-primary m-5" onclick="window.location.href='recette.php'">Recette</button>
        <button type="button" class="btn btn-primary m-5" onclick="window.location.href='budget.php'">Budget</button>
        <button type="button" class="btn btn-primary m-5"
            onclick="window.location.href='diagnostic.php'">Diagnostique</button>

    </div>
    <div class="hero">
        <h1>Bienvenue sur Gestion Financière</h1>
    </div>

    <footer class="footer">
        &copy; 2024 Association de Sauvegarde et Protection Des Sourds
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>