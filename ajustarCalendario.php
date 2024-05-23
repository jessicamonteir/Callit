<?php
session_start();
include("conn.php");

$IdPrestador = $_POST["Id_Prestador"];

$sql = "SELECT * FROM agenda WHERE FK_Id_prestador='$IdPrestador'";
$result = $con->query($sql);

$blockedDates = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $blockedDates[] = $row['Data_de_Agendamento'];
    }
}

$con->close();

// Return the blocked dates as a JSON array
echo json_encode($blockedDates);
?>