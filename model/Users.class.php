<?php
    class Users {
        public $username;
        public $password;
        public $myCart;
        function __construct() {
        }

        public function getUsername() {
            return $this->username;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getCart() {
            return $this->myCart;
        }
    }
?>
