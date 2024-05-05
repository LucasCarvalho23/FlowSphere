<?php 

    session_start();

    if (!isset($_SESSION['autenticacao']) || $_SESSION['autenticacao'] == false) {
        header('Location: ../../Public/php/index.php');
    }


    class Conexao {

        private $host = 'localhost';
        private $dbname = 'db_crud';
        private $user = 'root';
        private $password = '';

        public function conection() {
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname", 
                "$this->user",
                "$this->password"
            );
            return $conexao;
        }

    }

?>