<?php
 
    if (!empty($_REQUEST['btnLogin'])) {

    $dados = [
        "email" => $_REQUEST['email'],
        "senha" => $_REQUEST['senha']
        
    ];


    $api = curl_init();
    curl_setopt($api, CURLOPT_URL,"http://localhost:8000/api/login");
    curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($api, CURLOPT_POST, true);
    curl_setopt($api, CURLOPT_POSTFIELDS, $dados);
    $api_response = json_decode(curl_exec($api));
    $api_info = curl_getinfo($api);
    curl_close($api);

    echo "<pre>";
    var_dump($api_response->logdata);
    var_dump($api_info['http_code']);
    echo "</pre>";

  

    }
    
    if ($api_info['http_code'] == 404) {
        
        header("Location: login.php");
    }

    if (isset($api_response->logdata)) {
    session_start();
    $_SESSION['email'] = $dados['email'];
    $_SESSION['senha'] = $dados['senha'];
    $_SESSION['id'] = $api_response->logdata;
    $_SESSION['login'] = True;
    
    var_dump($_SESSION);

    header("Location: home.php");
    
    exit();
    }
        
    
    // header("Location: login.php");


?>
