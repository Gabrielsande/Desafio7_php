<?php
class Produto {
    private string $nome;
    private int   $estoque;
    private float $valorUnitario;

    public function __construct($nome, $estoque, $valorUnitario) {
        $this->nome          = $nome;
        $this->estoque       = (int)$estoque;
        $this->valorUnitario = (float)$valorUnitario;
    }

    public function getResumo() {
        return "Produto: {$this->nome}";
    }

    public function entradaEstoque(int $quantidade) {
        if ($quantidade <= 0) {
            return "❌ Quantidade de entrada deve ser maior que zero.";
        }
        $this->estoque += $quantidade;
        return "✅ Entrada de {$quantidade} unidade(s) realizada. Novo estoque: {$this->estoque}";
    }

    public function saidaEstoque(int $quantidade) {
        if ($quantidade <= 0) {
            return "❌ Quantidade de saída deve ser maior que zero.";
        }
        if ($quantidade > $this->estoque) {
            return "❌ Estoque insuficiente. Disponível: {$this->estoque} unidade(s).";
        }
        $this->estoque -= $quantidade;
        return "Saída de {$quantidade} unidade(s) realizada. Novo estoque: {$this->estoque}";
    }

    public function calcularValorTotal() {
        return $this->estoque * $this->valorUnitario;
    }

    public function exibirDetalhes(string $operacao, int $quantidade) {
        // Executa a operação antes de exibir
        if ($operacao === 'entrada') {
            $mensagem = $this->entradaEstoque($quantidade);
        } elseif ($operacao === 'saida') {
            $mensagem = $this->saidaEstoque($quantidade);
        } else {
            $mensagem = "Nenhuma movimentação realizada.";
        }

        return "
        <ul>
            <li>{$this->getResumo()}</li>
            <li>Valor unitário: R$ " . number_format($this->valorUnitario, 2, ',', '.') . "</li>
            <li>Movimentação: {$mensagem}</li>
            <li>Estoque atual: {$this->estoque} unidade(s)</li>
            <li><strong>Valor total em estoque: R$ " . number_format($this->calcularValorTotal(), 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
?>