<?php

class Site_functions {

private $sql;
private $sql_col_names;
private $sql_id;
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
        $this->sql_id = "SELECT id FROM $table_name";
    }
    if($Section_name == "O_sobie") {
        $this->Checker_O_sobie = true;
        $this->sql_id = "SELECT id FROM $table_name";
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

private function Draw_Edit_Buttons($Column_values) {
    echo "<table style='border: solid 1px black;'><th>btn</th>";
    foreach(new EditButtons(new RecursiveArrayIterator($Column_values->fetchAll())) as $k=>$v) {
        echo $v;
    }

    echo "</table>";
}

function get_result() {
    include("Connect-path.php");
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
            $stmt_id = $conn->prepare($this->sql_id);
            $stmt_id->execute();
            $result_id = array();
            $result_id[] = $stmt_id->setFetchMode(PDO::FETCH_ASSOC);
            $result_col = $stmt_col_names->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $this->Draw_table($stmt_col_names, $stmt);
            $this->Draw_Edit_Buttons($stmt_id);
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
function upload_img() {
    include("Connect-path.php");
    
    $conn = new mysqli($host, $db_user, $db_password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $target_dir = "C:/xampp/htdocs/Nat-Lub-Site/Admin/Admin-Includes/Classes/Prace-img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "Zdjęcie ma typ " . $check["mime"] . ".</br>";
            $uploadOk = 1;
        } else {
            echo "Plik nie jest zdjęciem.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Taki plik już istnieje.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Plik jest zbyt duży.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Możesz załadować tylko pliki JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Twój plik nie został załadowany.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sq = 'INSERT INTO projects(images) VALUES ("'.$_FILES["fileToUpload"]["name"].'")';  
            if ($conn->query($sq) === TRUE) {
                echo "Plik ". basename( $_FILES["fileToUpload"]["name"]). " został przesłany pomyślnie.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Wystąpiły błędy podczas przesyłania pliku.";
        }
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

class EditButtons extends RecursiveIteratorIterator {
    private $Form_edit = "Form_edit";
    private $Form_add = "Form_add";
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='border: 1px solid black; padding: 6px 6px 6px 6px; text-align: center;'>
        <input style='font-size: 0.8em;' type='button' value='Edytuj ".parent::current()."'".' onclick="Show_block(\''.$this->Form_edit.'\');
         Hide_block(\''.$this->Form_add.'\')" name=\'' . parent::current(). "' id='".parent::current()."'></td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
define ('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://localhost/Nat_Lub_Site/');