<?php
session_start();
include("conn.php");

$email = $_POST["email"];
$avaliacao = $_POST["Avaliacao"];

$sql="CALL AddAvaliacao('".$email."', '".$avaliacao."');";
$result=$con->query($sql);
