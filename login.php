<?php
$login = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['name'];
    $password = $_POST['password'];


    $sql = "Select * from `regestration` where name = '$username' and password = '$password'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $login = 1;
            session_start();
            $_SESSION['name'] = $username;
            header('location:home.php');
        } else {
            $invalid = 1;
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
    <title>log in page</title>
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
        text-align: center;
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
    </style>
</head>

<body>
    <?php
    if ($invalid) {
        echo '<div time-10 class="alert alert-danger" role="alert"> invalid data </div>';
    }
    ?>
    <?php
    if ($login) {
        echo '<div class="alert alert-success" role="alert"> you are logged in succesfuly </div>';
    }
    ?>
    <nav class="navbar">
        <h2>Association de Sauvegarde et Protection Des Sourds</h2>
        <div class="logo">Gestion Financière</div>
    </nav>

    <form action="login.php" method="POST">
        <div class="mb-3 m-5">
            <label for="exampleInputEmail1" class="form-label">name</label>
            <input type="text" class="form-control" name="name" placeholder="nom" autocomplete="off">
        </div>
        <div class="mb-3 m-5">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Mote de passe" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary m-5 ">login</button>
    </form>
    <div class="hero">
        <h1>Bienvenue sur Gestion Financière</h1>
    </div>
    <footer class="footer">
        &copy; 2024 Association de Sauvegarde et Protection Des Sourds
    </footer>
</body>

</html>