<?php
    require "../Config/Conexao.php";
    require "../Model/Categoria.php";

    class CategoriaController {

        private $categoria;

        public function __construct()
        {
            $db = new Conexao();
            $pdo = $db->conectar();
            $this->categoria = new Categoria($pdo);
        }

        public function index($id) {
            require "../View/Categoria/index.php";
        }

        public function excluir($id) {
            require "../View/Categoria/excluir.php";
        }

        public function salvar() {
            require "../View/Categoria/salvar.php";
        }

        public function listar() {
            require "../View/Categoria/listar.php";
        }

    }