<?php
class Usuarios  {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUsuarios($email) {
        $sql = "select id,nome,ativo from usuario where email = :email limit 1";
        $consulta  = $this->pdo->prepare($sql);
        $consulta->bindParam(":email", $email);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function editar($id) {
            $sql = "select * from usuario where id = :id limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":id", $id);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_OBJ);
        }

        public function listar() {
            $sql = "select * from usuario order by nome";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }

        public function salvar() {
            
            if (!empty($_POST["senha"])) $_POST["senha"] = password_hash($_POST["senha"], PASSWORD_DEFAULT);

            if (empty($_POST["id"])) {
                $sql = "insert into usuario (id, nome_completo, email, senha, tipo_perfil, data_cadastro) 
                values (NULL, :nome_completo, :email, :senha, :tipo_perfil, :data_cadastro)";
                $consulta = $this->pdo->prepare($sql);
                $consulta->bindParam(":nome_completo", $_POST["nome_completo"]);
                $consulta->bindParam(":email", $_POST["email"]);
                $consulta->bindParam(":senha", $_POST["senha"]);
                $consulta->bindParam(":tipo_perfil", $_POST["tipo_perfil"]);
                $consulta->bindParam(":data_cadastro", $_POST["data_cadastro"]);

            } else if (empty($_POST["senha"])) {
                $sql = "update usuario set nome_completo = :nome_completo, email = :email, tipo_perfil = :tipo_perfil, data_cadastro = :data_cadastro where id = :id limit 1";
                $consulta = $this->pdo->prepare($sql);
                $consulta->bindParam(":nome_completo", $_POST["nome_completo"]);
                $consulta->bindParam(":email", $_POST["email"]);
                $consulta->bindParam(":tipo_perfil", $_POST["tipo_perfil"]);
                $consulta->bindParam(":id", $_POST["id"]);
                $consulta->bindParam(":data_cadastro", $_POST["data_cadastro"]);

            } else {
                $sql = "update usuario set senha = :senha, nome_completo = :nome_completo, email = :email, tipo_perfil = :tipo_perfil, data_cadastro = :data_cadastro where id = :id limit 1";
                $consulta = $this->pdo->prepare($sql);
                $consulta->bindParam(":nome_completo", $_POST["nome_completo"]);
                $consulta->bindParam(":email", $_POST["email"]);
                $consulta->bindParam(":senha", $_POST["senha"]);
                $consulta->bindParam(":tipo_perfil", $_POST["tipo_perfil"]);
                $consulta->bindParam(":id", $_POST["id"]);
                $consulta->bindParam(":data_cadastro", $_POST["data_cadastro"]);
            }

            return $consulta->execute();
        }

       public function excluir($id) {
    // deleta permanentemente
    $sql = "DELETE FROM usuario WHERE id = :id LIMIT 1";
    $consulta = $this->pdo->prepare($sql);
    $consulta->bindParam(":id", $id, PDO::PARAM_INT); 
    
    return $consulta->execute();
        }

        public function getLogin($email) {

            $sql = "select id, nome_completo, senha, data_cadastro from usuario where email = :email = limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":email", $email);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_OBJ);
        }
    
}