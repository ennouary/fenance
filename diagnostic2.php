<?php
include 'connect.php';

// Initialize the test array
$test = array();
$account = 0;

// Corrected SQL query

$res = mysqli_query($con, "SELECT total, date FROM masrouf");

// Fetching data from the database
while ($row = mysqli_fetch_array($res)) {
    $test[$account]["y"] = $row["total"];
    $test[$account]["label"] = $row["date"];
    $account++; // Increment the counter
}

// Fallback to predefined data points if the query fails
if (empty($test)) {
    $test = array(
        //array("y" => 3373.64, "label" => "janvier"),
        //array("y" => 2435.94, "label" => "février"),
        //array("y" => 1842.55, "label" => "Mars"),
        //array("y" => 1828.55, "label" => "avril"),
        //array("y" => 1039.99, "label" => "Mai"),
        //array("y" => 765.215, "label" => "juin"),
        //array("y" => 612.453, "label" => "juillet"),
        //array("y" => 612.453, "label" => "août"),
        //array("y" => 612.453, "label" => "septembre"),
        //array("y" => 612.453, "label" => "octobre"),
        //array("y" => 612.453, "label" => "novembre"),
        //array("y" => 612.453, "label" => "décembre")
    );
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Total depense"
            },
            axisY: {
                title: "depense (en DH)"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## DH",
                dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    }
    </script>
</head>

<body>
    <button type="submit" class="btn btn-success m-2" id="redirection">Accueil</button>
    <script>
    // JavaScript to handle the redirect
    document.getElementById("redirection").addEventListener("click", function() {
        window.location.href = "home.php"; // Replace with your desired URL
    });
    </script>
    <button type="submit" class="btn btn-success m-2" id="direction">Recette</button>
    <script>
    // JavaScript to handle the redirect
    document.getElementById("direction").addEventListener("click", function() {
        window.location.href = "diagnostic.php"; // Replace with your desired URL
    });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>