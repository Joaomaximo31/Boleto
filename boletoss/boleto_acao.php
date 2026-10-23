<?php
include_once __DIR__ . "/Boleto.php";
include_once __DIR__ . "/PDOBoletoDAO.php";

$boletoDAO = PDOBoletoDAO::getInstance();
$acao = $_REQUEST['acao'] ?? '';

if ($acao === 'inserir') {
    $novo = new Boleto(
        $_POST['data_vencimento'], $_POST['data_emissao'], $_POST['valor'],
        $_POST['desconto'], $_POST['juros'], $_POST['multa'], $_POST['mora']
    );
    $boletoDAO->inserir($novo);
    header("Location: boleto_list.php");
    exit;
} elseif ($acao === 'alterar') {
    $alterado = new Boleto(
        $_POST['data_vencimento'], $_POST['data_emissao'], $_POST['valor'],
        $_POST['desconto'], $_POST['juros'], $_POST['multa'], $_POST['mora'],
        $_POST['data_pagamento'] ?: null, $_POST['valor_pago'] ?: null, $_POST['id']
    );
    $boletoDAO->alterar($alterado);
    header("Location: boleto_list.php");
    exit;
} elseif ($acao === 'excluir') {
    $boletoDAO->excluir($_GET['id']);
    header("Location: boleto_list.php");
    exit;
}
?>
