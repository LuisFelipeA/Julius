<?php
require_once "config/validaLogin.php";

$url_feed = "http://localhost:8000/api/user/{$_SESSION['id']}";


$api = curl_init();
curl_setopt($api, CURLOPT_URL, $url_feed);
curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($api);
curl_close($api);



$user_info = json_decode($result);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Usuario!</title>
    <link rel='stylesheet' href='assets/css/bootstrap.css'>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <link rel='stylesheet' href='assets/css/css.css'>
</head>

<body class="bg">

    <?php require_once "navBar.php"; ?>

    <div class="container cont-marg">
        <div cass="row">
            <div class="card forms" style="width: 100%;">
                <div class="card-body" style="padding: 10px;">
                    <h5 class="card-title h3" style="padding: 10px;">Altere os dados</h5>

                    <form action='doEditUsuario.php' method='post'>
                        <div class="form-group" style="padding: 10px; width: 100%">
                            <label for="nome">Nome Completo</label>
                            <input id="nome" name="nome" type="text" class="form-control" value="<?php echo $user_info->User->nome;?>" required></input>
                        </div>

                        <div class="form-group" style="padding: 10px; width: 100%">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" class="form-control" value="<?php echo $user_info->User->email;?>" required></input>
                        </div>

                        <div class="form-group" style="padding: 10px; width: 100%">
                            <label for="senha">Senha</label>
                            <input id="senha" name="senha" type="password" class="form-control" required></input>
                        </div>

                        <div class="form-group border-top border-5" style="padding-bottom: 5px;">
                            <div style="text-align: center; padding:4px; margin-bottom:5px;">
                                <input id="btnEditarUsuario" name="btnEditarUsuario" type="submit" class="btn ico-btn" value="Salvar Mudanças" style="padding: 10px; width: 100%">
                            </div>
                            <div style="text-align: center; padding:4px; margin-bottom:5px;">
                                <a href="index.php" class="red-btn btn" style="padding: 10px; width: 100%">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>


</html>