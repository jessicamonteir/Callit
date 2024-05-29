<?php
session_start();
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeServico = $_POST['nomeServico'];
    $descServico = $_POST['descServico'];

    $sql = "INSERT INTO Servico (Nome_servico, Descricao) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $nomeServico, $descServico);

    if ($stmt->execute()) {
        header("Location: ../profile/admin.php");
    } else {
        echo "Erro ao adicionar serviço: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
} else {
    header("Location: perfilprestador.php");
    exit();
}
?>
