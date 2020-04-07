<?php
    include_once('Admin-Includes/Admin-Header-section.php');
?>
</head>

<body>
    <div class="container">
        <!--TopNav-->
        <div class="topnav">
            <div class="width1">
                <div class="topnav-menu">
                    <div class="topnav-menu-item"><a href="Admin-site.php">
                            <h3>Główna</h3>
                        </a></div>
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
            <div class="width1 content-center">
                <?php
                    $content->Get_columns_names('services', 'Uslugi');
                    $content->get_result();
                ?>
            </div>
        </section>

    </div>
    <footer>
        <p>&copy Natalia Lubenets Twój Kosmetolog <?php echo date('Y'); ?></p>
    </footer>
    <script src="Admin-static/JS/Admin.js"></script>
</body>

</html>