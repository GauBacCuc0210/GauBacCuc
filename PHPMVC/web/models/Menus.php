<?php 
    class Menus{
        private $id;
        private $name;
        private $links;

        public function __construct( $id, $name, $links){
            $this->id = $id;
            $this->name = $name;
            $this->links = $links;
        }
        public function getName(){
            return $this->name;
        }
        public function setName($name){
           $this->name = $name;
        }
        public function getLinks(){
            return $this->links;
        }

        public function setLinks($links){
            $this->links = $links;
        }

    }


?>