<?php
if (!empty($_REQUEST['btnCreateUser'])) {

    $dados = [
        "nome" => $_REQUEST['nome'],
        "email" => $_REQUEST['email'],
        "senha" => $_REQUEST['senha']
    ];


    $api = curl_init();
    curl_setopt($api, CURLOPT_URL, "http://localhost:8000/api/user");
    curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($api, CURLOPT_POST, true);
    curl_setopt($api, CURLOPT_POSTFIELDS, $dados);
    $api_response = curl_exec($api);
    $api_info = curl_getinfo($api);
    curl_close($api);

    if ($api_info['http_code'] != 201) {
        echo "<script>alert('Este endereço de email já está em uso!');</script>";
    } else {
        echo "<script>alert('Usuario Criado');</script>";
        header("Location: login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criando Usuario!</title>
    <link rel='stylesheet' href='assets/css/bootstrap.css'>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <link rel='stylesheet' href='assets/css/css.css'>
</head>

<body class="bg">

    <?php require_once "preLoginNavBar.php"; ?>

    <div class="container cont-marg">
        <div cass="row">
            <div class="card forms" style="width: 100%;">
                <div class="card-body" style="padding: 10px;">
                    <h5 class="card-title h3" style="padding: 10px;">Insira os dados</h5>

                    <form action='' method='post'>
                        <div class="form-group" style="padding: 10px; width: 100%">
                            <label for="nome">Nome Completo</label>
                            <input id="nome" name="nome" type="text" class="form-control" required></input>
                        </div>

                        <div class="form-group" style="padding: 10px; width: 100%">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" class="form-control" required></input>
                        </div>

                        <div class="form-group" style="padding: 10px; width: 100%">
                            <label for="senha">Senha</label>
                            <input id="senha" name="senha" type="password" class="form-control" required></input>
                        </div>
                </div>

                <input id="btnCreateUser" name="btnCreateUser" type="submit" class="btn ico-btn" value="Criar Conta" style="padding: 10px; width: 100%">
                </form>




            </div>
        </div>
    </div>
    </div>

</body>


</html>