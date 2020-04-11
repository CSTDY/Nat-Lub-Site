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
                <div class="table_box">
                <?php
                    $content->Get_columns_names('O_sobie', 'O_sobie');
                    $content->get_result();
                ?>
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