<?php 

class Upload_content {

    public $result;

    function __construct($searched_data, $data_location) {
        $this->result = "SELECT $searched_data FROM $data_location";
    }

    function get_result() {
        require_once("Connect-path.php");

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->result;
    }
    catch(PDOException $e) {
        echo "Connected failed: ".$e->getMessage();
    }
        
    }

}

class Site_functions {

    function table_exists(&$db, $table) {
        $result = $db->query("SHOW TABLES LIKE '{$table}'");
        if( $result->num_rows == 1 ) {
            return TRUE;
        }
        else {
            return FALSE;
        }
        $result->free();
    }
}






define ('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://localhost/Nat_Lub_Site/');