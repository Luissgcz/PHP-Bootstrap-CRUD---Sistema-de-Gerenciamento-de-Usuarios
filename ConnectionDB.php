<?php

class ConnectionDB {
    public string $dbname;
    public string $user;
    public int $port;
    public string $host;
    public string $password;
    public object $statusConnection;

    public function __construct() {
        // Carregar as variáveis do arquivo .env
        $this->loadEnv(__DIR__ . '/.env');

        // Atribuindo os valores das variáveis para a classe
        $this->dbname = getenv('DB_NAME'); 
        $this->user = getenv('DB_USER');
        $this->host = getenv('DB_HOST');
        $this->port = (int) getenv('DB_PORT');
        $this->password = getenv('DB_PASS');
    }
    
    //Função que faz o Tramit pra puxar os valores do .env sem o composer
    private function loadEnv($file) {
        if (file_exists($file)) {
            $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos($line, '=') !== false) {
                    list($key, $value) = explode('=', $line, 2);
                    putenv(trim($key) . '=' . trim($value));
                }
            }
        }
    }

    public function getConnection(){
        try {
            $this->statusConnection = new PDO(
                "pgsql:dbname=$this->dbname;host=$this->host;port=$this->port",
                $this->user,
                $this->password
            );
            return $this->statusConnection;
            
        } catch (Exception $err) {
            echo "Erro ao Se Conectar: " . $err->getMessage();
            var_dump($err);
            throw new Exception("Falha na conexão com o banco de dados.");
        }
    }
}