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
        // Incluindo a tabela 'locadores' e 'usuarios' para trazer o nome do locador
        $sql = "
            SELECT 
                i.*, 
                l.cpf AS locador_cpf,
                u.nome_completo AS nome_locador -- Assumindo que o nome está na tabela 'usuarios'
            FROM 
                {$this->tabela} i
            JOIN 
                locadores l ON i.locador_id = l.id_locadores
            JOIN
                usuarios u ON l.usuario_id = u.id_usuarios
            ORDER BY 
                i.titulo
        ";
        
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    
    public function salvar() {
        $campos = [
            'titulo', 'descricao', 'endereco_completo', 'cidade', 
            'preco_diario', 'nome_foto', 'locador_id',
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
            return $consulta->execute();
        }
    }

    public function excluir($id) {
        $sql = "DELETE FROM {$this->tabela} WHERE id_imoveis = :id LIMIT 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id", $id, PDO::PARAM_INT);

        return $consulta->execute();
    }
}