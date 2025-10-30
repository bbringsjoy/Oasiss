<?php
    require "../Config/Conexao.php";
    require "../Models/Imoveis.php";

    class ImoveisController{

        private $imovel;

        public function __construct()
        {
            $db = new Conexao();
            $pdo = $db->conectar();
            $this->imovel = new Imovel($pdo);
            
        }

        public function index($id){
            //form de cadastro e edicao
            require "..View/LoginAdm/index.php";
        }

        public function salvar(){
            //pagina q salva produtos
            require "..View/LoginAdm/salvar.php";
        }

        public function excluir($id){

        }

        public function listar(){

        }
    }
?>