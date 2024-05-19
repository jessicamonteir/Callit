<?php
    session_start();
    include('conn.php');

    $email = $_SESSION["email"] ?? null;
    $isPrestador = $_SESSION["PRESTADOR"] ?? null;
    
    $imagem_binario = null;

    if (!empty($email)) 
    {
        if ($_SESSION["PRESTADOR"] === true) 
        {
            $table = "Prestador";
            $header = "/Callit/screen/profile/perfilprestador.php?email=" . urlencode($_SESSION["email"]);
        } else {
            $table = "Usuario";
            $header = "/Callit/screen/profile/perfilcliente.php?email=" . urlencode($_SESSION["email"]);
        }

        $nome = $_POST['nameUser'] ?? null;
        $telefone = $_POST['telUser'] ?? null;
        $servicoPrestado = $_POST['servicoPrestador'] ?? null;
        $senhaAtual = $_POST['senhaAtual'] ?? null;
        $senhaNova = $_POST['senhaNova'] ?? null;
        $imagemNova = $_FILES['imagem'] ?? null;

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

            if (!empty($imagemNova["name"])) {
                $imagem_nome = $imagemNova["name"];
                $imagem_temp = $imagemNova["tmp_name"];
            
                $destino = __DIR__ . "/Images/UserImages/" . $imagem_nome;

                if (move_uploaded_file($imagem_temp, $destino)) {
                    $imagem_binario = file_get_contents($destino);
                } else {
                    echo "Erro ao mover o arquivo para o destino.";
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

            if (!empty($imagem_binario)) {
                $sqlUpdateImagem = "UPDATE $table SET Foto_Perfil = ? WHERE email = ?";
                
                $stmtImagem = $con->prepare($sqlUpdateImagem);
                $stmtImagem->bind_param("ss", $imagem_binario, $email);
                
                if (!$stmtImagem->execute()) {
                    die("Erro ao atualizar a foto de perfil: " . $stmtImagem->error);
                }
                $stmtImagem->close();

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
