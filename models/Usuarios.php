<?php
class Usuarios {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    

    public function getUsuarios($email) {
        $sql = "SELECT id_usuarios, nome_completo, tipo_perfil FROM usuarios WHERE email = :email LIMIT 1";
        $consulta  = $this->pdo->prepare($sql);
        $consulta->bindParam(":email", $email);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }


    public function editar($id) {
        $sql = "SELECT * FROM usuarios WHERE id_usuarios = :id LIMIT 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id", $id);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function listar() {
        $sql = "SELECT * FROM usuarios ORDER BY nome_completo";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }


    public function salvar() {
        

        if (!empty($_POST["senha"])) {
             $_POST["senha"] = password_hash($_POST["senha"], PASSWORD_DEFAULT);
        }

        if (empty($_POST["id_usuarios"])) {
            //post da data do cadastro, só acontece no insert
            $_POST["data_cadastro"] = date("Y-m-d H:i:s");
            
            $sql = "INSERT INTO usuarios (id_usuarios, nome_completo, email, senha, tipo_perfil, data_cadastro) 
                    VALUES (NULL, :nome_completo, :email, :senha, :tipo_perfil, :data_cadastro)";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":nome_completo", $_POST["nome_completo"]);
            $consulta->bindParam(":email", $_POST["email"]);
            $consulta->bindParam(":senha", $_POST["senha"]);
            $consulta->bindParam(":tipo_perfil", $_POST["tipo_perfil"]);
            $consulta->bindParam(":data_cadastro", $_POST["data_cadastro"]);

        } else if (empty($_POST["senha"])) {
            $sql = "UPDATE usuarios SET nome_completo = :nome_completo, email = :email, tipo_perfil = :tipo_perfil 
                    WHERE id_usuarios = :id_usuarios LIMIT 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":nome_completo", $_POST["nome_completo"]);
            $consulta->bindParam(":email", $_POST["email"]);
            $consulta->bindParam(":tipo_perfil", $_POST["tipo_perfil"]);
            $consulta->bindParam(":id_usuarios", $_POST["id_usuarios"]);

        } else {
            $sql = "UPDATE usuarios SET senha = :senha, nome_completo = :nome_completo, email = :email, tipo_perfil = :tipo_perfil 
                    WHERE id_usuarios = :id_usuarios LIMIT 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":nome_completo", $_POST["nome_completo"]);
            $consulta->bindParam(":email", $_POST["email"]);
            $consulta->bindParam(":senha", $_POST["senha"]);
            $consulta->bindParam(":tipo_perfil", $_POST["tipo_perfil"]);
            $consulta->bindParam(":id_usuarios", $_POST["id_usuarios"]);
        }

        
        return $consulta->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM usuarios WHERE id_usuarios = :id LIMIT 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id", $id, PDO::PARAM_INT); 
        
        return $consulta->execute();
    }

    public function getLogin($email) {
        $sql = "SELECT id_usuarios, nome_completo, senha, tipo_perfil FROM usuarios WHERE email = :email LIMIT 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":email", $email);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }
}