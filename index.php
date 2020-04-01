<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="static/cssIMG/main.css" type="text/css" />
    <title>NatLubSite</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pinyon+Script" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <!--LOGO-->
    <div class="color-bg">
        <div class="width1 right">
            <a href="#">
                <div class="flag-img" id="UK"></div>
            </a>
            <a href="#">
                <div class="flag-img" id="PL"></div>
            </a>
        </div>
    </div>
    <div class="logo-gold"></div>
    <div class="header">
        <figure class=" width1 flex-logo">
            <a href="index.php"><img class="logo-img" src="static/cssIMG/images/Logo.png" alt="Logo"></a>
            <div>
                <h3>Natalia Lubenets</h3>
                <h3>Twój kosmetolog</h3>
            </div>
        </figure>
    </div>
    <div class="logo-gold"></div>
    <div class="color-bg">
        <div class="width1">
            <nav class="topnav"> 
                <a class="link" href="Kontakt.php">Kontakt</a> 
                <a class="link" href="Prace.php">Prace</a>
                <a class="link" href="Usługi.php">Usługi</a>
                <a class="link" href="O-sobie.php">O sobie</a>
            </nav>
        </div>
    </div>
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