<?php

class Imovel {

    private $pdo;
    private $tabela = "imoveis"; // nome da tabela

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function editar($id) {
        $sql = "SELECT * FROM {$this->tabela} WHERE id_imoveis = :id LIMIT 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id", $id, PDO::PARAM_INT);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function listar() {
        $sql = "SELECT * FROM {$this->tabela} ORDER BY titulo";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    
    public function salvar() {
        $campos = [
            'titulo', 'descricao', 'endereco_completo', 'cidade', 
            'preco_diario', 'nm_quartos', 'nm_banheiros', 'max_hospedes', 
            'nome_foto', 'comodidades', 'locador_id',
            'destaque'
        ];

        if (empty($_POST["id_imoveis"])) {
            // novo imovel
            
            $colunas = implode(", ", $campos);
            $binds = ":" . implode(", :", $campos);
            
            // CORREÇÃO CRÍTICA: Removido 'id_imoveis' e 'NULL'
            $sql = "INSERT INTO {$this->tabela} ({$colunas}) 
                    VALUES ({$binds})";
            
            $consulta = $this->pdo->prepare($sql);
            
            foreach ($campos as $campo) {
                $consulta->bindParam(":$campo", $_POST[$campo]);
            }

        } else {
            // atualiza a tabela
            $set_sql = [];
            foreach ($campos as $campo) {
                $set_sql[] = "{$campo} = :{$campo}";
            }
            $set_clause = implode(", ", $set_sql);

            $sql = "UPDATE {$this->tabela} SET {$set_clause} 
                    WHERE id_imoveis = :id_imoveis LIMIT 1";

            $consulta = $this->pdo->prepare($sql);

            foreach ($campos as $campo) {
                $consulta->bindParam(":$campo", $_POST[$campo]);
            }
            $consulta->bindParam(":id_imoveis", $_POST["id_imoveis"], PDO::PARAM_INT);
        }

    }

    public function excluir($id) {
        $sql = "DELETE FROM {$this->tabela} WHERE id_imoveis = :id LIMIT 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id", $id, PDO::PARAM_INT);

        return $consulta->execute();
    }
}