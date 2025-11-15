<?php
    require "../Config/Conexao.php";
    require "../Model/Doce.php";

    class DoceController {

        private $doce;

        public function __construct()
        {
            $db = new Conexao();
            $pdo = $db->conectar();
            $this->doce = new Doce($pdo);
        }

         public function index($id) {
            require "../View/Doce/index.php";
        }

        public function excluir($id) {
            require "../View/Doce/excluir.php";
        }

        public function salvar() {
            require "../View/Doce/salvar.php";
        }

        public function listar() {
            require "../View/Doce/listar.php";
        }
    }