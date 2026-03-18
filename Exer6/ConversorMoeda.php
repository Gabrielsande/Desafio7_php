<?php
class ConversorMoeda {
    private float $valorReais;
    private string $moedaDestino; // 'USD' ou 'EUR'
    private float $cotacao;

    public function __construct($valorReais, $moedaDestino, $cotacao) {
        $this->valorReais    = (float)$valorReais;
        $this->moedaDestino  = strtoupper($moedaDestino);
        $this->cotacao       = (float)$cotacao;
    }

    public function getResumo() {
        return "Conversão: R$ " . number_format($this->valorReais, 2, ',', '.') . " → {$this->moedaDestino}";
    }

    public function converter() {
        return $this->valorReais / $this->cotacao;
    }

    public function getSimboloMoeda() {
        switch ($this->moedaDestino) {
            case 'USD': return '$';
            case 'EUR': return '€';
            default:    return $this->moedaDestino;
        }
    }

    public function getNomeMoeda() {
        switch ($this->moedaDestino) {
            case 'USD': return 'Dólar Americano';
            case 'EUR': return 'Euro';
            default:    return $this->moedaDestino;
        }
    }

    public function exibirDetalhes() {
        $valorConvertido = $this->converter();
        $simbolo         = $this->getSimboloMoeda();
        $nomeMoeda       = $this->getNomeMoeda();

        return "
        <ul>
            <li>{$this->getResumo()}</li>
            <li>Moeda de destino: {$nomeMoeda} ({$this->moedaDestino})</li>
            <li>Cotação utilizada: R$ " . number_format($this->cotacao, 2, ',', '.') . " por {$simbolo}1,00</li>
            <li>Valor em reais: R$ " . number_format($this->valorReais, 2, ',', '.') . "</li>
            <li><strong>Valor convertido: {$simbolo} " . number_format($valorConvertido, 2, '.', ',') . "</strong></li>
        </ul>
        ";
    }
}
?>