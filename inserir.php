<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// CONFIGURAÇÃO DO ALWAYS DATA
$host = "mysql-tarsisluis.alwaysdata.net"; 
$usuario = "445225";                
$senha = "hJuMgcv9._ZXNDq";                 
$banco = "tarsisluis_raking_db";            

try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
} catch (Exception $e) {
    echo json_encode(["erro" => "Erro conexão: " . $e->getMessage()]);
    exit;
}

$nome = $_POST["nome"] ?? null;
$pontos = $_POST["pontuacao"] ?? null;

if (!$nome || !$pontos) {
    echo json_encode(["erro" => "Dados incompletos"]);
    exit;
}

$nome = substr(strip_tags($nome), 0, 20);
$pontos = intval($pontos);

$stmt = $pdo->prepare("INSERT INTO ranking (nome, pontuacao) VALUES (?, ?)");
$stmt->execute([$nome, $pontos]);

echo json_encode(["status" => "ok"]);
?>

