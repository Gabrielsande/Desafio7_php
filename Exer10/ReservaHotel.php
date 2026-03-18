<?php
class ReservaHotel {
    private string $hospede;
    private int    $noites;
    private string $tipoQuarto; // 'simples', 'luxo', 'suite'

    // Preços por noite
    private const PRECOS = [
        'simples' => 120.00,
        'luxo'    => 200.00,
        'suite'   => 350.00,
    ];

    // Desconto para estadias acima de 5 noites
    private const DESCONTO_LONGA_ESTADIA = 0.10; // 10%
    private const NOITES_PARA_DESCONTO   = 5;

    public function __construct($hospede, $noites, $tipoQuarto) {
        $this->hospede    = $hospede;
        $this->noites     = (int)$noites;
        $this->tipoQuarto = strtolower($tipoQuarto);
    }

    public function getResumo() {
        return "Hóspede: {$this->hospede}";
    }

    public function getPrecoPorNoite() {
        return self::PRECOS[$this->tipoQuarto] ?? 0.0;
    }

    public function calcularTotalBruto() {
        return $this->getPrecoPorNoite() * $this->noites;
    }

    public function calcularDesconto() {
        if ($this->noites > self::NOITES_PARA_DESCONTO) {
            return $this->calcularTotalBruto() * self::DESCONTO_LONGA_ESTADIA;
        }
        return 0.0;
    }

    public function calcularTotalFinal() {
        return $this->calcularTotalBruto() - $this->calcularDesconto();
    }

    public function getMensagemBoasVindas() {
        $nomeQuarto = ucfirst($this->tipoQuarto);
        return "Bem-vindo(a), {$this->hospede}! Sua reserva no quarto {$nomeQuarto} por {$this->noites} noite(s) está confirmada.";
    }

    public function exibirDetalhes() {
        $precoPorNoite = $this->getPrecoPorNoite();
        $totalBruto    = $this->calcularTotalBruto();
        $desconto      = $this->calcularDesconto();
        $totalFinal    = $this->calcularTotalFinal();
        $boasVindas    = $this->getMensagemBoasVindas();
        $nomeQuarto    = ucfirst($this->tipoQuarto);
        $temDesconto   = $desconto > 0 ? "✅ Sim (10% para estadias acima de 5 noites)" : "❌ Não";

        return "
        <ul>
            <li>{$this->getResumo()}</li>
            <li><em>{$boasVindas}</em></li>
            <li>Tipo de quarto: {$nomeQuarto}</li>
            <li>Diária: R$ " . number_format($precoPorNoite, 2, ',', '.') . "</li>
            <li>Número de noites: {$this->noites}</li>
            <li>Total bruto: R$ " . number_format($totalBruto, 2, ',', '.') . "</li>
            <li>Desconto longa estadia: {$temDesconto}</li>
            <li>Desconto: - R$ " . number_format($desconto, 2, ',', '.') . "</li>
            <li><strong>Total final: R$ " . number_format($totalFinal, 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
?>