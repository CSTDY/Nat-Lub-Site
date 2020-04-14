<?php 
    include_once("Includes/Head-section.php");
?>
</head>

<body>
    <div class="container">
        <div class="page-content">
            <!--LOGO-->
            <?php 
                include_once("Includes/Logo-section.php");
            ?>
            <div class="width1">
                <div class="border1">
                    <!--Funkcja pobierająca menu z bazy-->
                    <?php
                        $content->Uslugi("services");
                        echo $content->get_result();
                    ?>
                </div>
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