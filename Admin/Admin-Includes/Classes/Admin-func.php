<?php

class Site_functions {

private $sql;
private $sql_col_names;
private $sql_id;
// bool values witch checks witch section is used
private $Checker_Uslugi = false;
private $Checker_O_sobie = false;
private $Checker_Glowna = false;
private $sql_Delete;
private $sql_Edit;

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

////////////////////////

function Get_columns_names($table_name, $Section_name) {
    if($Section_name == "Uslugi") {
        $this->Checker_Uslugi = true;
        $this->sql_id = "SELECT id FROM $table_name";
        $this->sql = "SELECT * FROM $table_name";
    }
    if($Section_name == "O_sobie") {
        $this->Checker_O_sobie = true;
        $this->sql_id = "SELECT id FROM $table_name";
        $this->sql = "SELECT * FROM $table_name";
    }
    if($Section_name == "Glowna") {
        $this->Checker_Glowna = true;
        $this->sql_id = "SELECT id FROM $table_name";
        $this->sql = "SELECT id, name, create_at FROM $table_name";
    }
    $this->sql_col_names = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' ORDER BY ORDINAL_POSITION";
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

//Draw Admin Users table

private function Draw_Admin_Users_table($Column_values) {
    echo "<table style='border: solid 1px black;'>
    <th>id</th><th>User</th><th>Stworzony w dniu</th>";
    foreach(new TableRows(new RecursiveArrayIterator($Column_values->fetchAll())) as $k=>$v) {
        echo $v;
    }
    echo "</table>";


}

private function Draw_Edit_Buttons_Services($Column_values) {
    echo "<table style='border: solid 1px black;'><th>btn</th>";
    foreach(new EditButtons_Services(new RecursiveArrayIterator($Column_values->fetchAll())) as $k=>$v) {
        echo $v;
    }

    echo "</table>";
}

private function Draw_Edit_Buttons_Admin($Column_values) {
    echo "<table style='border: solid 1px black;'><th>btn</th>";
    foreach(new EditButtons_Admin(new RecursiveArrayIterator($Column_values->fetchAll())) as $k=>$v) {
        echo $v;
    }

    echo "</table>";
}

function Draw_Values($Col_name) {
    include("Connect-path.php");
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_password);
        //polish characters
        $conn -> query ('SET NAMES utf8');
        $conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
        //
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt_select = $conn->prepare("SELECT DISTINCT $Col_name FROM services");
        $stmt_select->execute();
        if($Col_name == "section") {
            $stmt_select->setFetchMode(PDO::FETCH_ASSOC);
            $this->Draw_Select_Values($stmt_select);
        }
        if($Col_name == "subsection") {
            $stmt_select->setFetchMode(PDO::FETCH_ASSOC);
            $this->Draw_Select_Values($stmt_select);
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
}

private function Draw_Select_Values($Column_values) {
    foreach(new SelectValues(new RecursiveArrayIterator($Column_values->fetchAll())) as $k=>$v) {
        echo $v;
    }
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
            $stmt_id->setFetchMode(PDO::FETCH_ASSOC);
            $stmt_col_names->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $this->Draw_table($stmt_col_names, $stmt);
            $this->Draw_Edit_Buttons_Services($stmt_id);
        }

        //O sobie
        if($this->Checker_O_sobie) {
            $this->Checker_O_sobie = false;
            $stmt_col_names->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $this->Draw_table($stmt_col_names, $stmt);
        }

        //Główna
        if($this->Checker_Glowna) {
            $this->Checker_Glowna = false;
            $stmt_id = $conn->prepare($this->sql_id);
            $stmt_id->execute();
            $stmt_id->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $this->Draw_Admin_Users_table($stmt);
            $this->Draw_Edit_Buttons_Admin($stmt_id);
        }
    }
    catch(Exception $e) {
        echo "Connected failed: ".$e->getMessage();
    }
    $conn = null;
}

//Admin-Prace.php

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
        exit();
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Plik jest zbyt duży.";
        $uploadOk = 0;
        exit();
    }
    //Check image dimension (width and height)
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $img_width = $check[0];
    $img_height = $check[1];
    if($img_width > 1000 || $img_height >1000) {
        echo "zdjęcie ma za dużą rozdzielczość!";
        exit();
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Możesz załadować tylko pliki JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
        exit();
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

function Projects_on_page() {
    
    include('Admin-Includes/Classes/Connect-path.php');
    $conn = new mysqli($host, $db_user, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = $conn->query("SELECT * FROM projects ORDER BY release_date DESC");
        if($query->num_rows > 0 ) {
            while($row = $query->fetch_assoc()) {
                $imageURL = "Admin-Includes/Classes/Prace-img/".$row['images'];
                ?>
                <div class="project_photo">
                    <img src="<?php echo $imageURL; ?>" alt="Imidż" /></br>
                    <form method="POST">
                        <input type="text" name="content" value="<?php echo $row['images'];?>" style="display: none;">
                        <input class="delete_btn" type="submit" name="delete_project" value="X">
                    </form>
                </div>
            <?php
            }
        }
        else {
            ?>
            <p>Nie ma jeszcze żadnych zdjęć.</p>
            <?php
        }
        mysqli_close($conn);
    
}

//DELETING
function Call_Delete($table_name, $btn_name) {
    if($btn_name == "delete_project") {
        $this->sql_Delete = "DELETE FROM $table_name WHERE images ='". $_POST["content"]."'";
        $this->Delete($btn_name);
    }
    if($btn_name == "delete_service") {
        $this->sql_Delete = "DELETE FROM $table_name WHERE id = '". $_POST["Uslugi_del"]."'";
        $this->Delete($btn_name);
        echo "Usługa została usunięta";
    }
    if($btn_name == "delete_Admin") {
        $this->sql_Delete = "DELETE FROM $table_name WHERE id = '". $_POST["Admin_del"]."'";
        $this->Delete($btn_name);
        echo "Admin został usunięty";
    }
}

private function Delete($btn_name) {
    include("Connect-path.php");
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_password);
        //polish characters
        $conn -> query ('SET NAMES utf8');
        $conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
        //
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare($this->sql_Delete);
        $stmt->execute();
        
        if($btn_name == "delete_project") {
            $file_dir = "C:/xampp/htdocs/Nat-Lub-Site/Admin/Admin-Includes/Classes/Prace-img/";
            unlink($file_dir.$_POST['content']);
            echo "Plik usunięty pomyślnie";
        }
        
    }
    catch(PDOException $e) {
        echo  $e->getMessage();
    }
    $conn = null;
}

//EDITING AND SAVING

function Save_Changes($table_name, $btn_name) {
    if($btn_name == "Save_Changes") {
        $this->sql_Edit = "INSERT INTO $table_name (section, content, price) VALUES ('".$_POST["section"]."', '".$_POST["Services_content"]."'
        , '".$_POST["price"]."')";
        $this->Edition();
        echo "Dodano nową usługę";
    }
    if($btn_name == "Save_Edition") {
        $this->sql_Edit = "UPDATE $table_name SET section='".$_POST['section']."', content='".$_POST['Services_content']."', 
        price = '".$_POST['price']."' WHERE id ='".$_POST['row_id']."'";
        $this->Edition();
        echo "Zapisano zmiany";
    }
    if($btn_name == "Save_Section") {
        $this->sql_Edit = "INSERT INTO $table_name VALUES (NULL, '".$_POST['New_section']."', '".$_POST['New_subsection']."', 
        '".$_POST['Services_content']."', '".$_POST['price']."')";
        $this->Edition(); 
        echo "Dodano nową sekcję";
    }
    //Admin
    if($btn_name == "Add_Admin") {
        if(isset($_POST['New_Admin']) && $_POST['New_Admin'] && isset($_POST['New_Admin_pass']) && $_POST['New_Admin_pass']) {
            $haslo_hash = password_hash($_POST['New_Admin_pass'], PASSWORD_DEFAULT);
            $this->sql_Edit = "INSERT INTO $table_name (`name`, `pass`) 
            SELECT \"".$_POST['New_Admin']."\", \"$haslo_hash\" FROM $table_name WHERE NOT EXISTS (SELECT * FROM $table_name WHERE name= \"".$_POST['New_Admin']."\" LIMIT 1) ";
            $this->Edition(); 
        }
        else {
            echo "Hasło i Nazwa użytkownika jest wymagana";
        }
    }
    if($btn_name == "Edit_Admin") {
        if(isset($_POST['New_Admin']) && $_POST['New_Admin']) {
            $this->sql_Edit = "UPDATE $table_name SET name='".$_POST['New_Admin']."' WHERE id ='".$_POST['num']."'";
            $this->Edition();
            echo "Zmiana nazwy użytkownika przebiegła pomyślnie ";
        }
        if(isset($_POST['New_Admin_pass']) && $_POST['New_Admin_pass']) {
            $haslo_hash = password_hash($_POST['New_Admin_pass'], PASSWORD_DEFAULT);
            $this->sql_Edit = "UPDATE $table_name SET pass='".$haslo_hash."' WHERE id ='".$_POST['num']."'";
            $this->Edition();
            echo "Zmiana hasła użytkownika przebiegła pomyślnie ";
        }
        else {
            echo "coś poszło nie tak... Spróbuj później";
        }
    }
}

private function Edition() {
    include("Connect-path.php");
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_password);
        //polish characters
        $conn -> query ('SET NAMES utf8');
        $conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
        //
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($this->sql_Edit);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
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

class EditButtons_Services extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='border: 1px solid black; padding: 6px 6px 6px 6px; text-align: center; display:inline-flex;'>
        <form method='POST'>
        <input type='text' name='Uslugi_edit' id='Edit_".parent::current()."' value='".parent::current()."' style='display: none;'>
        <input style='font-size: 0.8em;' type='button' value='Edytuj".parent::current()."' onclick='Show_block(\"Form_edit\");
         Hide_block(\"Form_add\"); Hide_block(\"Form_add_section\"); Download_ID(\"Edit_".parent::current()."\", \"row_id\");' name='Uslugi_Edit_btn'>
         </form>
         <form method='POST'>
         <input type='text' name='Uslugi_del' value='".parent::current()."' style='display: none;'>
         <input type='submit' name='delete_service' value='Usuń ".parent::current()."'>
         </form>
         </td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

class EditButtons_Admin extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='border: 1px solid black; padding: 6px 6px 6px 6px; text-align: center; display:inline-flex;'>
        <form method='POST'>
        <input type='text' name='Admin_edit' id='Edit_Admin".parent::current()."' value='".parent::current()."' style='display: none;'>
        <input style='font-size: 0.8em;' type='button' value='Edytuj".parent::current()."' onclick='Show_block(\"Admin_form_edit\");
        Hide_block(\"Admin_form_add\"); Download_ID(\"Edit_Admin".parent::current().
        "\", \"row_id\");' name='Admin_Edit_btn'>
         </form>
         <form method='POST'>
         <input type='text' name='Admin_del' value='".parent::current()."' style='display: none;'>
         <input type='submit' name='delete_Admin' value='Usuń ".parent::current()."'>
         </form>
         </td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

class SelectValues extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<option>".parent::current()."</option>";
    }
}

