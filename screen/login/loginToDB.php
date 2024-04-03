<?php 
    include('../../conn.php');
    $email = $_POST['logemail'];
    $password = $_POST['logpass'];

    $sql = "SELECT U.email,Login.senha FROM Usuario as U
    INNER JOIN Login ON U.email = Login.email 
    WHERE U.email = '$email'";

    $result = $con->query($sql);
    if ($result === FALSE) {
        echo "Error: " . $sql . "<br>" . $con->error;
    } else {
        if ($result->num_rows > 0) {
            header("Location: ../../main.php");
            exit();
        } else {
            echo "Usuário não encontrado.";
        }
    }
    $con->close();

?>