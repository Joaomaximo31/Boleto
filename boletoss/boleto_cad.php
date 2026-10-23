 <?php
include_once __DIR__ . "/PDOBoletoDAO.php";
$boletoDAO = PDOBoletoDAO::getInstance();
$id = $_GET['id'] ?? null;
$b = $id ? $boletoDAO->obter($id) : null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Boleto</title>
    <style>
        body { font-family: sans-serif; margin: 40px; background: #f4f6f9; }
        .box { background: white; padding: 20px; border-radius: 8px; max-width: 400px; margin: auto; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 8px; margin: 6px 0 16px; box-sizing: border-box; }
        button { background: #007bff; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>
    <div class="box">
        <h2><?= $b ? "Editar Boleto ID: ".$b['id'] : "Novo Boleto" ?></h2>
        <form action="boleto_acao.php" method="POST">
            <input type="hidden" name="acao" value="<?= $b ? 'alterar' : 'inserir' ?>">
            <?php if($b): ?><input type="hidden" name="id" value="<?= $b['id'] ?>"><?php endif; ?>

            <label>Emissão:</label><input type="date" name="data_emissao" value="<?= $b['data_emissao'] ?? date('Y-m-d') ?>" required>
            <label>Vencimento:</label><input type="date" name="data_vencimento" value="<?= $b['data_vencimento'] ?? '' ?>" required>
            <label>Valor:</label><input type="number" step="0.01" name="valor" value="<?= $b['valor'] ?? '' ?>" required>
            <label>Desconto:</label><input type="number" step="0.01" name="desconto" value="<?= $b['desconto'] ?? 0 ?>">
            <label>Juros:</label><input type="number" step="0.01" name="juros" value="<?= $b['juros'] ?? 0 ?>">
            <label>Multa:</label><input type="number" step="0.01" name="multa" value="<?= $b['multa'] ?? 0 ?>">
            <label>Mora:</label><input type="number" step="0.01" name="mora" value="<?= $b['mora'] ?? 0 ?>">

            <?php if($b): ?>
                <label>Data Pagamento:</label><input type="date" name="data_pagamento" value="<?= $b['data_pagamento'] ?? '' ?>">
                <label>Valor Pago:</label><input type="number" step="0.01" name="valor_pago" value="<?= $b['valor_pago'] ?? '' ?>">
            <?php endif; ?>

            <button type="submit">Salvar Registro</button>
        </form>
    </div>
</body>
</html>
