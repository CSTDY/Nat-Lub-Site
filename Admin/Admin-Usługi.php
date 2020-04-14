<?php
    include_once('Admin-Includes/Admin-Header-section.php');
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
                    $content->Get_columns_names('services', 'Uslugi');
                    $content->get_result();
                ?>
                    </div>
                    <div class="form_box btn">
                        <input type="button" name="Uslugi_add" value="Dodaj"
                            onclick="Show_block('Form_add'); Hide_block('Form_edit')">
                    </div>
                    <div class="Form_box_edition">
                        <div id="Form_edit">
                            <h3>Edytuj treść</h3>
                            <form class="Content_form" action="" method="POST">
                                <select name="O_sobie_text_header_edit">
                                    <option value="">Nazwa sekcji</option>
                                    <option>coś</option>
                                </select>
                                </br>
                                <textarea type="text" name="O_sobie_text_content_edit"
                                    placeholder="Treść"></textarea></br>
                                <input type="submit" name="O_sobie_sub_edit" value="Zapisz zmiany">
                            </form>
                        </div>
                        <div id="Form_add">
                            <h3>Dodaj nową treść</h3>
                            <form class="Content_form" action="" method="POST">
                                <input type="text" name="O_sobie_text_header_add" placeholder="Nagłówek"></br>
                                <textarea type="text" name="O_sobie_text_content_add"
                                    placeholder="Treść"></textarea></br>
                                <input type="submit" name="O_sobie_sub_add" value="Zapisz zmiany">
                            </form>
                        </div>
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