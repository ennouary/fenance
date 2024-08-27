<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Financière</title>
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

    .footer {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">GestionFinancière</div>
        <ul class="nav-links">
            <li><a href="#accueil">Accueil</a></li>
            <li><a href="#fonctionnalités">Fonctionnalités</a></li>
            <li><a href="#à-propos">À Propos</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#tableau-de-bord">Tableau de Bord</a></li>
        </ul>
    </nav>

    <!-- Footer -->
    <footer class="footer">
        &copy; 2024 GestionFinancière. Tous droits réservés.
    </footer>
</body>

</html>