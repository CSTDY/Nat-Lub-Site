<?php

if(isset($_POST['sub-btn'])) {
    header('Location: Admin-site.php');
}

try {
    
}
catch(Exception $e) {
    echo "Connected failed: ".$e->getMessage();
    header('Location: C:/xampp/htdocs/Nat-Lub-Site/Admin/index.php');
}

?>