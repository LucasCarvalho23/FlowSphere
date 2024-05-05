<?php 

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['autenticacao']) || $_SESSION['autenticacao'] == false) {
        header('Location: ../../Public/php/index.php');
    }


    class Consultas {

        private $conexao;
        private $dadosCadastrar;

        public function __construct(Conexao $conexao, DadosCadastrar $dadosCadastrar) {
            $this->conexao = $conexao->conection();
            $this->dadosCadastrar = $dadosCadastrar;
        }

        public function create() {
            $query = 'insert into tb_funcionario(nome,cargo)values(:nome,:cargo)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->dadosCadastrar->__get('nome'));
            $stmt->bindValue(':cargo', $this->dadosCadastrar->__get('cargo'));
            $stmt->execute();
            $_SESSION['dadoscadastrados'] = true;
            header('Location: ../../Public/php/main.php');
        }

    }


?>