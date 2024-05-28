<?php
session_start();
include("conn.php");

header('Content-Type: application/json');

$response = array("success" => false);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['nome'])) {
            throw new Exception('Parâmetro "nome" não fornecido.');
        }

        $nome = $_POST['nome'];

        $sql = "SELECT * FROM Prestador WHERE Nome = ?";
        $stmt = $con->prepare($sql);
        if (!$stmt) {
            throw new Exception('Erro ao preparar a declaração: ' . $con->error);
        }

        $stmt->bind_param("s", $nome);
        if (!$stmt->execute()) {
            throw new Exception('Erro ao executar a declaração: ' . $stmt->error);
        }

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $response['success'] = true;
            $response['email'] = $row['Email'];
        } else {
            $response['message'] = 'Nenhum resultado encontrado.';
        }
    } else {
        $response['message'] = 'Método de requisição inválido.';
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>