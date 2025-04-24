<?php 
    define('WEB_ROOT',dirname(__FILE__,2));
    define("DOMAINS", "http://localhost/mvcphp/web/");
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_DATABASE','databasemvc');
    
    if (!function_exists('connectDB')) {
        function connectDB(){
            try {
                $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            return $conn;
       }
    }
 

?>