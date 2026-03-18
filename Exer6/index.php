<?php require_once 'ConversorMoeda.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Conversor de Moeda</title>
        <link rel="stylesheet" href="../style.css">

</head>
<body>
    <h2>Conversor de Moeda</h2>
    <form method="post">
        <label>Valor em Reais (R$): <input type="number" step="0.01" name="valor" required></label><br><br>
        <label>Moeda de Destino:
            <select name="moeda">
                <option value="USD">Dólar Americano (USD)</option>
                <option value="EUR">Euro (EUR)</option>
            </select>
        </label><br><br>
        <label>Cotação atual (R$ por unidade): <input type="number" step="0.01" name="cotacao" required></label><br><br>
        <button type="submit">Converter</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conversor = new ConversorMoeda(
            (float)$_POST['valor'],
            $_POST['moeda'],
            (float)$_POST['cotacao']
        );
        echo "<h3>Resultado:</h3>";
        echo $conversor->exibirDetalhes();
    }
    ?>
</body>
</html>