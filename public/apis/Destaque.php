<?php 
header("Content-Type: application/json");

    require "../../Config/Conexao.php";

    $db = new Conexao();
    $pdo = $db->conectar();

    $sql = "SELECT * FROM doce WHERE ativo = 'S' AND destaque = 'S' ORDER BY nome";
    $consulta = $pdo->prepare($sql);
    $consulta->execute();

    $dadosDestaque = $consulta->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($dadosDestaque);


?>