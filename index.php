<?php 
    include_once("Includes/Head-section.php");
?>
</head>
<body>
    <!--LOGO-->
    <?php 
        include_once("Includes/Logo-section.php");
    ?>
    <!--SLIDER-->
    <div class="home-slider"> <!--Załadowanie funkcją max 10 ostatnich publikacji-->
        <img class="slajd-img" src="static/cssIMG/images/Logo.png">
        <img class="slajd-img" src="static/cssIMG/images/poland.png">
        <img class="slajd-img" src="static/cssIMG/images/kolor.jpg">
        <div class="slajd-bar">
            <div class="slajd-item" onclick="Slajd_plus(-1)">&#10094;</div>
            <span class="slajd-item" onclick="currentDiv(1)">1</span>
            <span class="slajd-item" onclick="currentDiv(2)">2</span>
            <span class="slajd-item" onclick="currentDiv(3)">3</span>
            <div class="slajd-item" onclick="Slajd_plus(1)">&#10095;</div>
        </div>
    </div>
    <footer>
        <p>&copy Natalia Lubenets Twój Kosmetolog <?php echo date('Y'); ?></p>
    </footer>
    <script src="static/JS/main.js"></script>
</body>

</html>