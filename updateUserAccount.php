<?php
    session_start();

    include('conn.php');

    $email = $_SESSION["email"] ?? null;
    $isPrestador = $_SESSION["PRESTADOR"] ?? null;

    if (!empty($email)) {
        if ($_SESSION["PRESTADOR"] === true) {
            $table = "Prestador";
        } else {
            $table = "Usuario";
        }

        $nome = $_POST['nameUser'] ?? null;
        $telefone = $_POST['telUser'] ?? null;
        $servicoPrestado = $_POST['servicoPrestador'] ?? null;
        // $senha = $_POST['senha'] ?? null;

        if (!empty($nome) && !empty($telefone)) {
            $senhaCripto = md5($senha);
            // $sql = "UPDATE $table SET Nome = '$nome', Telefone = '$telefone', Senha = '$senhaCripto' WHERE email = '$email'";
            $valueSet = "Nome = '$nome', Telefone = '$telefone'";

            if ($isPrestador)
            {
                $valueSet .= ", Servico_Prestado ='$servicoPrestado'";
            }

            $sql = "UPDATE $table SET $valueSet WHERE email = '$email'";

            if ($con->query($sql) === TRUE) {
                ?>
                <script>
                    console.log("Dados atualizados com sucesso")
                </script>
                <?php
                header("Location: /Callit/screen/profile/perfilcliente.php");
            } else {
                ?>
                <script>
                    console.log("Erro ao atualizar os dados: " + <?php echo $con->error?>)
                </script>
                <?php
            }
        } else {
            echo "Por favor, preencha todos os campos.";
        }
    } else {
        echo "Email não foi fornecido.";
    }

    $con->close();
?>
