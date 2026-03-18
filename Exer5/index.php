<?php require_once 'Produto.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>
        <link rel="stylesheet" href="../style.css">

</head>
<body>
    <h2>Controle de Estoque</h2>
    <form method="post">
        <label>Nome do Produto: <input type="text" name="nome" required></label><br><br>
        <label>Quantidade em Estoque: <input type="number" min="0" name="estoque" required></label><br><br>
        <label>Valor Unitário (R$): <input type="number" step="0.01" name="valor" required></label><br><br>
        <label>Operação:
            <select name="operacao">
                <option value="consulta">Apenas Consultar</option>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
            </select>
        </label><br><br>
        <label>Quantidade da Movimentação: <input type="number" min="0" name="quantidade" value="0" required></label><br><br>
        <button type="submit">Executar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $produto = new Produto(
            $_POST['nome'],
            (int)$_POST['estoque'],
            (float)$_POST['valor']
        );
        echo "<h3>Resultado:</h3>";
        echo $produto->exibirDetalhes($_POST['operacao'], (int)$_POST['quantidade']);
    }
    ?>
</body>
</html>