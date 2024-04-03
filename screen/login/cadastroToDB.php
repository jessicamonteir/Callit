<?php 
    include("../../conn.php");

    $name = $_POST['logname'];
    $email = $_POST['sigemail'];
    $password = $_POST['sigpass'];

    $sql = "INSERT INTO Usuario (Nome,Email) VALUES ('$name','$email')";
    
    if ($con->query($sql) === TRUE) {
        $sql = "INSERT INTO Login (Email,Senha) VALUES ('$email','$password')";
        if($con->query($sql) === TRUE){
            header("Location: ../../main.php");
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
?>