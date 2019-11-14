<?php
    class CartItem {
        public $refProduct;
        public $quantity;
        function __construct() {
        }

        public function getRef() {
            return $this->refProduct;
        }

        public function getQuantity() {
            return $this->quantity;
        }
    }
?>
