<?php

define('BASE_URL', 'http://localhost/Nat-Lub-Site/');
    session_start();

    session_unset();

    header('location:'.BASE_URL.'/Admin');

?>