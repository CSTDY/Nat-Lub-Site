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
                <div class="grid-box">
                    <div class="new-work box">
                        <h3>Dodaj nową pracę</h3>
                        <hr>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <p>Załaduj zdjęcie</p>
                            <input type="file" name="fileToUpload" id="fileToUpload"></br></br>
                            <input type="submit" value="Wczytaj zdjęcie" name="submit"></br>
                        </form>
                    </div>
                    <div class="new-service box">
                        <h3>Dodaj nową usługę</h3>
                        <hr>
                        <p>Hej co ze mną</p>
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