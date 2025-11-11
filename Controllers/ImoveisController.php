// ImoveisController.php Original
<?php
    require "../Config/Conexao.php";
    require "../models/Imoveis.php";

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
            require "../View/LoginAdm/pages/painel.php";
        }

        public function salvar(){
            //pagina q salva produtos
            require "../View/LoginAdm/pages/salvar.php";
        }

        public function excluir($id){
            // Lógica de exclusão aqui
        }

        public function listar(){
            // 1. CHAMA A LÓGICA DO MODEL
            $imoveis = $this->imovel->listar(); 
            
            // 2. CARREGA A VIEW, disponibilizando a variável $imoveis
            require "../View/LoginAdm/pages/listar.php";
        }
    }
?>