<?php
    header("Content-Type: application/json");

    require "../../Config/Conexao.php";

    $db = new Conexao();
    $pdo = $db->conectar();

    $id = $_GET['id'] ?? null;

    $sql = "SELECT * FROM imoveis WHERE id_imoveis = order by titulo";


?>