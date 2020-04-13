<?php
    include_once('Admin-includes/Admin-Header-section.php');
?>
</head>

<body>
    <div class="container">
        <!--TopNav-->
        <?php
            include_once("Admin-Includes/Admin-TopNav.php");
        ?>

        <section class="content">
            <div class="width1">
                <div class="tab_form_box">
                    <div class="table_box">
                        <?php
                    $content->Get_columns_names('O_sobie', 'O_sobie');
                    $content->get_result();
                ?>

                    </div>
                    <div class="form_box">
                        <form class="btn">
                            <input type="button" name="O_sobie_edit" value="Edytuj"
                                onclick="Show_block('Form_edit'); Hide_block('Form_add')">
                            <input type="button" name="O_sobie_add" value="Dodaj"
                                onclick="Show_block('Form_add'); Hide_block('Form_edit')">
                        </form>
                    </div>
                    <div id="Form_edit">
                        <h3>Edytuj treść</h3>
                        <form class="Content_form" action="" method="POST">
                            <input type="text" name="O_sobie_text_header_edit" placeholder="Nagłówek"></br>
                            <textarea type="text" name="O_sobie_text_content_edit" placeholder="Treść"></textarea></br>
                            <input type="submit" name="O_sobie_sub_edit" value="Zapisz zmiany">
                        </form>
                    </div>
                    <div id="Form_add">
                        <h3>Dodaj nową treść</h3>
                        <form class="Content_form" action="" method="POST">
                            <input type="text" name="O_sobie_text_header_add" placeholder="Nagłówek"></br>
                            <textarea type="text" name="O_sobie_text_content_add" placeholder="Treść"></textarea></br>
                            <input type="submit" name="O_sobie_sub_add" value="Zapisz zmiany">
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <footer>
        <p>&copy Natalia Lubenets Twój Kosmetolog <?php echo date('Y'); ?></p>
    </footer>
    <script src="Admin-static/JS/Admin.js"></script>
</body>

</html>