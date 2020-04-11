<?php
    include_once('Admin-includes/Admin-Header-section.php');
?>
</head>

<body>
    <div class="container">
        <!--TopNav-->
        <?php
            include_once("Admin-Includes/Admin-TopNav.php");
        ?>
        <section class="content">
            <div class="width1">
                <form action="" method="post" enctype="multipart/form-data">
                    <span>Wybierz zdjęcie, które chcesz dodać:</span>
                    <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this)">
                    <input type="submit" value="Dodaj pracę" name="submit"></br></br>
                    <?php
                        if(isset($_POST['fileToUpload'])) {
                            echo '<input type="button" value="Anuluj" name="cancel">';
                        }
                    ?>
                    <div class="img-preview">
                        <div class="img_prev_box">
                            <img id="prev" src="#" alt="TWOJE ZDJĘCIE" />
                        </div>
                    </div>
                </form>
                <?php
                    if(isset($_POST['submit'])) {
                        return $content->upload_img();
                    }
                ?>
                
                <h2>Przesłane prace</h2>
                <div class="img_box">
                    <div class="images">
                        <?php
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
                        <img src="<?php echo $imageURL; ?>" alt="Imidź" /></br>
                        <?php
                        }
                    }
                    else {
                        ?>
                        <p>Nie ma jeszcze żadnych zdjęć.</p>
                        <?php
                    }
                ?>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <footer>
        <p>&copy Natalia Lubenets Twój Kosmetolog <?php echo date('Y'); ?></p>
    </footer>
    <script src="Admin-static/JS/Admin.js"></script>
</body>

</html>