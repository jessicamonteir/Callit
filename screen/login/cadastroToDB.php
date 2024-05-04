<?php 
session_start();

include("../../conn.php");

$nomeUsuario = $_POST['lognameUser'] ?? null;
$emailUsuario = $_POST['sigemailUser'] ?? null;
$senhaUsuario = $_POST['sigpassUser'] ?? null;

$nomePrestador = $_POST['lognamePrestador'] ?? null;
$emailPrestador = $_POST['sigemailPrestador'] ?? null;
$senhaPrestador = $_POST['sigpassPrestador'] ?? null;
$servico = $_POST['servico'] ?? null;

if(!empty($nomeUsuario) && !empty($emailUsuario) && !empty($senhaUsuario)){
    $senhaCripto = md5($senhaUsuario);
    $sql = "INSERT INTO Usuario(Nome,Email,Senha) VALUES('$nomeUsuario','$emailUsuario',
    '" . $con->real_escape_string($senhaCripto) . "')";

    if ($con->query($sql) === TRUE) {
        $query = "SELECT Email FROM Usuario WHERE Email = '$emailUsuario'";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userId = $row["Email"];
            $_SESSION["email"] = $userId;
            $_SESSION["PRESTADOR"] = false;

            header("Location: ../../main.php");
            exit();
        } else {
            echo "Erro ao recuperar o email do usuário.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} elseif (!empty($nomePrestador) && !empty($emailPrestador) && !empty($senhaPrestador) && !empty($servico)) {
    $senhaCripto = md5($senhaPrestador);
    $sql = "INSERT INTO Prestador(Nome,Email,Servico_Prestado,Senha) VALUES('$nomePrestador','$emailPrestador'
    ,'$servico','" . $con->real_escape_string($senhaCripto) . "')";

    if ($con->query($sql) === TRUE) {
        $query = "SELECT Email FROM Prestador WHERE Email = '$emailPrestador'";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userId = $row["Email"];
            $_SESSION["email"] = $userId;
            $_SESSION["PRESTADOR"] = true;

            header("Location: ../../main.php");
            exit();
        } else {
            echo "Erro ao recuperar o email do prestador.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    header("Location: ../../main.php");
    exit;
}
?>