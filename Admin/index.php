<?php
    include('Admin-Includes/Classes/Connect-path.php');
    $db = new mysqli($host, $db_user, $db_password, $db_name);
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $AdminName = mysqli_real_escape_string($db,$_POST['Admin']);
        $password = mysqli_real_escape_string($db,$_POST['pass']); 

        $AdminName = htmlentities($AdminName, ENT_QUOTES, "UTF-8"); 
        
        $sql = "SELECT * FROM admins WHERE BINARY name = '$AdminName'";
        if($result = $db->query(sprintf($sql, mysqli_real_escape_string($db, $AdminName)))) {
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
        
            // If result matched $AdminName and $password, table row must be 1 row
              
            if($count == 1) {
                if(password_verify($password, $row['pass'])) {
                    $_SESSION['logged_Admin'] = $AdminName;
                    mysqli_close($db);    
                    header("location: Admin-site.php");
                }
            }else {
               echo $error = "Your Login Name or Password is invalid";
            }
            mysqli_close($db);
            }
            
    }
    //Redirect to Admin main page if Admin is logged
    if(isset($_SESSION['logged_Admin']) && $_SESSION['logged_Admin']) {
        header('location: Admin-site.php');
    }
       
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pinyon+Script" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>NatLubSite_ADMIN</title>
    <link rel="stylesheet" type="text/css" href="Admin-static/cssIMG/Admin.css">
</head>

<body>
    <div class="Admin-Login">
        <form class="Admin-log-form" action="" method="POST">
            <input type="text" name="Admin" placeholder="Admin"></br></br>
            <input type="password" name="pass" placeholder="Hasło"></br></br>
            <input type="submit" name="sub-btn" value="Zaloguj się">
        </form>
    </div>
    <script src="Admin-static/JS/Admin.js"></script>
</body>

</html>