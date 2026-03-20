# 📚 Exercícios PHP — Programação Orientada a Objetos

Série de exercícios práticos de **PHP com POO (Programação Orientada a Objetos)**, cobrindo encapsulamento, métodos, lógica condicional e integração com formulários HTML.

---

## 🗂️ Estrutura Geral do Projeto

```
projeto/
│
│   ├── style.css              ← CSS compartilhado por todos os exercícios
│   ├── exercicio01/
│   │   ├── funcionario.php
│   │   └── index.php
│   ├── exercicio02/
│   │   ├── aluno.php
│   │   └── index.php
│   ├── exercicio03/
│   │   ├── Pedido.php
│   │   └── index.php
│   ├── exercicio04/
│   │   ├── Carro.php
│   │   └── index.php
│   ├── exercicio05/
│   │   ├── Produto.php
│   │   └── index.php
│   ├── exercicio06/
│   │   ├── ConversorMoeda.php
│   │   └── index.php
│   ├── exercicio07/
│   │   ├── Viagem.php
│   │   └── index.php
│   ├── exercicio08/
│   │   ├── CalculadoraFinanceira.php
│   │   └── index.php
│   ├── exercicio09/
│   │   ├── Pessoa.php
│   │   └── index.php
│   ├── exercicio10/
│   │   ├── ReservaHotel.php
│   │   └── index.php
│   └── exercicio11/
│       ├── CalculadoraGeometrica.php
│       └── index.php
│

```

---

## ⚙️ Requisitos

- PHP 8.0 ou superior
- Servidor local: [XAMPP](https://www.apachefriends.org/), [Laragon](https://laragon.org/) ou similar
- Navegador moderno (para os estilos e JavaScript do Ex. 11)

---

## 🚀 Como Executar

1. Coloque a pasta do projeto dentro de `htdocs/` (XAMPP) ou `www/` (Laragon)
2. Inicie o Apache no painel do servidor
3. Acesse no navegador:
   ```
   http://localhost/exercicios/exercicio03/
   http://localhost/exercicios/exercicio04/
   ... e assim por diante
   ```

---

## 📝 Exercícios

---

### ✅ Exercício 01 — Classe `Funcionario` *(exemplo base)*

**Objetivo:** Calcular salário com bônus e horas extras.

| Campo            | Tipo     |
|------------------|----------|
| Nome             | `string` |
| Cargo            | `string` |
| Salário          | `float`  |
| Carga Horária    | `int`    |
| Bônus            | `float`  |
| Horas Extras     | `int`    |

**Métodos:**
- `getResumo()` — retorna nome e cargo
- `calcularValorHora()` — salário ÷ (carga × 4)
- `calcularHoraExtra(int $horas)` — valor/hora × 1.5 × horas
- `calcularSalarioComBonus(float $bonus)` — salário + bônus
- `exibirDetalhes(float $bonus, int $horasExtras)` — HTML com resumo completo

---

### ✅ Exercício 02 — Classe `Aluno`

**Objetivo:** Calcular média de três notas e determinar o status do aluno.

| Campo      | Tipo     |
|------------|----------|
| Nome       | `string` |
| Disciplina | `string` |
| Nota 1     | `float`  |
| Nota 2     | `float`  |
| Nota 3     | `float`  |

**Métodos:**
- `getResumo()` — nome e disciplina
- `calcularMedia()` — média aritmética das três notas
- `getStatus()` — retorna status com base na média:
  - ≥ 7.0 → ✅ Aprovado
  - ≥ 5.0 → ⚠️ Recuperação
  - < 5.0 → ❌ Reprovado
- `exibirDetalhes()` — HTML com notas, média e status

**Habilidades:** validação de dados, lógica condicional, integração PHP + HTML

---

### ✅ Exercício 03 — Classe `Pedido`

**Objetivo:** Calcular total de um pedido com desconto para clientes premium e imposto fixo.

| Campo          | Tipo     |
|----------------|----------|
| Produto        | `string` |
| Quantidade     | `int`    |
| Preço unitário | `float`  |
| Tipo de cliente| `string` |

**Métodos:**
- `calcularTotalBruto()` — quantidade × preço unitário
- `calcularDesconto()` — 10% para cliente `premium`, 0 para `normal`
- `calcularImposto()` — 8% sobre o total bruto
- `calcularTotalFinal()` — bruto − desconto + imposto
- `exibirDetalhes()` — HTML com todos os valores

**Habilidades:** operações matemáticas com formatação, estrutura condicional, encapsulamento

---

### ✅ Exercício 04 — Classe `Carro`

**Objetivo:** Calcular autonomia, custo por km e status de revisão do veículo.

| Campo              | Tipo     |
|--------------------|----------|
| Modelo             | `string` |
| Combustível        | `string` |
| Tanque (litros)    | `float`  |
| Consumo (km/l)     | `float`  |
| Preço combustível  | `float`  |
| Km rodados         | `int`    |

**Métodos:**
- `calcularAutonomia()` — tanque × consumo
- `calcularCustoPorKm()` — preço ÷ consumo
- `verificarRevisao()` — alerta se km ≥ 10.000
- `exibirDetalhes()` — HTML com todos os dados

**Habilidades:** métodos auxiliares, reutilização de lógica, múltiplos inputs

---

### ✅ Exercício 05 — Classe `Produto`

**Objetivo:** Simular movimentações de estoque (entrada e saída) com validação.

| Campo          | Tipo     |
|----------------|----------|
| Nome           | `string` |
| Estoque        | `int`    |
| Valor unitário | `float`  |

**Métodos:**
- `entradaEstoque(int $qtd)` — adiciona ao estoque com validação
- `saidaEstoque(int $qtd)` — remove do estoque, impede saldo negativo
- `calcularValorTotal()` — estoque × valor unitário
- `exibirDetalhes(string $op, int $qtd)` — executa operação e exibe resultado

**Habilidades:** manipulação de estado interno, operações reais, encapsulamento + formulários

---

### ✅ Exercício 06 — Classe `ConversorMoeda`

**Objetivo:** Converter valores em reais para dólar (USD) ou euro (EUR) com cotação manual.

| Campo         | Tipo     |
|---------------|----------|
| Valor (R$)    | `float`  |
| Moeda destino | `string` |
| Cotação       | `float`  |

**Métodos:**
- `converter()` — valor ÷ cotação
- `getSimboloMoeda()` — retorna `$` ou `€` via `switch`
- `getNomeMoeda()` — retorna nome completo da moeda
- `exibirDetalhes()` — HTML com origem, destino e valor convertido

**Habilidades:** simulação de API com input manual, `switch`, formatação numérica internacional

---

### ✅ Exercício 07 — Classe `Viagem`

**Objetivo:** Calcular velocidade média, consumo estimado e custo total de uma viagem.

| Campo              | Tipo     |
|--------------------|----------|
| Origem             | `string` |
| Destino            | `string` |
| Distância (km)     | `float`  |
| Tempo (horas)      | `float`  |
| Consumo (km/l)     | `float`  |
| Preço combustível  | `float`  |

**Métodos:**
- `calcularVelocidadeMedia()` — distância ÷ tempo
- `calcularConsumoEstimado()` — distância ÷ consumo (litros)
- `calcularCustoViagem()` — litros × preço
- `exibirDetalhes()` — HTML com todos os dados

**Habilidades:** reutilização de métodos, aplicação real prática, múltiplos parâmetros

---

### ✅ Exercício 08 — Classe `CalculadoraFinanceira`

**Objetivo:** Calcular parcelamento com juros compostos (fórmula Price).

| Campo          | Tipo    |
|----------------|---------|
| Valor da compra| `float` |
| Parcelas       | `int`   |
| Taxa mensal (%)| `float` |

**Fórmula utilizada:**
```
parcela = valor × (taxa × (1 + taxa)^n) / ((1 + taxa)^n − 1)
```

**Métodos:**
- `calcularParcela()` — aplica fórmula Price com `pow()`
- `calcularTotalAPagar()` — parcela × n
- `calcularJurosPagos()` — total − valor original
- `exibirDetalhes()` — HTML com parcela, total e juros pagos

**Habilidades:** matemática financeira, `pow()`, `number_format()`, métodos com retorno

---

### ✅ Exercício 09 — Classe `Pessoa`

**Objetivo:** Calcular o IMC e classificar o resultado em 6 faixas.

| Campo  | Tipo     |
|--------|----------|
| Nome   | `string` |
| Peso   | `float`  |
| Altura | `float`  |

**Fórmula:**
```
IMC = peso / altura²
```

**Classificações:**
| IMC           | Status                      |
|---------------|-----------------------------|
| < 18.5        | ⬇️ Abaixo do peso           |
| 18.5 – 24.9   | ✅ Peso normal              |
| 25.0 – 29.9   | ⚠️ Sobrepeso                |
| 30.0 – 34.9   | 🔴 Obesidade grau I         |
| 35.0 – 39.9   | 🔴 Obesidade grau II        |
| ≥ 40.0        | 🔴 Obesidade grau III       |

**Habilidades:** fórmulas simples, retorno condicional, dados numéricos reais

---

### ✅ Exercício 10 — Classe `ReservaHotel`

**Objetivo:** Simular reserva de hotel com cálculo de diárias, desconto e mensagem de boas-vindas.

| Campo       | Tipo     |
|-------------|----------|
| Hóspede     | `string` |
| Noites      | `int`    |
| Tipo quarto | `string` |

**Preços por noite (constantes):**
| Quarto  | Valor     |
|---------|-----------|
| Simples | R$ 120,00 |
| Luxo    | R$ 200,00 |
| Suíte   | R$ 350,00 |

**Regras:**
- Desconto de **10%** para estadias acima de **5 noites**

**Métodos:**
- `getPrecoPorNoite()` — acessa array de constantes via `switch`
- `calcularDesconto()` — aplica 10% se noites > 5
- `calcularTotalFinal()` — bruto − desconto
- `getMensagemBoasVindas()` — string personalizada
- `exibirDetalhes()` — HTML completo

**Habilidades:** `const`, arrays, `switch`, métodos com e sem retorno, lógica de desconto

---

### ✅ Exercício 11 — Classe `CalculadoraGeometrica`

**Objetivo:** Calcular a área de diferentes figuras geométricas com `switch`.

| Campo      | Tipo     |
|------------|----------|
| Figura     | `string` |
| Medida 1   | `float`  |
| Medida 2   | `float`  |

**Fórmulas:**
| Figura     | Fórmula         |
|------------|-----------------|
| Quadrado   | `lado²`         |
| Retângulo  | `base × altura` |
| Círculo    | `π × raio²`     |

**Métodos:**
- `calcularArea()` — seleciona fórmula com `switch`
- `getDescricaoMedidas()` — label dinâmico conforme figura
- `exibirDetalhes()` — HTML com tipo, medidas e área

> **Bônus:** o `index.php` usa **JavaScript** para mostrar/ocultar o campo "altura" dinamicamente conforme a figura selecionada.

**Habilidades:** `switch`, `M_PI`, generalização de métodos, JS + PHP integrados

---

## 🎨 Estilo Visual

Todos os exercícios compartilham o arquivo `exercicios/style.css`.

| Detalhe         | Escolha                          |
|-----------------|----------------------------------|
| Tema            | Dark Industrial                  |
| Cor de destaque | `#e8ff47` (amarelo elétrico)     |
| Fonte display   | Syne (700 / 800)                 |
| Fonte corpo     | DM Sans (300 / 400 / 500)        |
| Border radius   | 10px / 18px                      |
| Responsivo      | Sim — colapsa em mobile          |

---

## 💡 Conceitos de POO Praticados

| Conceito            | Exercícios que aplicam         |
|---------------------|-------------------------------|
| Encapsulamento      | Todos (`private` + getters)   |
| Construtores        | Todos (`__construct`)         |
| Métodos auxiliares  | 04, 07, 08, 10                |
| Lógica condicional  | 02, 03, 04, 05, 09, 10        |
| `switch`            | 06, 10, 11                    |
| Constantes (`const`)| 04, 10                        |
| Formatação numérica | Todos (`number_format`)       |
| Matemática          | 07, 08, 09, 11                |
| Estado interno      | 05                            |

---

## 👨‍💻 Autor

Gabriel Sandes
