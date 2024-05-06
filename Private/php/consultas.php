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
            $_SESSION['nomeEncontrado'] = false;
            $this->verificaDuplicidade();
            $query = 'insert into tb_funcionario(nome,cargo)values(:nome,:cargo)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->dadosCadastrar->__get('nome'));
            $stmt->bindValue(':cargo', $this->dadosCadastrar->__get('cargo'));
            $stmt->execute();
            $_SESSION['dadoscadastrados'] = true;
            $_SESSION['retornocadastro'] = 'Dados cadastrados com sucesso';
            header('Location: ../../Public/php/main.php');
        }

        public function verificaDuplicidade() {
            $query = 'select nome from tb_funcionario';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($lista as $key => $value) {
                
                $nomeCadastro = $value['nome'];

                if ($nomeCadastro == $_POST['nome']) {
                    $_SESSION['nomeEncontrado'] = true;
                }

            }

            if ($_SESSION['nomeEncontrado'] = true) {
                $_SESSION['dadoscadastrados'] = true;
                $_SESSION['retornocadastro'] = 'Dados já foram cadastrados';
                header('Location: ../../Public/php/main.php');    
            }
    
        }

    }


?>