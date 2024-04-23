<?php 
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
            header("Location: ../../main.php");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } elseif (!empty($nomePrestador) && !empty($emailPrestador) && !empty($senhaPrestador) && !empty($servico)) {
        $senhaCripto = md5($senhaPrestador);
        $sql = "INSERT INTO Prestador(Nome,Email,Servico_Prestado,Senha) VALUES('$nomePrestador','$emailPrestador'
        ,'$servico','" . $con->real_escape_string($senhaCripto) . "')";

        if ($con->query($sql) === TRUE) {
            header("Location: ../../main.php");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        header("Location: ../../main.php");
        exit;
    }
?>