<?php
    session_start();
    $_SESSION["email"] = null;
    $_SESSION["PRESTADOR"] = null;
    session_destroy();
    header("Location: /Callit/main.php");
?>