<?php
    require "../Config/Conexao.php";
    require "../Model/Usuario.php";

    class IndexController {

        private $usuario;

        public function __construct()
        {
            $db = new Conexao();
            $pdo = $db->conectar();
            $this->usuario = new Usuario($pdo);

        }

        public function index() {

            require "../View/Index/home.php";

        }

        public function verificar($email, $senha) {
            $dadosUsuario = $this->usuario->getUsuario($email);// era só dados

            if (empty($dadosUsuario->id)) {
                echo "<script>mensagem('Usuário inválido','index','error');</script>";
            } else if (!password_verify($senha, $dadosUsuario->senha)) {//era só dados
                echo "<script>mensagem('Usuário inválido','index','error');</script>";
            } else {
                $_SESSION["Doce"] = array("id"=>$dadosUsuario//era só dados
                ->id, "nome"=>$dadosUsuario->nome);//mudou dados pra dadosUsuario
                echo "<script>location.href='index'</script>";
                
            }

        }

        public function sair() {

            session_destroy();
            echo "<script>location.href='index';</script>";

        }


    }