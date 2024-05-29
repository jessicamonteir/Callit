<?php
    session_start();

    include('conn.php');

    $email = $_SESSION["email"] ?? null;
    $id = $_SESSION["id"] ?? null;

    if (!empty($email)) {
        $sqlAgenda = "DELETE FROM agenda WHERE cliente = '$email'";
        $resultAgenda = $con->query($sqlAgenda);
        $sqlUsuario = "DELETE FROM Usuario WHERE email = '$email'";
        $resultUsuario = $con->query($sqlUsuario);
        if ($resultUsuario === FALSE) {
            echo "Error: " . $sqlUsuario . "<br>" . $con->error;
        } else {
            if ($resultAgenda === FALSE) {
                echo "Error: " . $sqlAgenda . "<br>" . $con->error;
            }
            if ($con->affected_rows > 0) {
                echo "Usuário excluído com sucesso.";
                $_SESSION["email"] = null;
                $_SESSION["PRESTADOR"] = null;
                $_SESSION["id"] = null;
                session_destroy();
                header("Location: /Callit/main.php");
            } else {
                $sqlAgenda = "DELETE FROM agenda WHERE FK_ID_Prestador = '$id'";
                $resultAgenda = $con->query($sqlAgenda);
                $sqlPrestador = "DELETE FROM Prestador WHERE email = '$email'";
                $resultPrestador = $con->query($sqlPrestador);
                if ($resultPrestador === FALSE) {
                    echo "Error: " . $sqlPrestador . "<br>" . $con->error;
                } else {
                   
                    if ($resultAgenda === FALSE) {
                        echo "Error: " . $sqlAgenda . "<br>" . $con->error;
                    }
                    if ($con->affected_rows > 0) {
                        echo "Prestador excluído com sucesso.";
                        $_SESSION["email"] = null;
                        $_SESSION["PRESTADOR"] = null;
                        $_SESSION["id"] = null;
                        session_destroy();
                        header("Location: /Callit/main.php");
                    } else {
                        echo "Usuário não encontrado.";
                    }
                }
            }
        }
    } else {
        echo "Email não foi fornecido.";
    }
    $con->close();
?>
