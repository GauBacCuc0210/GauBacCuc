<?php 
    require_once WEB_ROOT . '/models/Position.php';
    class PositionService{

        public function getallPosition()
        {

            $connect = connectDB();
            $stmt = $connect->prepare("SELECT * FROM position");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $kq = $stmt->fetchAll();
            return $kq;

        }

    }



?>