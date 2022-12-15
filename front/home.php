<?php 
require_once "config/validaLogin.php";

$api = curl_init();
curl_setopt($api, CURLOPT_URL,"http://localhost:8000/api/user/{$_SESSION['id']}");
curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
$api_response = json_decode(curl_exec($api));
curl_close($api);

$api = curl_init();
curl_setopt($api, CURLOPT_URL,"http://localhost:8000/api/saldo/{$_SESSION['id']}");
curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
$saldo = json_decode(curl_exec($api));
curl_close($api);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel='stylesheet' href='assets/css/bootstrap.css'>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <link rel='stylesheet' href='assets/css/css.css'>
</head>
<body class="bg">

    <?php require_once "NavBar.php"; ?>

    <div class="container cont-marg">
        <div class="card text-center glass" style="background-color:aliceblue solid;">
        <h3 class="card-title h1" style="padding: 10px;">Saldo</h3>
               <h1 class="saldo">R$ <?php echo $saldo->saldo ?></h1>
        </div>

    </div>

</body>

</html>

