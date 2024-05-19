<?php
    session_start();
    include('conn.php');

    $email = $_SESSION["email"] ?? null;
    $isPrestador = $_SESSION["PRESTADOR"] ?? null;

    if (!empty($email)) 
    {
        if ($_SESSION["PRESTADOR"] === true) 
        {
            $table = "Prestador";
            $header = "/Callit/screen/profile/perfilprestador.php";
        } else {
            $table = "Usuario";
            $header = "/Callit/screen/profile/perfilcliente.php";
        }

        $nome = $_POST['nameUser'] ?? null;
        $telefone = $_POST['telUser'] ?? null;
        $servicoPrestado = $_POST['servicoPrestador'] ?? null;
        $senhaAtual = $_POST['senhaAtual'] ?? null;
        $senhaNova = $_POST['senhaNova'] ?? null;

        if (!empty($nome) && !empty($telefone)) 
        {

            if (!empty($senhaAtual)) {
                $sqlSenha = "SELECT senha FROM $table WHERE email = '$email'";
                $resultSenha = $con->query($sqlSenha);

                if ($resultSenha->num_rows > 0) {
                    $row = $resultSenha->fetch_assoc();
                    $senhaCriptografada = $row["senha"];

                    if (md5($senhaAtual) !== $senhaCriptografada) {
                        echo "Senha atual incorreta.";
                        exit(); 
                    }
                } else {
                    echo "Erro ao buscar a senha atual no banco de dados.";
                    exit();
                }
            }

            $senhaNovaCriptografada = !empty($senhaNova) ? md5($senhaNova) : null;
            
            $valueSet = "Nome = '$nome', Telefone = '$telefone'";

            if ($isPrestador) 
            {
                $valueSet .= ", Servico_Prestado ='$servicoPrestado'";
            }

            if (!empty($senhaNovaCriptografada)) 
            {
                $valueSet .= ", Senha ='$senhaNovaCriptografada'";
            }

            $sqlUpdate = "UPDATE $table SET $valueSet WHERE email = '$email'";

            if ($con->query($sqlUpdate) === TRUE) 
            {
                ?>
                <script>
                    console.log("Dados atualizados com sucesso")
                </script>
                <?php

                header("Location: $header");
                exit();
            } else 
            {
                ?>
                <script>
                    console.log("Erro ao atualizar os dados: <?php echo $con->error; ?>")
                </script>
                <?php
            }
        } else 
        {
            echo "Por favor, preencha todos os campos e forneça a senha atual ou a nova senha.";
        }
    } else 
    {
        echo "Email não foi fornecido.";
    }

    $con->close();
?>
