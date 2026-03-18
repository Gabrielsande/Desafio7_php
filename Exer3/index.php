<?php require_once 'Pedido.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pedido</title>
</head>
<body>
    <h2>Informações do Pedido</h2>
    <form method="post">
        <label>Nome do Produto: <input type="text" name="produto" required></label><br><br>
        <label>Quantidade: <input type="number" min="1" name="quantidade" required></label><br><br>
        <label>Preço Unitário (R$): <input type="number" step="0.01" name="preco" required></label><br><br>
        <label>Tipo de Cliente:
            <select name="tipo">
                <option value="normal">Normal</option>
                <option value="premium">Premium</option>
            </select>
        </label><br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pedido = new Pedido(
            $_POST['produto'],
            (int)$_POST['quantidade'],
            (float)$_POST['preco'],
            $_POST['tipo']
        );
        echo "<h3>Resultado:</h3>";
        echo $pedido->exibirDetalhes();
    }
    ?>
</body>
</html>