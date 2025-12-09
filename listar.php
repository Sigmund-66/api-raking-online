<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// CONFIGURAÇÃO DO ALWAYS DATA
$host = "mysql-tarsisluis.alwaysdata.net"; 
$usuario = "445225";                
$senha = "hJuMgcv9._ZXNDq";                 
$banco = "tarsisluis_raking_db";            

$pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);

$stmt = $pdo->query("SELECT * FROM ranking ORDER BY pontuacao DESC LIMIT 50");
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($dados);
?>

