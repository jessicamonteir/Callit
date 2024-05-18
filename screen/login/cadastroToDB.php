<?php 
session_start();

include("../../conn.php");

$nomeUsuario = $_POST['lognameUser'] ?? null;
$emailUsuario = $_POST['sigemailUser'] ?? null;
$telefoneUsuario = $_POST['sigtelUser'] ?? null;
$senhaUsuario = $_POST['sigpassUser'] ?? null;

$nomePrestador = $_POST['lognamePrestador'] ?? null;
$emailPrestador = $_POST['sigemailPrestador'] ?? null;
$telefonePrestador = $_POST['sigtelPrestador'] ?? null;
$senhaPrestador = $_POST['sigpassPrestador'] ?? null;
$servico = $_POST['servico'] ?? null;

if(!empty($nomeUsuario) && !empty($emailUsuario) && !empty($senhaUsuario) && !empty($telefoneUsuario)){
    $senhaCripto = md5($senhaUsuario);
    $sql = "INSERT INTO Usuario(Nome,Email,Senha,Telefone) VALUES('$nomeUsuario','$emailUsuario',
    '" . $con->real_escape_string($senhaCripto) . "', '$telefoneUsuario')";

    if ($con->query($sql) === TRUE) {
        $query = "SELECT Email FROM Usuario WHERE Email = '$emailUsuario'";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userId = $row["Email"];
            $_SESSION["email"] = $userId;
            $_SESSION["PRESTADOR"] = false;
            $_SESSION["USUARIO"] = TRUE;
            header("Location: ../../main.php");
            exit();
        } else {
            echo "Erro ao recuperar o email do usuário.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} elseif (!empty($nomePrestador) && !empty($emailPrestador) && !empty($senhaPrestador) && !empty($servico) && !empty($telefonePrestador)) {
    $senhaCripto = md5($senhaPrestador);
    $sql = "INSERT INTO Prestador(Nome,Email,Servico_Prestado,Senha,Telefone) VALUES('$nomePrestador','$emailPrestador'
    ,'$servico','" . $con->real_escape_string($senhaCripto) . "','$telefonePrestador')";

    if ($con->query($sql) === TRUE) {
        $query = "SELECT Email FROM Prestador WHERE Email = '$emailPrestador'";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userId = $row["Email"];
            $_SESSION["email"] = $userId;
            $_SESSION["PRESTADOR"] = true;
            $_SESSION["USUARIO"] = false;
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