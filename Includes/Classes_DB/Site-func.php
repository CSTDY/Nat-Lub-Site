<?php 

class Upload_content {

    private $sql;

    private function No_conditon_query($data_location) {
        $this->sql = "SELECT * FROM $data_location";
    } 

    //O-sobie.php
    private $checker_O_sobie; //bool function, check if O_sobie(x) function is called
    
    function O_sobie($location) {
        $this->checker_O_sobie = true;
        $this->No_conditon_query($location);
    }
    private function O_sobie_OUT($result) {
        echo "<h3>".$result['header']."</h3>";
        echo "<p>".$result['tekst']."</p>";
    }
    //Usługi.php
    private $checker_Uslugi; //bool function, check if Uslugi(x) function is called
    function Uslugi($location) {
        $this->checker_Uslugi = true;
        $this->No_conditon_query($location);
    }

    private function Uslugi_OUT($result) {
        echo "<h3>".$result['section']."</h3>";
        echo "<h4>".$result['subsection']."</h4>";
        echo "<p>*".$result['content'].": ".$result['price']."</p>";
    }
    //Results
    function get_result() {
        require_once("Connect-path.php");

        try {
            $conn = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_password);
            //polish characters
            $conn -> query ('SET NAMES utf8');
            $conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
            //
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($this->sql);
            $stmt->execute();
            //O-sobie.php
            $result = $stmt->fetch();
            if($this->checker_O_sobie) {
                $this->checker_O_sobie = false;
                $this->O_sobie_OUT($result);
            }

            //Usługi.php
            if($this->checker_Uslugi) {
                $this->checker_Uslugi = false;
                $this->Uslugi_OUT($result);
            }
        }
        catch(PDOException $e) {
            echo "Connected failed: ".$e->getMessage();
        }
        
    }

}

define ('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://localhost/Nat_Lub_Site/');