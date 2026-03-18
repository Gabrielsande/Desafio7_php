<?php
class Pessoa {
    private string $nome;
    private float  $peso;   // kg
    private float  $altura; // metros

    public function __construct($nome, $peso, $altura) {
        $this->nome   = $nome;
        $this->peso   = (float)$peso;
        $this->altura = (float)$altura;
    }

    public function getResumo() {
        return "Pessoa: {$this->nome}";
    }

    public function calcularIMC() {
        // IMC = peso / altura²
        return $this->peso / ($this->altura ** 2);
    }

    public function classificarIMC() {
        $imc = $this->calcularIMC();

        if ($imc < 18.5) {
            return "⬇️ Abaixo do peso";
        } elseif ($imc < 25.0) {
            return "✅ Peso normal";
        } elseif ($imc < 30.0) {
            return "⚠️ Sobrepeso";
        } elseif ($imc < 35.0) {
            return "🔴 Obesidade grau I";
        } elseif ($imc < 40.0) {
            return "🔴 Obesidade grau II";
        } else {
            return "🔴 Obesidade grau III (mórbida)";
        }
    }

    public function exibirDetalhes() {
        $imc           = $this->calcularIMC();
        $classificacao = $this->classificarIMC();

        return "
        <ul>
            <li>{$this->getResumo()}</li>
            <li>Peso: " . number_format($this->peso, 1, ',', '.') . " kg</li>
            <li>Altura: " . number_format($this->altura, 2, ',', '.') . " m</li>
            <li>IMC calculado: " . number_format($imc, 2, ',', '.') . "</li>
            <li><strong>Classificação: {$classificacao}</strong></li>
        </ul>
        ";
    }
}
?>