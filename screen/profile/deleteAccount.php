<?php
session_start();
include("../../conn.php");

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    $tipo = $_GET["t"];

    if (!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] !== true) {
        echo "confirm('Acesso negado.')";
        header("Location: /Callit/main.php");
    }
    if ($tipo=0){
    $sql = "DELETE FROM agenda WHERE Cliente = $userId";
    $con->query($sql);
    $sql = "DELETE FROM Usuario WHERE Id_usuario = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        echo "Usuário excluído com sucesso.";
        header("Location: /Callit/main.php");
    } else {
        echo "Erro ao excluir usuário: " . $stmt->error;
    }
    }else{
        $sql = "DELETE FROM agenda WHERE FK_ID_Prestador = '$userId'";
        $con->query($sql);
        $sql = "DELETE FROM Prestador WHERE Id_prestador = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        echo "Prestador excluído com sucesso.";
        header("Location: /Callit/main.php");
    } else {
        echo "Erro ao excluir usuário: " . $stmt->error;
    }
    }
} else {
    echo "ID do usuário não fornecido.";
}
?>
