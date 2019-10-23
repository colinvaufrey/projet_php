<?php
    class CartItem{
        public $username;
        public $refProduct;
        public $quantity;
        function __construct(int $refProduct, string $username){
            $this->username = $username;
            $this->refProduct = $refProduct;
        }
    }
?>