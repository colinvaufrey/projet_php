<?php
    class Products{
        public $ref;
        public $title;
        public $img;
        public $description;
        public $prix;
        public $color;
        public $origin;
        function __construct(){
            $this->ref = intval($this->ref);
        }
    }
?>