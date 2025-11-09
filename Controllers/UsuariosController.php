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
            require "../View/Overview/pages/cadastro.php";
        }

        public function excluir($id) {
            require "../views/usuario/excluir.php";
        }

        public function salvar() {
            require "../View/Overview/pages/salvar.php";
        }

        public function listar() {
            require "../views/usuario/listar.php";
        }

        //alterar nome das pastas e organizar os views
    }



?>