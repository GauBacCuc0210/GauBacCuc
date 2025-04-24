<?php 
    require_once WEB_ROOT . '/services/SubmenusService.php';
    include WEB_ROOT . '/services/MenusService.php';
    class SubmenusController{
        public function index(){
            $MenusService = new MenusService();
            $getMenus = $MenusService->getallMenus();
            $submenusService = new SubmenusService();
            $getsubMenus = $submenusService->getallsubmenus();
            $menuWithSubmenus=[];
            foreach ($getsubMenus as $row) {
                $menu_id = $row['menu_id'];
                if (!isset($menuWithSubmenus[$menu_id])) {
                    $menuWithSubmenus[$menu_id] = [
                        'name' => $row['menu_name'],
                        'link' => $row['menu_link'],
                        'submenus' => []
                    ];
                }
                if ($row['submenu_id']) {
                    $menuWithSubmenus[$menu_id]['submenus'][] = [
                        'name' => $row['submenu_name'],
                        'link' => $row['submenu_link']
                    ];
                }
            }
        
            include WEB_ROOT . '/views/layout/header.php';
        }
        
    }   

?>