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
                        $content->Projects_on_page();
                    ?>
                </div>
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
    <footer>
        <p>&copy Natalia Lubenets Twój Kosmetolog <?php echo date('Y'); ?></p>
    </footer>
</body>

</html>