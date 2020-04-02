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
                <div class="o-sobie"> <!--Funkcja pobiera treść z bazy-->
                     <?php
                        $content = new Upload_content("tekst", "O_sobie");
                        echo $content->get_result();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy Natalia Lubenets Twój Kosmetolog <?php echo date('Y'); ?></p>
    </footer>
</body>

</html>