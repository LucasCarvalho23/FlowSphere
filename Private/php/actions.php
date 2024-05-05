<?php 

/*
    echo ("<pre>");
    print_r ($_POST);
    echo ("</pre>");
    echo ("<hr>");
    echo ("<pre>");
    print_r ($_GET);
    echo ("</pre>");
*/

    require './dados.php';
    require './conexao.php';
    require './consultas.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['autenticacao']) || $_SESSION['autenticacao'] == false) {
        header('Location: ../../Public/php/index.php');
    }


    class Actions {

        public function __construct() {
            if (isset($_GET['create'])) {
                $this->createFunction();
            } else if (isset($_GET['read'])) {
                $this->readFunction();
            } else if (isset($_GET['update'])) {
                $this->updateFunction();
            } else if (isset($_GET['delete'])) {
                $this->deleteFunction();
            }
        }

        public function createFunction() {

            $conexao = new Conexao();
            
            $dadosCadastrar = new DadosCadastrar();
            $dadosCadastrar->__set("nome", $_POST['nome']);
            $dadosCadastrar->__set("cargo", $_POST['cargo']);
            
            $consultas = new Consultas($conexao, $dadosCadastrar);
            $consultas->create();

        }

        public function readFunction() {
            $_SESSION['read'] = true;
            header('Location: ../../Public/php/listarFuncionarios.php');
        }

        public function updateFunction() {
            echo "Função read funcionando";
        }

        public function deleteFunction() {
            echo "Função read funcionando";
        }

    }


    $actions = new Actions();

?>