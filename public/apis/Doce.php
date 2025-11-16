<?php
    header("Content-Type: application/json");

    $id = $_GET['id'] ?? null;
    $categoria = $_GET['categoria'] ?? null;

    require "../../Config/Conexao.php";

    $db = new Conexao();
    $pdo = $db->conectar();


    if(!empty($categoria)) {
        //doces de uma categoria específica
        $sql = "select * from doce where ativo = 'S' and categoria_id = :categoria order by nome";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':categoria', $categoria);
        $consulta->execute();

        $dadosDoce = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } else if(!empty($id)) {
        //doce em específico pelo id
        $sql = "select * from doce where ativo = 'S' and id = :id limit 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();

        $dadosDoce = $consulta->fetch(PDO::FETCH_ASSOC);

    } else {
        //todos os doces
         $sql = "select * from doce where ativo = 'S' order by nome";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();

        $dadosDoce = $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    echo json_encode($dadosDoce);
?>