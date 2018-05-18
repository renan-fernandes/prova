<?php

if ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ||
    (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true)) {
    header("Location: http://www.google.com");
    exit();
}
