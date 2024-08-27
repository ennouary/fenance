<?php
$succes = 0;
$user = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['name'];
    $password = $_POST['password'];


    $sql = "Select * from `regestration` where name ='$username'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $user = 1;
            session_start();
            header('location:firstpage.php');
        } else {
            $sql = "insert into `regestration`(name,password) values('$username','$password')";
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
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>sign in page </title>
</head>

<body>
    <?php
    if ($user) {
        echo '<div time-10 class="alert alert-danger" role="alert"> utilisateur est deja existe </div>';
    }
    ?>
    <?php
    if ($succes) {
        echo '<div time-10 class="alert alert-success" role="alert"> vous avez bien enregistrer </div>';

    }
    ?>
    <h1 class="text-center">sign up page</h1>
    <form action="signup.php" method="POST">
        <div class="mb-3 m-5">
            <label for="exampleInputEmail1" class="form-label">name</label>
            <input type="text" class="form-control" name="name" placeholder="enter you username" autocomplete="off">
        </div>
        <div class="mb-3 m-5">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="enter you password"
                autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary m-5 ">Sign up</button>
    </form>
</body>

</html>