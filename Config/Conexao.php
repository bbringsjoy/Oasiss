<?php

class Conexao {
    // 🔒 Credenciais do Banco de Dados
    private static $host = "localhost";
    private static $usuario = "root";
    private static $banco = "oasis";
    private static $senha = "";

    private static $instancia = null; // Armazena a única instância da conexão

    // 🔒 Construtor e clone privados para forçar o uso do método 'conectar()'
    private function __construct() {}
    private function __clone() {}

    /**
     * Retorna a instância única da conexão PDO.
     * @return PDO
     */
    public static function conectar() {
        // 1. Se a conexão não existe, cria uma nova
        if (!isset(self::$instancia)) {
            try {
                // Configurações PDO para segurança e formato de retorno
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Lança exceções em caso de erro
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retorna dados como array associativo
                    PDO::ATTR_EMULATE_PREPARES => false, // Usa Prepared Statements nativos (mais seguro)
                ];
                
                // 2. Cria e armazena a instância da conexão
                self::$instancia = new PDO(
                    "mysql:host=".self::$host.";dbname=".self::$banco.";charset=utf8",
                    self::$usuario, 
                    self::$senha,
                    $options
                );

            } catch (PDOException $e) {
                // Trata o erro de conexão
                // Em produção, isso deve ser logado, e não exibido diretamente ao usuário.
                die("Erro ao conectar com o banco de dados: {$e->getMessage()}");
            }
        }
        
        // 3. Retorna a instância única (seja ela nova ou já existente)
        return self::$instancia; 
    }
}