<?php
    include_once('Admin-includes/Admin-Header-section.php');
?>
</head>

<body>
    <div class="container">
        <!--TopNav-->
        <div class="topnav">
            <div class="width1">
                <div class="topnav-menu">
                    <div class="topnav-menu-item"><a href="Admin-Usługi.php">
                            <h3>Usługi</h3>
                        </a></div>
                    <div class="topnav-menu-item"><a href="Admin-Prace.php">
                            <h3>Prace</h3>
                        </a></div>
                    <div class="topnav-menu-item"><a href="Admin-O-sobie.php">
                            <h3>O sobie</h3>
                        </a></div>
                </div>
            </div>
        </div>
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