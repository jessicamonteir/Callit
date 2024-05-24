<?php
session_start();
include("conn.php");


$id = $_SESSION["id"];
$resultado = $_POST["escolha"];
$IdAgendamento = $_POST["IdAgendamento"];


$sql = "UPDATE agenda SET Status_Agendamento='$resultado' WHERE FK_ID_prestador='$id' AND Id_agendamento='$IdAgendamento'";
$result = $con->query($sql);
header("Location: /Callit/screen/profile/perfilprestador.php?email=" . urlencode($_SESSION["email"]));
