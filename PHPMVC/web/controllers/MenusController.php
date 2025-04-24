<?php 
    require_once WEB_ROOT . '/services/MenusService.php';
    
    class MenusController{
        public function index(){
            $MenusService = new MenusService();
            $getMenus = $MenusService->getallMenus();
            include WEB_ROOT . '/views/layout/header.php';
        }
        
    }   

?>