<?php
session_start();
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['senhaAtual'])) {
        $senhaAtualEnviada = $_POST['senhaAtual'];
        $senhaAtualEnviadaCriptografada = md5($senhaAtualEnviada);

        echo $senhaAtualEnviadaCriptografada;
    }
}
?>
