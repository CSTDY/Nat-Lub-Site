<?php

class Site_functions {

private $sql;
private $sql_col_names;
// bool values witch checks witch section is used
private $Checker_Uslugi = false;
private $Checker_Prace = false;
private $Checker_O_sobie = false;
private $Checker_Glowna = false;

private function table_exists(&$db, $table) {
    $result = $db->query("SHOW TABLES LIKE '{$table}'");
    if( $result->num_rows == 1 ) {
        return TRUE;
    }
    else {
        return FALSE;
    }
    $result->free();

}

//Uslugi

function Get_columns_names($table_name, $Section_name) {
    if($Section_name == "Uslugi") {
        $this->Checker_Uslugi = true;
    }
    if($Section_name == "Prace") {
        $this->Checker_Prace = true;
    }
    if($Section_name == "O_sobie") {
        $this->Checker_O_sobie = true;
    }
    if($Section_name == "Glowna") {
        $this->Checker_Glowna = true;
    }
    $this->sql_col_names = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' ORDER BY ORDINAL_POSITION";
    $this->sql = "SELECT * FROM $table_name";
}

private function Draw_table($Column_names, $Column_values) {
    echo "<table style='border: solid 1px black;'>";
    foreach(new TableColumnNames(new RecursiveArrayIterator($Column_names->fetchAll())) as $k=>$v) {
        echo $v;
    }
    
    foreach(new TableRows(new RecursiveArrayIterator($Column_values->fetchAll())) as $k=>$v) {
        echo $v;
    }
    
    echo "</table>";
}


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
        
        $stmt_col_names = $conn->prepare($this->sql_col_names);

        $stmt_col_names->execute();
        //DRAW TABLES

        //Uslugi
        if($this->Checker_Uslugi) {
            $this->Checker_Uslugi = false;
            $result_col = $stmt_col_names->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $this->Draw_table($stmt_col_names, $stmt);
        }

        //Prace
        if($this->Checker_Prace) {
            $this->Checker_Prace = false;
            $result_col = $stmt_col_names->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $this->Draw_table($stmt_col_names, $stmt);
        }

        //O sobie
        if($this->Checker_O_sobie) {
            $this->Checker_O_sobie = false;
            $result_col = $stmt_col_names->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $this->Draw_table($stmt_col_names, $stmt);
        }

        //Główna
        if($this->Checker_Glowna) {
            $this->Checker_Glowna = false;
            $result_col = $stmt_col_names->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $this->Draw_table($stmt_col_names, $stmt);
        }

        //
    }
    catch(Exception $e) {
        echo "Connected failed: ".$e->getMessage();
    }
}
}

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

class TableColumnNames extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<th>" . parent::current(). "</th>";
    }

    

}
define ('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://localhost/Nat_Lub_Site/');