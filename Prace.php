<?php 
    include_once("Includes/Head-section.php");
?>
</head>

<body>
    <div class="container">
        <div class="page-content">
            <?php 
                include_once("Includes/Logo-section.php");
            ?>
            <div class="width1">
                <!-- Załadowanie max 9 prac na jednej stronie. Reszta na pozostałych-->
                <div class="images-container">
                    <?php
                    include('Includes/Classes_DB/Connect-path.php');
                    $conn = new mysqli($host, $db_user, $db_password, $db_name);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $query = $conn->query("SELECT * FROM projects ORDER BY release_date DESC");
                        if($query->num_rows > 0 ) {
                            while($row = $query->fetch_assoc()) {
                                $imageURL = "Admin/Admin-Includes/Classes/Prace-img/".$row['images'];
                                ?>
                        <div class="image">
                            <a href="#">
                                <img src="<?php echo $imageURL; ?>" alt="Imidź" /></br>
                            </a>
                        </div>
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
        </div>
        <!--Reklama-->
        <div class="width1">
            <div class="ads">
                <?php 
                                $content->Prace();
                            ?>
            </div>
        </div>
        <!--Container END-->
    </div>
    </div>
    <footer>
        <p>&copy Natalia Lubenets Twój Kosmetolog <?php echo date('Y'); ?></p>
    </footer>
</body>

</html>