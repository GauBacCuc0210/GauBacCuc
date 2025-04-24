<?php 
    require_once WEB_ROOT . '/models/Header.php';
    class HeaderService{

        public function getallHeader()
        {

            $connect = connectDB();
            $stmt = $connect->prepare("SELECT * FROM header");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $kq = $stmt->fetchAll();
            return $kq;

        }

    }



?>