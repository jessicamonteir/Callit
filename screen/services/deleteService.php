<?php
session_start();
include("../../conn.php");

if (isset($_GET['id'])) {
    $idServico = $_GET['id'];

    $sql = "DELETE FROM Servico WHERE Id_servico = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $idServico);

    if ($stmt->execute()) {
        echo "Serviço excluído com sucesso!";
    } else {
        echo "Erro ao excluir serviço: " . $stmt->error;
    }

    $stmt->close();
    $con->close();

    header("Location: ..\profile\admin.php");
    exit();
} else {
    header("Location: ..\profile\admin.php");
    exit();
}
?>
