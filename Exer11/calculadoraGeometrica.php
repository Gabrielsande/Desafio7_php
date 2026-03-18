<?php
class CalculadoraGeometrica {
    private string $figura;    // 'quadrado', 'retangulo', 'circulo'
    private float  $medida1;   // lado (quadrado), base (retangulo), raio (circulo)
    private float  $medida2;   // altura (retangulo) — ignorado para quadrado e circulo

    public function __construct($figura, $medida1, $medida2 = 0) {
        $this->figura  = strtolower($figura);
        $this->medida1 = (float)$medida1;
        $this->medida2 = (float)$medida2;
    }

    public function getResumo() {
        return "Figura: " . ucfirst($this->figura);
    }

    public function calcularArea() {
        switch ($this->figura) {
            case 'quadrado':
                // Área = lado²
                return $this->medida1 ** 2;

            case 'retangulo':
                // Área = base × altura
                return $this->medida1 * $this->medida2;

            case 'circulo':
                // Área = π × raio²
                return M_PI * ($this->medida1 ** 2);

            default:
                return 0.0;
        }
    }

    public function getDescricaoMedidas() {
        switch ($this->figura) {
            case 'quadrado':
                return "Lado: " . number_format($this->medida1, 2, ',', '.') . " unidades";

            case 'retangulo':
                return "Base: " . number_format($this->medida1, 2, ',', '.') .
                       " | Altura: " . number_format($this->medida2, 2, ',', '.') . " unidades";

            case 'circulo':
                return "Raio: " . number_format($this->medida1, 2, ',', '.') . " unidades";

            default:
                return "Medidas não informadas";
        }
    }

    public function exibirDetalhes() {
        $area     = $this->calcularArea();
        $medidas  = $this->getDescricaoMedidas();
        $figura   = ucfirst($this->figura);

        return "
        <ul>
            <li>{$this->getResumo()}</li>
            <li>Medidas: {$medidas}</li>
            <li><strong>Área do {$figura}: " . number_format($area, 2, ',', '.') . " unidades²</strong></li>
        </ul>
        ";
    }
}
?>