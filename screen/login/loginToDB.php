<?php
session_start();

include('../../conn.php');

$email = $_POST['logemail'] ?? null;
$password = $_POST['logpass'] ?? null;

if (!empty($email) && !empty($password)) {
    if($email == 'admin@admin.com' || $password == 'Admin123@'){
        $_SESSION["email"] = $email;
        $_SESSION["PRESTADOR"] = false;
        $_SESSION["USUARIO"] = false;
        $_SESSION["ADMIN"] = true;
        header("Location: ../../main.php");
    }
    else{
    $sqlUsuario = "SELECT email, senha, Id_usuario FROM Usuario WHERE email = '$email' AND senha = md5('$password')";
    $resultUsuario = $con->query($sqlUsuario);
    if ($resultUsuario === FALSE) {
        echo "Error: " . $sqlUsuario . "<br>" . $con->error;
    } else {
        if ($resultUsuario->num_rows > 0) {
            $row = $resultUsuario->fetch_assoc();
            $_SESSION["id"] = $row["Id_usuario"];
            $_SESSION["email"] = $email;
            $_SESSION["PRESTADOR"] = false;
            $_SESSION["USUARIO"] = true;
            $_SESSION["ADMIN"] = false;
            header("Location: ../../main.php");
            exit();
        } else {
            $sqlPrestador = "SELECT email, senha, Id_prestador FROM Prestador WHERE email = '$email' AND senha = md5('$password')";
            $resultPrestador = $con->query($sqlPrestador);
            if ($resultPrestador === FALSE) {
                echo "Error: " . $sqlPrestador . "<br>" . $con->error;
            } else {
                if ($resultPrestador->num_rows > 0) {
                    $row = $resultPrestador->fetch_assoc();
                    $_SESSION["id"] = $row["Id_prestador"];
                    $_SESSION["email"] = $email;
                    $_SESSION["PRESTADOR"] = true;
                    $_SESSION["USUARIO"] = false;
                    $_SESSION["ADMIN"] = false;
                    header("Location: ../../main.php");
                    exit();
                } else {
                    $_SESSION['error_message'] = 'Email ou senha incorretos.';
                    header("Location: login.php");
                    exit();
                }
            }
        }
    }
} }else {
    $_SESSION['error_message'] = 'Insira email e senha para continuar.';
    header("Location: login.php");
    exit();
}
$con->close();
?>