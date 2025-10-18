<?php
    require "../Config/Conexao.php";
    require "../models/Usuario.php";

     class IndexController {

        public $usuarios;

        public function __construct()
        {
            $db = new Conexao ();
            $pdo = $db->conectar();
            $this->usuarios = new Usuarios($pdo);
        }
        public function index() {
            require "../View/pages/home.php";
        }

        public function erro() {
            require "../view/pages/erro.php";
        }

        public function verificar($email, $senha){
            $dadosUsuarios = $this->usuarios->getUsuarios($email);

            if (empty($dadosUsuarios->id)) {
                echo "<script>mensagem('Usuário inválido','index','error');</script>";
            } else if (!password_verify($senha, $dadosUsuarios->senha)) {
                 echo "<script>mensagem('Usuário inválido','index','error');</script>";
            } else {
                $_SESSION["oasis"] = array("id"=>$dadosUsuarios->id,
                "nome"=>$dadosUsuarios->nome);
                echo "<script>location.href='index'</script>";
            }
        }
     }
