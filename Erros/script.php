<?php
//  Sistema de Estoque (PHP) 


$estoque = [
    ["id" => 1, "nome" => "Caneta", "quantidade" => 100, "preco" => 2.5],
    ["id" => 2, "nome" => "Caderno", "quantidade" => 50, "preco" => 10],
    ["id" => 3, "nome" => "Borracha", "quantidade" => -10, "preco" => 1.0], 
    ["id" => 4, "nome" => "Lápis", "quantidade" => 80, "preco" => 3.0]
];

function calcularValorTotal($item) {
    return $item["quantidade"] * $item["preco"]; 
}

function calcularMediaPreco($itens) {
    $soma = 0;
    for ($i = 0; $i < count($itens); $i++) {
        $soma += $itens[$i]["preco"];
    }
    return $soma / count($itens);
}

function gerarRelatorio($estoque) {
    echo "=== RELATÓRIO DE ESTOQUE ===\n";
    foreach ($estoque as $item) {
        $valorTotal = calcularValorTotal($item);
        echo "{$item['nome']} | Qtd: {$item['quantidade']} | Total: R$ $valorTotal\n";
        if ($item["quantidade"] < 0) echo " 5 Estoque negativo detectado!\n";
    }
    echo "Média de preços: " . calcularMediaPreco($estoque) . "\n";
}

function atualizarProduto($id, $novoPreco) {
    global $estoque;
    foreach ($estoque as &$item) {
        if ($item["id"] == $id) {
            $item["preco"] = $novoPreco;
            echo "Produto ID $id atualizado para R$ $novoPreco\n";
            return;
        }
    }
    echo "Produto com ID $id não encontrado.\n";
}

function buscarProduto($nome) {
    $nomeSeguro = addslashes($nome); 
    $sql = "SELECT * FROM produtos WHERE nome = '$nomeSeguro'";
    echo "Executando: ";

    
}

function salvarBackup($estoque) {
    $arquivo = fopen("backup.txt", "w");
    foreach ($estoque as $item) {
        fwrite($arquivo, implode(",", $item) . "\n");
    }
    fclose($arquivo);
    echo "Backup salvo!\n";
}



gerarRelatorio($estoque);
atualizarProduto(2, 15.0);
buscarProduto($_GET["produto"] ?? "Caneta");
salvarBackup($estoque);
