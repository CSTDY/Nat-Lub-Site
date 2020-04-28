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
    <!--Container END-->
    </div>
    </div>
    <?php
        include_once('Includes/Footer.php');
    ?>
</body>

</html>