<?php 
    include_once("Includes/Head-section.php");
?>
</head>

<body>
    <div class="container">
        <div class="page-content">
            <!--LOGO-->
            <?php 
    include_once("Includes/Logo-section.php");
    ?>
            <!--SLIDER-->
            <div class="width1">
                <div class="border1 slajdy">
                    <!--Załadowanie funkcją max 10 ostatnich publikacji-->
                    <?php
                    include('Includes/Classes_DB/Connect-path.php');
                    $conn = new mysqli($host, $db_user, $db_password, $db_name);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $query = $conn->query("SELECT * FROM projects ORDER BY release_date DESC LIMIT 10");
                        if($query->num_rows > 0 ) {
                            while($row = $query->fetch_assoc()) {
                                $imageURL = "Admin/Admin-Includes/Classes/Prace-img/".$row['images'];
                                ?>
                                <img class="slajd-img" src="<?php echo $imageURL; ?>" alt="Imidź" /></br>
                        <?php
                            }
                        }
                        else {
                            ?>
                        <p>Nie ma jeszcze żadnych zdjęć.</p>
                        <?php
                        
                    $conn->close();}
                    ?>
                </div>
            </div>
            <!--Reklama-->
            <div class="width1">
                <div class="ads">
                    Reklama
                </div>
            </div>
            <!--Container END-->
        </div>
    </div>
    <?php
        include_once('Includes/Footer.php');
    ?>
</body>

</html>