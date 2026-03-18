<?php require_once 'ReservaHotel.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Reserva de Hotel</title>
        <link rel="stylesheet" href="../style.css">

</head>
<body>
    <h2>Reserva de Hotel</h2>
    <form method="post">
        <label>Nome do Hóspede: <input type="text" name="hospede" required></label><br><br>
        <label>Número de Noites: <input type="number" min="1" name="noites" required></label><br><br>
        <label>Tipo de Quarto:
            <select name="quarto">
                <option value="simples">Simples (R$ 120,00/noite)</option>
                <option value="luxo">Luxo (R$ 200,00/noite)</option>
                <option value="suite">Suíte (R$ 350,00/noite)</option>
            </select>
        </label><br><br>
        <button type="submit">Reservar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $reserva = new ReservaHotel(
            $_POST['hospede'],
            (int)$_POST['noites'],
            $_POST['quarto']
        );
        echo "<h3>Resultado:</h3>";
        echo $reserva->exibirDetalhes();
    }
    ?>
</body>
</html>