<?php
require_once 'config/validaLogin.php';

if (!empty($_REQUEST['btnEditarUsuario'])) {

    $dados = [
        "nome" => $_REQUEST['nome'],
        "email" => $_REQUEST['email'],
        "senha" => $_REQUEST['senha']
    ];

    $api = curl_init();
    curl_setopt($api, CURLOPT_URL, "http://localhost:8000/api/user/{$_SESSION['id']}");
    curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($api, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($api, CURLOPT_POSTFIELDS,http_build_query($dados));
    $api_response = curl_exec($api);
    $api_info = curl_getinfo($api);
    curl_close($api);



    if ($api_info['http_code'] != 200) {
        echo "<script>alert('Tem algo de errado!');</script>";
        header("Location: editarUsuario.php");
    } else {
        echo "<script>alert('Usuario Criado');</script>";
        header("Location: editarUsuario.php");
    }
}

?>