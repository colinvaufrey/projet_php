<?php
    class Cart{
        public $ref;
        public $refProduct;
        public $quantity;
        function __construct(){
            $this->ref = intval($this->ref);
        }
    }
?>