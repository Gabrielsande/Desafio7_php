<?php
class CalculadoraFinanceira {
    private float $valorCompra;
    private int   $numeroParcelas;
    private float $taxaJurosMensal; // em % (ex: 2.5 para 2,5%)

    public function __construct($valorCompra, $numeroParcelas, $taxaJurosMensal) {
        $this->valorCompra      = (float)$valorCompra;
        $this->numeroParcelas   = (int)$numeroParcelas;
        $this->taxaJurosMensal  = (float)$taxaJurosMensal;
    }

    public function getResumo() {
        return "Compra: R$ " . number_format($this->valorCompra, 2, ',', '.') . " em {$this->numeroParcelas}x";
    }

    public function calcularParcela() {
        // Fórmula: parcela = valor * (1 + juro) ^ n
        $taxa = $this->taxaJurosMensal / 100;
        if ($taxa == 0) {
            return $this->valorCompra / $this->numeroParcelas;
        }
        // Fórmula de parcela com juros compostos (Price)
        $fator = pow(1 + $taxa, $this->numeroParcelas);
        return $this->valorCompra * ($taxa * $fator) / ($fator - 1);
    }

    public function calcularTotalAPagar() {
        return $this->calcularParcela() * $this->numeroParcelas;
    }

    public function calcularJurosPagos() {
        return $this->calcularTotalAPagar() - $this->valorCompra;
    }

    public function exibirDetalhes() {
        $parcela  = $this->calcularParcela();
        $total    = $this->calcularTotalAPagar();
        $juros    = $this->calcularJurosPagos();
        $taxa     = number_format($this->taxaJurosMensal, 2, ',', '.');

        return "
        <ul>
            <li>{$this->getResumo()}</li>
            <li>Valor da compra: R$ " . number_format($this->valorCompra, 2, ',', '.') . "</li>
            <li>Número de parcelas: {$this->numeroParcelas}x</li>
            <li>Taxa de juros mensal: {$taxa}%</li>
            <li>Valor da parcela: R$ " . number_format($parcela, 2, ',', '.') . "</li>
            <li>Total a pagar: R$ " . number_format($total, 2, ',', '.') . "</li>
            <li><strong>Juros pagos: R$ " . number_format($juros, 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
?>