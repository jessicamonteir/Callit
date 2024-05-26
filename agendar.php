<?php

session_start();
include('conn.php');

$emailcliente = $_SESSION["email"] ?? null;
$emailprestador = $_POST["emailPrestador"];
$data = $_POST['data'];

if (!empty($emailcliente)) {
    $sqlId = "SELECT * FROM Prestador WHERE Email = '$emailprestador'";
    $result = $con->query($sqlId);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $IdPrestador = $row["Id_prestador"];
        $servico = $row["Servico_Prestado"];
    }
    $sqlId = "SELECT * FROM Servico WHERE Nome_servico = '$servico'";
    $result = $con->query($sqlId);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $IdServico = $row["Id_servico"];
    
    }
}

if (!empty($emailcliente)) {
    $sql = "INSERT INTO agenda(FK_ID_Prestador,FK_ID_Servico,Data_de_Agendamento,Cliente,Status_Agendamento) VALUES ('$IdPrestador','$IdServico','$data','$emailcliente','Confirmar')";
    $result = $con->query($sql);
    header("Location: /Callit/screen/profile/perfilprestador.php?email=" . urlencode($emailprestador));
}