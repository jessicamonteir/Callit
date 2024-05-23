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
    }
}

if (!empty($emailcliente)) {
    $sql = "INSERT INTO agenda(FK_ID_Prestador,Data_de_Agendamento,Cliente) VALUES ('$IdPrestador','$data','$emailcliente')";
    $result = $con->query($sql);
    header("Location: /Callit/screen/profile/perfilprestador.php?email=" . urlencode($emailprestador));
}