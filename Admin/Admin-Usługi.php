<?php
    include_once('Admin-Includes/Admin-Header-section.php');
    if(isset($_POST['delete_service'])) {
        $content->Call_Delete("services", "delete_service");
    }
    if(isset($_POST['Save_Changes'])) {
        $content->Save_Changes('services', 'Save_Changes');
    }
    if(isset($_POST['Save_Edition'])) {
        $content->Save_Changes('services', 'Save_Edition');
    }
    if(isset($_POST['Save_Section'])) {
        $content->Save_Changes('services', 'Save_Section');
    }
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
                            onclick="Show_block('Form_add'); Hide_block('Form_edit'); Hide_block('Form_add_section')">
                            <input type="button" name="Uslugi_Add_Section" value="Dodaj sekcję" onclick="Show_block('Form_add_section');
                            Hide_block('Form_add'); Hide_block('Form_edit')">
                    </div>
                    <div class="Form_box_edition">
                        <div id="Form_edit">
                            <h3>Edytuj treść</h3>
                            <form class="Content_form" action="" method="POST">
                                <select name="section">
                                    <?php
                                        $content->Draw_Values('section');
                                    ?>
                                </select>
                                <input id="row_id" name="row_id" style="display: none;">
                                </br>
                                <textarea type="text" name="Services_content"
                                    placeholder="Treść"></textarea></br>
                                <input type="number" min="0" name="price" placeholder="Cena">
                                <input type="submit" name="Save_Edition" value="Zapisz zmiany">
                            </form>
                        </div>
                        <div id="Form_add">
                            <h3>Dodaj nową treść</h3>
                            <form class="Content_form" action="" method="POST">
                                <select name="section">
                                    <?php
                                        $content->Draw_Values('section');
                                    ?>
                                </select>
                                </br>
                                <textarea type="text" name="Services_content"
                                    placeholder="Treść"></textarea></br>
                                <input type="number" min="0" name="price" placeholder="Cena">
                                <input type="submit" name="Save_Changes" value="Zapisz zmiany">
                            </form>
                        </div>
                        <div id="Form_add_section">
                            <h3>Dodaj nową sekcję</h3>
                            <form class="Content_form" action="" method="POST">
                                <input type="text" name="New_section" placeholder="sekcja">
                                </br>
                                <input type="text" name="New_subsection" placeholder="podsekcja">
                                <textarea type="text" name="Services_content"
                                    placeholder="Treść"></textarea></br>
                                <input type="number" min="0" name="price" placeholder="Cena">
                                <input type="submit" name="Save_Section" value="Zapisz zmiany">
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