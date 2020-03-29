<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="static/cssIMG/main.css" type="text/css" />
    <title>Portfolio</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pinyon+Script" />
</head>

<body>
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
            <div class="flex-item">
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
    <section class="contact">
        <div class="width1">
            <div class="form">
                <!--form table-->
                <div class="form-table">
                    <tr class="text-position">
                        <div class="form-col1">
                            <h3>Zapraszam do kontaktu</h3>
                            <p></p>
                            <p class="tel">Tel. 664 759 524</p>
                            <p></p>
                            <p>Natalialubenetskosmetolog@gmail.com</p>
                            <p></p>
                            <p>Rotmanka</p>
                            </br></br>
                            <p>
                                Na maile odpowiadam w ciągu 24h.
                                Aby otrzymać szybszą odpowiedź proszę o kontakt telefoniczny. Dziękuję!</p>
                            <p></p>
                            <a href="#">
                                <div class="flag-img" id="FB"></div>
                            </a>
                            <a href="#">
                                <div class="flag-img" id="IG"></div>
                            </a>
                        </div>
                        <div class="form-col2">
                            <form action="#" method="POST">
                                <input type="text" class="form-person-data form-cell-width" name="name"
                                    placeholder="Imie">
                                <p></p>
                                <input type="text" class="form-person-data form-cell-width" name="email"
                                    placeholder="Email">
                                <p></p>
                                <input type="text" class="form-person-data form-cell-width" name="topic"
                                    placeholder="Temat">
                                <p></p>
                                <textarea type="text" class="form-message form-cell-width" name="content"
                                    placeholder="Wiadomość"></textarea>
                                <p></p>
                                <p></p>
                                <div>
                                    <input type="checkbox" id="permission-box">
                                    <label for="permission-box">Wyrażam zgode</label>
                                </div>
                                <p></p>
                                <p></p>
                                <div>
                                    <input type="checkbox" id="RODO">
                                    <label for="RODO">RODO</label>
                                </div>
                                </br>
                                <input type="submit" class="form-submit-btn form-cell-width" value="Wyślij"
                                    name="submit">
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy Natalia Lubenets Twój Kosmetolog <?php echo date('Y'); ?></p>
    </footer>
</body>

</html>