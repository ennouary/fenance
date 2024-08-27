<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('location:index.html');
}
?>
<?php

include 'connect.php';

// Fetching data for dropdown menu
$sql_fetch = "SELECT cin, prenom FROM `enregistrer2`";
$result_fetch = $con->query($sql_fetch);

// Handling form submission
$succes = 0;
$user = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input data
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $prix = mysqli_real_escape_string($con, $_POST['prix']);
    $motif = mysqli_real_escape_string($con, $_POST['motif']);


    // Check if the record already exists based on nom, prix, and motif
    $sql_check = "SELECT * FROM `recette` WHERE nom ='$nom' AND prix='$prix' AND motif='$motif'";
    $result_check = mysqli_query($con, $sql_check);

    if ($result_check) {
        $num = mysqli_num_rows($result_check);
        if ($num > 0) {
            $user = 1;
            header('location:recette.php');
        } else {
            // Insert the new record
            $sql_insert = "INSERT INTO `recette`(nom, prix, motif) VALUES('$nom', '$prix', '$motif')";
            $result_insert = mysqli_query($con, $sql_insert);

            if ($result_insert) {
                // Calculate the new total price
                $sql_total = "SELECT SUM(prix) AS total_sum FROM `recette`";
                $result_total = mysqli_query($con, $sql_total);
                $row_total = mysqli_fetch_assoc($result_total);
                $total_prix = $row_total['total_sum'];

                // Update the total price in the table
                $sql_update_total = "UPDATE `recette` SET total= '$total_prix' WHERE id = (SELECT MAX(id) FROM `recette`)";
                mysqli_query($con, $sql_update_total);

                $succes = 1;
            } else {
                die('Insertion failed: ' . mysqli_error($con));
            }
        }
    } else {
        die('Query failed: ' . mysqli_error($con));
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

    nav .nav-logo {
        height: 100px;
        width: 100px;
    }
    </style>
</head>

<body>

    <?php
    if ($user) {
        echo '<div time-3 class="alert alert-danger" role="alert"> Les données n\'ont pas été insérées </div>';
    }
    ?>
    <?php
    if ($succes) {
        echo '<div time-3 class="alert alert-success" role="alert"> Les données ont été insérées avec succès </div>';
    }
    ?>
    <nav class="navbar">
        <img src="navbarlogo.png" alt="Navbar Logo" class="nav-logo">
        <h2>Association de Sauvegarde et Protection Des Sourds</h2>
        <div class="logo">GestionFinancière</div>
        <button type="button" class="btn btn-success m-2" id="redirection">Accueil</button>
        <a href="logout.php" class="btn btn-primary mb-5">logout</a>
    </nav>
    <div class="container mt-5">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                Les Noms
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                if ($result_fetch->num_rows > 0) {
                    while ($row = $result_fetch->fetch_assoc()) {
                        echo '<li><a class="dropdown-item" href="#" data-value="' . $row["cin"] . '">' . $row["prenom"] . '</a></li>';
                    }
                } else {
                    echo '<li><a class="dropdown-item" href="#">Aucun option disponible</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="input-group m-5 p-5" stylesheet="text-align:center">
        <form action="recette.php" method="POST">
            <input type="text" name="nom" id="inputField" class="form-control" readonly>
            <span class="input-group-text">Prix</span>
            <input type="text" name="prix" class="form-control">
            <span class="input-group-text">Motif</span>
            <input type="text" name="motif" class="form-control">
            <input type="file" name="print" id="scanInput" class="form-control">
            <input type="hidden" name="scanned_image" id="scannedImage">
            <!-- <button type="submit" name="print" class="btn btn-success m-2" id="printButton">Imprimer</button> -->
            <button type="submit" class="btn btn-success m-2">Enregistrer</button>
        </form>
    </div>

    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Motif</th>
                    <th>Prix</th>
                    <th>Total Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_display = "SELECT * FROM `recette`";
                $result_display = mysqli_query($con, $sql_display);
                if ($result_display) {
                    while ($row = mysqli_fetch_assoc($result_display)) {
                        ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['nom'] ?></td>
                    <td><?php echo $row['motif'] ?></td>
                    <td><?php echo $row['prix'] ?></td>
                    <td><?php echo $row['total'] ?></td>
                </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="5">No data found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="hero">
        <h1>Bienvenue sur Gestion Financière</h1>
    </div>
    <footer class="footer">&copy; 2024 Association de Sauvegarde et Protection Des Sourds. </footer>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // JavaScript to handle dropdown item selection
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent the default action

                // Get the value from the data attribute
                const value = this.getAttribute('data-value');

                // Set the value to the input field
                document.getElementById('inputField').value = value;
            });
        });

        // Handle file input change
        document.getElementById('scanInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('scannedImage').value = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle print button click
        document.getElementById('printButton')?.addEventListener('click', function() {
            const printWindow = window.open('', '_blank');
            printWindow.document.write('<img src="' + document.getElementById('scannedImage').value +
                '" />');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
        });

        // JavaScript to handle the redirect
        document.getElementById("redirection").addEventListener("click", function() {
            window.location.href = "home.php"; // Replace with your desired URL
        });

        document.getElementById("recetteButton")?.addEventListener("click", function() {
            window.location.href = "diagnostic.php"; // Replace with your desired URL
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>