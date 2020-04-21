<?php
    include_once('Admin-includes/Admin-Header-section.php');
    if(isset($_POST['delete_Admin'])) {
        $content->Call_Delete("admins", "delete_Admin");
    }
    if(isset($_POST['Add_Admin'])) {
        $content->Save_Changes('admins', 'Add_Admin');
    }
    if(isset($_POST['Edit_Admin'])) {
        $content->Save_Changes('admins', 'Edit_Admin');
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
                        $content->Get_columns_names('admins', 'Glowna');
                        $content->get_result();
                        ?>
                    </div>
                    <div class="form_box btn">
                        <input type="button" name="Add_Admin_form" value="Dodaj nowego Admina"
                            onclick="Show_block('Admin_form_add'); Hide_block('Admin_form_edit');">
                    </div>
                    <div class="Form_box_edition">
                        <div id="Admin_form_add">
                            <h3>Formularz dodawania Admina</h3>
                            <form class="Content_form" action="" method="POST">
                                </br>
                                <input type="text" name="New_Admin" placeholder="Admin name"></br>
                                <input type="password" name="New_Admin_pass" placeholder="Password"></br>
                                <input type="submit" name="Add_Admin" value="Zapisz zmiany">
                            </form>
                        </div>
                        <div id="Admin_form_edit">
                            <h3>Formularz edycji Admina</h3>
                            <form class="Content_form" action="" method="POST">
                                <input id="row_id" name="num" style="display: none;">
                                </br>
                                <input type="text" name="New_Admin" placeholder="Admin name"></br>
                                <input type="password" name="New_Admin_pass" placeholder="Password"></br>
                                <input type="submit" name="Edit_Admin" value="Zapisz zmiany">
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