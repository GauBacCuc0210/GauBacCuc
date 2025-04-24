<?php 
    require_once WEB_ROOT .'/models/Submenus.php';
    class SubmenusService {
        public function getallsubmenus(){
            $connect = connectDB();
            $stmt = $connect->prepare("
                SELECT m.id AS menu_id, m.name AS menu_name, m.links AS menu_link, 
                    s.id AS submenu_id, s.name AS submenu_name, s.link AS submenu_link
                FROM menus m
                LEFT JOIN submenus s ON m.id = s.menu_id
            ");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $kq = $stmt->fetchAll();
            return $kq;
        }
    }


?>