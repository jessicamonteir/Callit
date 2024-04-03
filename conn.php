<?php 
    $servername = "localhost:3306";
    $username = "root";
    $password = "PUC@1234";
    $dbname = "callit";
    
    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
        die("Failed connection". $con->connect_error);
    }
?>