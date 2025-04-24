<?php 
    require_once WEB_ROOT . '/models/Menus.php';
    class MenusService{

        public function getallMenus()
        {

            $connect = connectDB();
            $stmt = $connect->prepare("SELECT * FROM menus");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $kq = $stmt->fetchAll();
            return $kq;

        }

    }



?>