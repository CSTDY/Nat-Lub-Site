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
                <div class="border1"> 
                    <!--Funkcja pobiera treść z bazy-->
                     <?php
                        $content->O_sobie("O_sobie");
                        $content->get_result();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        include_once('Includes/Footer.php');
    ?>
</body>

</html>