<?php
class Pedido
{

    private string $produto;
    private int $quantidade;
    private float $precoUnitario;
    private string $tipoCliente;

    public function __construct($produto, $quantidade, $precoUnitario, $tipoCliente)
    {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->precoUnitario = $precoUnitario;
        $this->tipoCliente = $tipoCliente;
    }

    public function getResumo()
    {
        return "Produto: {$this->produto}, Cliente: {$this->tipoCliente}";

    }

    public function calcularTotal()
    {
        return $this->quantidade * $this->precoUnitario;
    }

    public function calcularDesconto()
    {
        //10% de desconto para cliente premium
        if ($this->tipoCliente === 'premium') {
            return $this->calcularTotal() * 0.10;
        }
        return 0.0;
    }

      public function calcularImposto() {
        // Imposto de 8% sobre o total bruto
        return $this->calcularTotal() * 0.08;
    }
 
    public function calcularTotalFinal() {
        return $this->calcularTotal() - $this->calcularDesconto() + $this->calcularImposto();
    }
 
    public function exibirDetalhes() {
        $bruto    = $this->calcularTotal();
        $desconto = $this->calcularDesconto();
        $imposto  = $this->calcularImposto();
        $final    = $this->calcularTotalFinal();
        $tipoLabel = $this->tipoCliente === 'premium' ? 'remium (10% desconto)' : 'Normal';
 
        return "
        <ul>
            <li>{$this->getResumo()}</li>
            <li>Quantidade: {$this->quantidade} un.</li>
            <li>Preço unitário: R$ " . number_format($this->precoUnitario, 2, ',', '.') . "</li>
            <li>Total bruto: R$ " . number_format($bruto, 2, ',', '.') . "</li>
            <li>Tipo de cliente: {$tipoLabel}</li>
            <li>Desconto: - R$ " . number_format($desconto, 2, ',', '.') . "</li>
            <li>Imposto (8%): + R$ " . number_format($imposto, 2, ',', '.') . "</li>
            <li><strong>Total final: R$ " . number_format($final, 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}



?>