<?php
    include_once('Admin-includes/Admin-Header-section.php');
    if(isset($_POST['delete_project']))
        $content->Call_Delete('projects', 'delete_project'); 
    
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
                        $content->Projects_on_page();
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