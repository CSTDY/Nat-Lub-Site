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
                <!-- Załadowanie max 6 prac na jednej stronie. Reszta na pozostałych-->
                <div class="img_box">
                    <div class="images">
                        <?php
                            $content->Projects_on_page();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!--Container END-->
    </div>
    </div>
    <footer>
        <p>&copy Natalia Lubenets Twój Kosmetolog <?php echo date('Y'); ?></p>
    </footer>
    <script src="static/JS/main.js"></script>
</body>

</html>