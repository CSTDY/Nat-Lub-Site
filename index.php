<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="static/cssIMG/main.css" type="text/css" />
    <title>Portfolio</title>
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
        <div class="width1 flex-logo">
            <figure class="logo-container">
                <a href="index.php">
                    <img class="logo-img" src="static/cssIMG/images/Logo.png" alt="Logo">
                    <h3>Natalia Lubenets</h3>
                    <h3>Twój kosmetolog</h3>
                </a>
            </figure>
        </div>
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
    <div class="home-slider">
        <img src="static/cssIMG/images/ukraine.png" alt="Poland" class="slajd-img">
        <img src="static/cssIMG/images/Logo.png" alt="Poland" class="slajd-img">
        <img src="static/cssIMG/images/poland.png" alt="Poland" class="slajd-img">
        <img src="static/cssIMG/images/kolor.jpg" alt="Poland" class="slajd-img">
        <div class="content">
            <button class="btn" onclick="currentDiv(1)">1</button>
            <button class="btn" onclick="currentDiv(2)">2</button>
            <button class="btn" onclick="currentDiv(3)">3</button>
            <button class="btn" onclick="currentDiv(4)">4</button>
        </div>
        <a class="btn slajd-btn-left" onclick="Slajd_plus(-1)">Poprzednie</a>
        <a class="btn slajd-btn-right" onclick="Slajd_plus(1)">Następne</a>
    </div>
    <footer>

    </footer>
    <script src="static/JS/main.js"></script>
</body>

</html>