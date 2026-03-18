<?php

class Aluno
{
    private string $nome;

    private float $nota1;
    private float $nota2;
    private float $nota3;
    private string $disciplina;


    public function getResumo()
    {
        return "Aluno: {$this->nome}, Disciplina: {$this->disciplina}";
    }
    public function __construct($nome, $disciplina, $nota1, $nota2, $nota3)
    {
        $this->nome = $nome;
        $this->disciplina = $disciplina;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
        $this->nota3 = $nota3;
    }



    public function calcularMedia()
    {
        return ($this->nota1 + $this->nota2 + $this->nota3) / 3;
    }

    public function getStatus()
    {
        $media = $this->calcularMedia();
        if ($media >= 7.0) {
            return "Aprovado";
        } elseif ($media >= 5.0) {
            return "Recuperação";
        } else {
            return " Reprovado";
        }
    }

    public function exibirDetalhes() {
        $media = $this->calcularMedia();
        $status = $this->getStatus();
        return "
        <ul>
            <li>{$this->getResumo()}</li>
            <li>Nota 1: " . number_format($this->nota1, 1, ',', '.') . "</li>
            <li>Nota 2: " . number_format($this->nota2, 1, ',', '.') . "</li>
            <li>Nota 3: " . number_format($this->nota3, 1, ',', '.') . "</li>
            <li><strong>Média final: " . number_format($media, 2, ',', '.') . "</strong></li>
            <li><strong>Status: {$status}</strong></li>
        </ul>
        ";
    }
}
?>