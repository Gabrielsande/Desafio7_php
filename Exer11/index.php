<?php require_once 'CalculadoraGeometrica.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Geométrica</title>
        <link rel="stylesheet" href="../style.css">

    <script>
        // Mostra/oculta o campo de altura conforme a figura escolhida
        function atualizarCampos() {
            var figura = document.getElementById('figura').value;
            var campoMedida1Label = document.getElementById('labelMedida1');
            var campoMedida2      = document.getElementById('grupMedida2');

            if (figura === 'quadrado') {
                campoMedida1Label.textContent = 'Lado:';
                campoMedida2.style.display = 'none';
            } else if (figura === 'retangulo') {
                campoMedida1Label.textContent = 'Base:';
                campoMedida2.style.display = 'block';
            } else if (figura === 'circulo') {
                campoMedida1Label.textContent = 'Raio:';
                campoMedida2.style.display = 'none';
            }
        }
    </script>
</head>
<body onload="atualizarCampos()">
    <h2>Calculadora Geométrica</h2>
    <form method="post">
        <label>Figura:
            <select id="figura" name="figura" onchange="atualizarCampos()">
                <option value="quadrado">Quadrado</option>
                <option value="retangulo">Retângulo</option>
                <option value="circulo">Círculo</option>
            </select>
        </label><br><br>

        <label><span id="labelMedida1">Lado:</span>
            <input type="number" step="0.01" name="medida1" required>
        </label><br><br>

        <div id="grupMedida2" style="display:none;">
            <label>Altura: <input type="number" step="0.01" name="medida2" value="0"></label><br><br>
        </div>

        <button type="submit">Calcular Área</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $calc = new CalculadoraGeometrica(
            $_POST['figura'],
            (float)$_POST['medida1'],
            (float)($_POST['medida2'] ?? 0)
        );
        echo "<h3>Resultado:</h3>";
        echo $calc->exibirDetalhes();
    }
    ?>
</body>
</html>