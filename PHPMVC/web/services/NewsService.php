<?php 

require_once WEB_ROOT . '/models/News.php';
    class NewsService {
        public function getallnews(){
            $connect = connectDB();
            $stmt = $connect->prepare("SELECT * FROM news");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $kq = $stmt->fetchAll();
            return $kq;
        }
    }



?>