<?php
header('Content-Type: application/json');

// Receber os dados do JSON
$data = json_decode(file_get_contents('php://input'), true);

// Configurações do banco de dados
$host = 'localhost';
$dbname = 'dashboard_financeiro';
$username = 'root';
$password = '';

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar a query SQL
    $stmt = $pdo->prepare("INSERT INTO financas (mes, valor_recebido, valor_gasto, saldo) VALUES (:mes, :valor_recebido, :valor_gasto, :saldo)");
    
    // Executar a query com os dados
    $stmt->execute([
        ':mes' => $data['mes'],
        ':valor_recebido' => $data['valor_recebido'],
        ':valor_gasto' => $data['valor_gasto'],
        ':saldo' => $data['saldo']
    ]);

    // Retornar sucesso
    echo json_encode(['success' => true, 'message' => 'Dados salvos com sucesso']);

} catch(PDOException $e) {
    // Retornar erro
    echo json_encode(['success' => false, 'message' => 'Erro ao salvar: ' . $e->getMessage()]);
}
?> 