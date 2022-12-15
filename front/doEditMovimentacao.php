<?php
require_once 'config/validaLogin.php';

if (!empty($_REQUEST['btnEditarMovimentacao'])) {

    $dados = [
        "descricao" => $_REQUEST['descricao'],
        "valor" => $_REQUEST['valor'],
        "recorrente" => $_REQUEST['recorrente'],
        "tipo_movimentacoes_id" => $_REQUEST['tipo_movimentacoes_id']
    ];

var_dump($dados);

    $api = curl_init();
    curl_setopt($api, CURLOPT_URL, "http://localhost:8000/api/movimentacao/{$_REQUEST['id']}");
    curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($api, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($api, CURLOPT_POSTFIELDS,http_build_query($dados));
    $api_response = curl_exec($api);
    $api_info = curl_getinfo($api);
    curl_close($api);

var_dump($api_response);

    if ($api_info['http_code'] != 200) {
        echo "<script>alert('Tem algo de errado!');</script>";
        header("Location: editarMovimentacao.php");
    } else {
        echo "<script>alert('Assinatura Atualizada');</script>";
        header("Location: listagemMovimentacao.php");
    }
}

?>