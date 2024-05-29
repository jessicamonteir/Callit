<?php
session_start();
include("../../conn.php");

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);

    if (!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] !== true) {
        echo "confirm('Acesso negado.')";
        header("Location: /Callit/main.php");
    }

    $sql = "DELETE FROM Usuario WHERE Id_usuario = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        echo "Usuário excluído com sucesso.";
        header("Location: Callit/main.php");
    } else {
        echo "Erro ao excluir usuário: " . $stmt->error;
    }
} else {
    echo "ID do usuário não fornecido.";
}
?>
