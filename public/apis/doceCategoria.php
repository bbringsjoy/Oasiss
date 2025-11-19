<?php
header("Content-Type: application/json");

require "../../Config/Conexao.php";

$db = new Conexao();
$pdo = $db->conectar();

$id = $_GET["id"] ?? 0;

$sql = $pdo->prepare("SELECT * FROM doce WHERE categoria_id = ? AND ativo = 'S'");
$sql->execute([$id]);

echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
