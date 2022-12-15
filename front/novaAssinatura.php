<?php
require_once "config/validaLogin.php";

if (!empty($_REQUEST['btnCreateAssinatura'])) {

$dados = [
    "users_id" => $_SESSION['id'],
    "nome" => $_REQUEST['nome'],
    "valor" => $_REQUEST['valor'],
    "descricao" => $_REQUEST['descricao']
];


$api = curl_init();
curl_setopt($api, CURLOPT_URL,"http://localhost:8000/api/assinatura");
curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
curl_setopt($api, CURLOPT_POST, true);
curl_setopt($api, CURLOPT_POSTFIELDS, $dados);
$api_response = curl_exec($api);
$api_info = curl_getinfo($api);
curl_close($api);


if ($api_info['http_code'] != 201) {
    echo "<script>alert('Tem algo de errado!');</script>";
}
else{
    echo "<script>alert('Sucesso');</script>";
    header("Location: listagemAssinatura.php");
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assinaturas</title>
    <link rel='stylesheet' href='assets/css/bootstrap.css'>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <link rel='stylesheet' href='assets/css/css.css'>
</head>
<body class="bg">
    
    <?php require_once "navBar.php";?>
  
    <div class="container cont-marg">
        <div cass="row">
                <div class="card forms" style="width: 100%;" >
                    <div class="card-body" style="padding: 10px;">
                        <h5 class="card-title h3" style="padding: 10px;">Insira os dados</h5>
                        
                        <form action='' method='post'>

                            <div class="form-group" style="padding: 10px; width: 100%">
                                <label for="nome">Nome</label>
                                <input id="nome" name="nome" type="text" class="form-control" required></input>
                            </div>

                            <div class="form-group" style="padding: 10px; width: 100%">
                                <label for="valor">Valor</label>
                                <input id="valor" name="valor" type="text" class="form-control" required></input>
                            </div>

                            <div class="form-group" style="padding: 10px; width: 100%"> 
                                <label for="descricao">Descrição</label>
                                <input id="descricao" name="descricao" type="text" class="form-control" required></input> 
                            </div>
                            
                            <input id="btnCreateAssinatura" name="btnCreateAssinatura" type="submit" class="btn ico-btn" value="Criar Assinatura" style="padding: 10px; width: 100%">
                        </form>

                        

    
                    </div>
                </div> 
        </div>
    </div>

</body>


</html>