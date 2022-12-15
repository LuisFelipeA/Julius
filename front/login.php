

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login!</title>
    <link rel='stylesheet' href='assets/css/bootstrap.css'>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <link rel='stylesheet' href='assets/css/css.css'>
</head>
<body class="bg">
    
    <?php require_once "preLoginNavBar.php"; ?>

    <div class="col-md-3 position-absolute top-50 start-50 translate-middle">
        <div class="card forms" style="width: 100%;">
            <div class="card-body" style="padding: 10px;">
                <h5 class="card-title h3" style="padding: 10px;">Entrar</h5>
                <form action="doLogin.php" method="POST">
                    <div class="form-group" style="padding: 10px; width: 100%">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" class="form-control" required></input>
                    </div>
                    <div class="form-group" style="padding: 10px; width: 100%">
                        <label for="senha">Senha</label>
                        <input id="senha" name="senha" type="password" class="form-control" required></input>
                    </div>
                    <input id="btnLogin" name="btnLogin" type="submit" class="btn ico-btn" value="Entrar" style="padding: 10px; width: 100%"></input>
                </form>
                <div style="margin: 10px; text-align: right">
                    <a href="newUser.php" class="card-link">Criar conta</a>
                </div>
            </div>
        </div> 
    </div>
   