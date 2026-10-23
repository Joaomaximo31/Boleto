<?php
include_once __DIR__ . "/PDOBoletoDAO.php";
$boletos = PDOBoletoDAO::getInstance()->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Boletos</title>
    <style>
        body { font-family: sans-serif; margin: 40px; background: #f4f6f9; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #eee; }
        .btn { background: #28a745; color: white; padding: 10px 15px; text-decoration: none; font-weight: bold; border-radius: 4px; display: inline-block; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Boletos Cadastrados</h1>
    <a href="boleto_cad.php" class="btn">+ Novo Boleto</a>
    <table>
        <thead>
            <tr><th>ID</th><th>Vencimento</th><th>Valor (R$)</th><th>Pagamento</th><th>Ações</th></tr>
        </thead>
        <tbody>
            <?php foreach($boletos as $b): ?>
            <tr>
                <td><?= $b['id'] ?></td>
                <td><?= $b['data_vencimento'] ?></td>
                <td>R$ <?= number_format($b['valor'], 2, ',', '.') ?></td>
                <td><?= $b['data_pagamento'] ?? 'Pendente' ?></td>
                <td>
                    <a href="boleto_cad.php?id=<?= $b['id'] ?>">Editar</a> | 
                    <a href="boleto_acao.php?acao=excluir&id=<?= $b['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
