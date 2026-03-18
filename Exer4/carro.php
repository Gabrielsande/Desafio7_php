<?php
class Carro {
    private string $modelo;
    private string $combustivel; // 'etanol' ou 'gasolina'
    private float $tanque;       // litros
    private float $consumo;      // km/l
    private float $precoCombustivel;
    private int   $kmRodados;

    // Km recomendado para revisão
    private const KM_REVISAO = 10000;

    public function __construct($modelo, $combustivel, $tanque, $consumo, $precoCombustivel, $kmRodados) {
        $this->modelo            = $modelo;
        $this->combustivel       = strtolower($combustivel);
        $this->tanque            = $tanque;
        $this->consumo           = $consumo;
        $this->precoCombustivel  = $precoCombustivel;
        $this->kmRodados         = $kmRodados;
    }

    public function getResumo() {
        return "Modelo: {$this->modelo}, Combustível: {$this->combustivel}";
    }

    public function calcularAutonomia() {
        // Autonomia = tanque cheio × consumo (km/l)
        return $this->tanque * $this->consumo;
    }

    public function calcularCustoPorKm() {
        // Custo por km = preço do combustível / consumo
        return $this->precoCombustivel / $this->consumo;
    }

    public function verificarRevisao() {
        if ($this->kmRodados >= self::KM_REVISAO) {
            return "Revisão necessária! ({$this->kmRodados} km rodados)";
        }
        $restantes = self::KM_REVISAO - $this->kmRodados;
        return "Revisão em dia. Faltam " . number_format($restantes, 0, ',', '.') . " km.";
    }

    public function exibirDetalhes() {
        $autonomia  = $this->calcularAutonomia();
        $custoPorKm = $this->calcularCustoPorKm();
        $revisao    = $this->verificarRevisao();

        return "
        <ul>
            <li>{$this->getResumo()}</li>
            <li>Tanque cheio: {$this->tanque} litros</li>
            <li>Consumo: {$this->consumo} km/l</li>
            <li>Preço do combustível: R$ " . number_format($this->precoCombustivel, 2, ',', '.') . "/l</li>
            <li>Autonomia: " . number_format($autonomia, 1, ',', '.') . " km</li>
            <li>Custo por km: R$ " . number_format($custoPorKm, 2, ',', '.') . "</li>
            <li>Km rodados: " . number_format($this->kmRodados, 0, ',', '.') . " km</li>
            <li><strong>Status de revisão: {$revisao}</strong></li>
        </ul>
        ";
    }
}
?>