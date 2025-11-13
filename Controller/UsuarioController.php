<?php
    require "../Config/Conexao.php";
    require "../Model/Usuario.php";

    class UsuarioController {

        private $usuario;

        public function __construct()
        {
            $db = new Conexao();
            $pdo = $db->conectar();
            $this->usuario = new Usuario($pdo);
        }

        public function index($id) {
            require "../View/Usuario/index.php";
        }

        public function excluir($id) {
            require "../View/Usuario/excluir.php";
        }

        public function salvar() {
            require "../View/Usuario/salvar.php";
        }

        public function listar() {
            require "../View/Usuario/listar.php";
        }
    }