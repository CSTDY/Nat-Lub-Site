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
            <section class="contact">
                <div class="width1">
                    <div class="form">
                        <!--form table-->
                        <div class="form-table">
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
                                <form action="Includes/Email-sender.php" method="POST">
                                    <input type="text" class="form-person-data form-cell-width" name="name"
                                        placeholder="Imię">
                                    <p></p>
                                    <input type="text" class="form-person-data form-cell-width" name="email"
                                        placeholder="Email">
                                    <p></p>
                                    <input type="text" class="form-person-data form-cell-width" name="topic"
                                        placeholder="Temat">
                                    <p></p>
                                    <textarea type="text" class="form-message form-cell-width" name="message"
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