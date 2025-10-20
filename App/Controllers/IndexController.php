<?php
require "..config/Conexao.php";
require "..models/Usuario.php";

class IndexController{

    public $usuario;

    public function __construct()
    {
        $db = new Conexao();
        $pdo = $db->conectar();
        $this->usuario = new Usuarios($pdo);
    }

    public function index(){

    }

    public function verificar($email,$senha){
        $dadosUsuario = $this->usuario->getUsuarios($email);

        if(empty($dadosUsuario->id)){
            echo "<script> mensagem('Usuário Inválido','index','error');</script>";
        } else if(!password_hash($senha, $dadosUsuario->senha)){
            echo "<script> mensagem('Usuário Inválido','index','error');</script>";
        } else {
            $_SESSION["oasis"] = array("id"=>$dadosUsuario->id,"nome"=>$dadosUsuario->nome);
            echo "<script>location.href='index'</script>";
        }
    }

}


?>