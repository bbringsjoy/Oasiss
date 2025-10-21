<?php

use App\Model\Imoveis;

    require "../Config/Conexao.php";
    require "../Model/Imoveis.php";

    class ImoveisController{

        private $imovel;

        public function __construct()
        {
            $db = new Conexao();
            $pdo = $db->conectar();
            //$this->imovel = new Imoveis($pdo);
            //auteracao para que nao afete o doctrine
        }

        public function index($id){
            //form de cadastro e edicao
            require "..View/LoginAdm/index.php";
        }

        public function salvar(){
            
        }

        public function excluir($id){

        }

        public function listar(){

        }
    }
?>