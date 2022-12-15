<?php
require_once 'config/validaLogin.php';




    $api = curl_init();
    curl_setopt($api, CURLOPT_URL, "http://localhost:8000/api/assinatura/{$_REQUEST['id']}");
    curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($api, CURLOPT_CUSTOMREQUEST, "DELETE");
    $api_response = curl_exec($api);
    $api_info = curl_getinfo($api);
    curl_close($api);




        header("Location: listagemAssinatura.php");


?>