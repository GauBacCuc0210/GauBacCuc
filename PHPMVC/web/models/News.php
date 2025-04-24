<?php 
    class News{
        private $id;
        private $title;
        private $summary;
        private $content;

        public function __construct( $id, $title, $summary, $content){
            $this->id = $id;
            $this->title = $title;
            $this->summary = $summary;
            $this->content = $content;
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getTitle(){
            return $this->title;
        }
        public function setTitle($title){
            $this->title = $title;
        }
        public function getSummary(){
            return $this->summary;
        }
        public function setSummary($summary){
            $this->summary = $summary;
        }
        public function getContent(){
            return $this->content;
        }
        public function setContent($content){
            $this->content = $content;
        }

    }



?>