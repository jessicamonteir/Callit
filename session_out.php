<?php
    session_start();
    $_SESSION["email"] = null;
    $_SESSION["PRESTADOR"] = null;
    $_SESSION["id"] = null;
    session_destroy();
    header("Location: /Callit/main.php");
?>