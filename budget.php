<?php
// Database connection
include 'connect.php';

// Fetch all prix, motif, and totals in recette
$recette_query = "SELECT prix, motif, total FROM recette ORDER BY id ASC";
$recette_result = mysqli_query($con, $recette_query);

// Fetch all prix, motif, and totals in depense
$depense_query = "SELECT prix, motif, total FROM masrouf ORDER BY id ASC";
$depense_result = mysqli_query($con, $depense_query);

// Calculate the result based on the last totals fetched
$last_recette_total = null;
$last_depense_total = null;

if (mysqli_num_rows($recette_result) > 0) {
    mysqli_data_seek($recette_result, mysqli_num_rows($recette_result) - 1);
    $last_recette_total_row = mysqli_fetch_assoc($recette_result);
    $last_recette_total = $last_recette_total_row['total'];
}

if (mysqli_num_rows($depense_result) > 0) {
    mysqli_data_seek($depense_result, mysqli_num_rows($depense_result) - 1);
    $last_depense_total_row = mysqli_fetch_assoc($depense_result);
    $last_depense_total = $last_depense_total_row['total'];
}

$result_total = $last_recette_total - $last_depense_total;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <style>
    /* Body and general styles */
    body {
        background-image: url('bodypic.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    /* Navigation and Footer styles */
    .nav-logoo,
    .footer {
        background-color: #333;
        color: #fff;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        top: 0;
        width: 100%;
        z-index: 1000;
    }

    .nav-logo {
        height: 100px;
        width: 100px;
    }

    nav h2 {
        margin: 0;
        font-size: 22px;
    }

    .nav-buttons {
        display: flex;
        gap: 10px;
    }

    #redirection,
    .logout-btn {
        background-color: #007bff;
        color: white;
        height: 50px;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    #redirection {
        background-color: #28a745;
    }

    #redirection:hover {
        background-color: #218838;
    }

    .logout-btn:hover {
        background-color: #0056b3;
    }

    /* Content and Table styles */
    .main-content img {
        height: auto;
        width: auto;
        border-radius: 10px;
    }

    h1 {
        margin-top: 20px;
        font-size: 24px;
        color: #333;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    th,
    td {
        padding: 15px;
        border: 1px solid #ddd;
        text-align: center;
        font-size: 16px;
    }

    th {
        background-color: #f7f7f7;
        color: #333;
    }

    .print-btn {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
        text-align: center;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .print-btn:hover {
        background-color: #0056b3;
    }

    .bold-total {
        font-weight: bold;
        font-size: 1.2em;
        color: #000;
    }

    @media print {
        body {
            background-image: url('bodypic.png') !important;
            background-size: cover !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        nav,
        footer,
        .print-btn {
            display: none !important;
        }

        .print-content {
            position: relative;
            width: 100%;
            height: auto;
            padding: 20px;
            box-shadow: none;
            border-radius: 0;
            background: none !important;
            color: #333;
            z-index: 1;
        }

        table {
            width: 100% !important;
            page-break-inside: avoid;
        }
    }
    </style>
</head>

<body>
    <nav class="nav-logoo">
        <img src="navbarlogo.png" alt="Navbar Logo" class="nav-logo">
        <h2>Association de Sauvegarde et Protection Des Sourds</h2>
        <div class="nav-buttons">
            <button type="button" id="redirection">Accueil</button>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </nav>

    <div class="main-content">
        <div class="print-content">
            <h2 class="recette">Recette</h2>
            <table>
                <tr>
                    <th>Motif</th>
                    <th>Prix (DH)</th>
                    <th>Total (DH)</th>
                </tr>
                <?php mysqli_data_seek($recette_result, 0); // Reset pointer to start of result ?>
                <?php while ($recette_row = mysqli_fetch_assoc($recette_result)): ?>
                <tr>
                    <td><?php echo $recette_row['motif']; ?></td>
                    <td><?php echo number_format($recette_row['prix'], 2); ?></td>
                    <td><?php echo number_format($recette_row['total'], 2); ?></td>
                </tr>
                <?php endwhile; ?>
            </table>

            <h2>Depense</h2>
            <table>
                <tr>
                    <th>Motif</th>
                    <th>Prix (DH)</th>
                    <th>Total (DH)</th>
                </tr>
                <?php mysqli_data_seek($depense_result, 0); // Reset pointer to start of result ?>
                <?php while ($depense_row = mysqli_fetch_assoc($depense_result)): ?>
                <tr>
                    <td><?php echo $depense_row['motif']; ?></td>
                    <td><?php echo number_format($depense_row['prix'], 2); ?></td>
                    <td><?php echo number_format($depense_row['total'], 2); ?></td>
                </tr>
                <?php endwhile; ?>
            </table>

            <h2>Result</h2>
            <table>
                <tr>
                    <th>Category</th>
                    <th>Total (DH)</th>
                </tr>
                <tr>
                    <td>Recette</td>
                    <td><?php echo number_format($last_recette_total, 2); ?></td>
                </tr>
                <tr>
                    <td>Depense</td>
                    <td><?php echo number_format($last_depense_total, 2); ?></td>
                </tr>
                <tr>
                    <td><strong>Result</strong></td>
                    <td class="bold-total"><?php echo number_format($result_total, 2); ?></td>
                </tr>
            </table>
        </div>

        <button class="print-btn" onclick="printPage()">immprimer</button>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Association de Sauvegarde et Protection Des Sourds.</p>
    </footer>

    <script>
    function printPage() {
        window.print();
    }
    document.getElementById("redirection").addEventListener("click", function() {
        window.location.href = "home.php";
    });
    </script>
</body>

</html>