<?php
    require "../Config/Conexao.php";
    require "../Models/Usuario.php";

    class UsuariosController {

        private $usuario;

        public function __construct()
        {
            $db = new Conexao();
            $pdo = $db->conectar();
            $this->usuario = new Usuarios($pdo);
        }

        public function index($id) {
            require "../View/Usuarios/cadastro.php";
        }

        public function excluir($id) {
            require "../View/Usuarios/excluir.php";
        }

        public function salvar() {
            require "../View/Usuarios/salvar.php";
        }

        public function listar() {
            require "../View/Usuarios/listarUsuarios.php";
        }

    }



?>