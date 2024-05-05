<?php 

    session_start();

    if (!isset($_SESSION['autenticacao']) || $_SESSION['autenticacao'] == false) {
        header('Location: ../../Public/php/index.php');
    }

    class Logoff {

        public function __construct() {
            unset ($_SESSION['autenticacao']);
            header('Location: ../../Public/php/index.php');
        }

    }

    $logoff = new Logoff();

?>