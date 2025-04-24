<?php 
    require_once WEB_ROOT . '/services/PositionService.php';
    class PositionController{
        public function index(){


            include WEB_ROOT . '/views/positionpage/index.php';
        }
        
    }   

?>