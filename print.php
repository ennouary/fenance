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
    <title>Bon De Dépense </title>
    <style>
    .sigbody {
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

    .footerr {
        background-color: #fff#;
        color: black;
        padding: 20px;
        text-align: center;
        border: 2px solid;
    }

    .footer {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    .nature {
        text-align: center;
    }

    .phpcode {
        display: flex;
        height: 500px;
        justify-content: space-between;
    }

    .flex-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }

    .flex-container p {
        margin: 10px;
        /* Remove default margins from paragraphs */
    }

    @media print {
        body * {
            visibility: hidden;
        }

        #printArea,
        #printArea * {
            visibility: visible;
        }

        #printArea {
            margin: 20px;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            color: #000;
            padding: 20px;
            box-sizing: border-box;
        }
    }
    </style>

</head>

<body>
    <nav class="navbar">
        <h2>Association de Sauvegarde et Protection Des Sourds</h2>
        <button type="submit" class="btn btn-success m-2" id="redirection">Accueil</button>
        <a href="logout.php" class=" btn btn-primary mb-5">logout</a>
    </nav>


    <form method="post" action="" class="ml-3">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="cin" class="form-label">CIN:</label>
            <input type="text" class="form-control" id="cin" name="cin" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix (DH):</label>
            <input type="number" step="0.01" class="form-control" id="prix" name="prix" required autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary ml-3" name="submit">Submit</button>
    </form>

    <?php
    include 'connect.php';

    // Initialize variables
    $cin = "";
    $currentMonth = date('Y-m');

    // Insert the form data into the database upon submission
    if (isset($_POST['submit'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $cin = $_POST['cin'];
        $prix = $_POST['prix'];

        // Get the current count of "Bon De Dépense" for the current month
        $sql_count = "SELECT COUNT(*) as count FROM depense WHERE DATE_FORMAT(date, '%Y-%m') = '$currentMonth'";
        $result_count = $con->query($sql_count);
        $row_count = $result_count->fetch_assoc();
        $bonNumber = $row_count['count'] + 1;

        $sql = "INSERT INTO depense (nom, prenom, cin, prix, motif, date, time, saisie_par, bon_number) 
            VALUES ('$nom', '$prenom', '$cin', '$prix', 'frais de repas', CURDATE(), CURTIME(), 'YOUNESS EL ALAOUI', $bonNumber)";

        if ($con->query($sql) === TRUE) {
            echo "<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }

    // Fetch the last inserted data from the database
    if (!empty($cin)) {
        $sql = "SELECT * FROM depense WHERE cin = '$cin' ORDER BY id DESC LIMIT 1";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $nom = $row['nom'];
                $prenom = $row['prenom'];
                $cin = $row['cin'];
                $prix = $row['prix'];
                $motif = $row['motif'];
                $date = $row['date'];
                $time = $row['time'];
                $saisie_par = $row['saisie_par'];
                $bonNumber = $row['bon_number'];
                ?>

    <div id="printArea" style="display: none;">
        <h2 class="footerr">Association de Sauvegarde et Protection Des Sourds</h2>
        <p>Bon De Dépense n° : <?php echo $bonNumber; ?></p>
        <p>Je soussigné(e) <?php echo "$nom $prenom"; ?> CIN N°:<?php echo $cin; ?></p>
        <p>Certifie avoir reçu la somme de <?php echo "$prix DH"; ?>, de la part de l'association de sauvegarde et
            protection des sourds.</p>
        <p>Motif de dépense: <?php echo $motif; ?>, le <?php echo $date; ?> et <?php echo $time; ?>.</p>
        <p>Saisie par : <?php echo $saisie_par; ?></p>
        <p class="signature">Signature</p>
        <div class=" flex-container">
            <p>Dericteur</p>
            <p>Momber de beraux </p>
            <p>Bénéficiaires</p>

        </div>
        <div class="phpcode">
            <p><?php echo $saisie_par; ?></p>
            <p class="beni"><?php echo $nom; ?></p>
        </div>
        <footer class="footer">
            &copy; 2024 Association de Sauvegarde et Protection Des Sourds
        </footer>
    </div>

    <!-- Print Button -->
    <button onclick="printDiv('printArea')" class="btn btn-primary mb-5">Imprimer</button>
    <footer class="footer">
        &copy; 2024 Association de Sauvegarde et Protection Des Sourds
    </footer>
    <!-- JavaScript for Print -->
    <script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        // Show the print area
        document.getElementById(divId).style.display = 'block';

        // Temporarily replace the body content with the print area content
        document.body.innerHTML = '<div id="printArea">' + printContents + '</div>';
        window.print();

        // Restore the original body content
        document.body.innerHTML = originalContents;
    }
    </script>

    <?php
            }
        } else {
            echo "0 résultats";
        }
    }
    $con->close();
    ?>
    <script>
    document.getElementById("redirection").addEventListener("click", function() {
        window.location.href = "home.php"; // Replace with your desired URL
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>