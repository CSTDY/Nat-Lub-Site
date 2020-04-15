<?php
    include_once('Admin-includes/Admin-Header-section.php');
?>
</head>

<body>
    <div class="Admin-Login">
        <form action="Sign-In.php" method="POST">
            <input type="text" name="Admin" placeholder="Admin"></br></br>
            <input type="password" name="pass" placeholder="Hasło"></br></br>
            <input type="submit" name="sub-btn" value="Zaloguj się">
        </form>
    </div>
    <script src="Admin-static/JS/Admin.js"></script>
</body>

</html>