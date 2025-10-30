<?php

class Imovel {

    private $pdo;
    private $tabela = "imoveis"; // Nome da tabela no banco

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Busca um único imóvel pelo seu ID.
     * @param int $id
     * @return object|false
     */
    public function editar($id) {
        $sql = "SELECT * FROM {$this->tabela} WHERE id_imoveis = :id LIMIT 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id", $id, PDO::PARAM_INT);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Lista todos os imóveis ordenados por título.
     * @return array
     */
    public function listar() {
        $sql = "SELECT * FROM {$this->tabela} ORDER BY titulo";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    /*
     * Mantenha a função de listarCategoria se você ainda precisar da tabela 'categoria'.
     * Se não precisar, você pode remover este método.
     */
    public function listarLocadores() {
        $sql = "SELECT * FROM locador ORDER BY nome"; // Assumindo uma tabela 'locador'
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Salva (Insere ou Atualiza) um imóvel.
     * Assume que os dados vêm de um array/POST.
     * @return bool
     */
    public function salvar() {
        // Campos que serão inseridos/atualizados
        $campos = [
            'titulo', 'descricao', 'endereco_completo', 'cidade', 
            'preco_diario', 'nm_quartos', 'nm_banheiros', 'max_hospedes', 
            'nome_foto', 'comodidades', 'locador_id'
        ];

        if (empty($_POST["id_imoveis"])) {
            // insert
            $colunas = implode(", ", $campos);
            $binds = ":" . implode(", :", $campos);
            
            $sql = "INSERT INTO {$this->tabela} (id_imoveis, {$colunas}) 
                    VALUES (NULL, {$binds})";
            
            $consulta = $this->pdo->prepare($sql);
            
            foreach ($campos as $campo) {
                $consulta->bindParam(":$campo", $_POST[$campo]);
            }

        } else {
            //atualizar
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

        return $consulta->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM {$this->tabela} WHERE id_imoveis = :id LIMIT 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id", $id, PDO::PARAM_INT);

        return $consulta->execute();
    }
}