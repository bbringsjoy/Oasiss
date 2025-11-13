<?php
    require "../Config/Conexao.php";
    require "../Model/Doces.php";

    class ProdutoController {

        private $produto;

        public function __construct()
        {
            $db = new Conexao();
            $pdo = $db->conectar();
            $this->produto = new Produto($pdo);
        }

         public function index($id) {
            require "../View/Doces/index.php";
        }

        public function excluir($id) {
            require "../View/Doces/excluir.php";
        }

        public function salvar() {
            require "../View/Doces/salvar.php";
        }

        public function listar() {
            require "../View/Doces/listar.php";
        }
    }