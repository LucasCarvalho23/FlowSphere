<?php 

    class DadosCadastrar {

        private $id;
        private $nome;
        private $cargo;

        public function __get($attr) {
            return $this->$attr;
        }

        public function __set($attr, $value) {
            $this->$attr = $value;
        }

    }

?>