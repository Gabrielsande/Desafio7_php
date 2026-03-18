<?php
class Viagem {
    private string $origem;
    private string $destino;
    private float  $distancia;      // km
    private float  $tempoEstimado;  // horas
    private float  $consumo;        // km/l
    private float  $precoCombustivel;

    public function __construct($origem, $destino, $distancia, $tempoEstimado, $consumo, $precoCombustivel) {
        $this->origem            = $origem;
        $this->destino           = $destino;
        $this->distancia         = (float)$distancia;
        $this->tempoEstimado     = (float)$tempoEstimado;
        $this->consumo           = (float)$consumo;
        $this->precoCombustivel  = (float)$precoCombustivel;
    }

    public function getResumo() {
        return "Viagem: {$this->origem} → {$this->destino}";
    }

    public function calcularVelocidadeMedia() {
        // velocidade = distância / tempo
        return $this->distancia / $this->tempoEstimado;
    }

    public function calcularConsumoEstimado() {
        // litros necessários = distância / consumo (km/l)
        return $this->distancia / $this->consumo;
    }

    public function calcularCustoViagem() {
        // custo = litros × preço do combustível
        return $this->calcularConsumoEstimado() * $this->precoCombustivel;
    }

    public function exibirDetalhes() {
        $velocidade = $this->calcularVelocidadeMedia();
        $consumo    = $this->calcularConsumoEstimado();
        $custo      = $this->calcularCustoViagem();

        return "
        <ul>
            <li>{$this->getResumo()}</li>
            <li>Distância: " . number_format($this->distancia, 1, ',', '.') . " km</li>
            <li>Tempo estimado: " . number_format($this->tempoEstimado, 1, ',', '.') . " hora(s)</li>
            <li>Consumo do veículo: {$this->consumo} km/l</li>
            <li>Preço do combustível: R$ " . number_format($this->precoCombustivel, 2, ',', '.') . "/l</li>
            <li>Velocidade média: " . number_format($velocidade, 1, ',', '.') . " km/h</li>
            <li>Consumo estimado: " . number_format($consumo, 2, ',', '.') . " litros</li>
            <li><strong>Custo da viagem: R$ " . number_format($custo, 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
?>