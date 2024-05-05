<?php 

    session_start();

    if (!isset($_SESSION['autenticacao']) || $_SESSION['autenticacao'] == false) {
        header('Location: ../../Public/php/index.php');
    }

    class Login {

        private $login = 'lucas';
        private $password = '123';

        public function testLogin() {
            if ($this->login == $_POST['login'] && $this->password == $_POST['password']) {
                $_SESSION['autenticacao'] = true;
                header('Location: ../../Public/php/main.php');
            } else {
                $_SESSION['autenticacao'] = false;
                header('Location: ../../Public/php/index.php');
            }
        }

    }

    $login = new Login;
    echo $login->testLogin();

?>