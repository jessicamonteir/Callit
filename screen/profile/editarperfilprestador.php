<?php
  session_start();

  include('../../conn.php');

  $email = $_SESSION["email"] ?? null;
  
  $senhaAtualCriptografada = null;

  if (!empty($email)) 
  {
    $sqlUsuario = "SELECT Senha FROM Prestador WHERE email = '$email'";

    $resultUsuario = $con->query($sqlUsuario);

    if ($resultUsuario === FALSE) 
    {
      echo "Error: " . $sqlUsuario . "<br>" . $con->error;
    }
    else
    {
      if ($resultUsuario->num_rows > 0) 
      {
        $row = $resultUsuario->fetch_assoc();
        $senhaAtualCriptografada = $row["Senha"];
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="perfilprestador.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/calendars/calendar-1/assets/css/calendar-1.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"rel="stylesheet"/>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand navegacao" href="../../main.php"><strong><img src="/Callit/Images/Logo/caliit.png" alt=""></strong></a>
      <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
        <div class="input-group">
          <span class="border-warningg input-group-text centroSearch text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
          <input type="text" class="form-control border-warningg" style="color:#7a7a7a">
          <button class="btn corSearch text-white">Pesquisar</button>
        </div>
      </div>
      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <div class="ms-auto d-none d-lg-block">
          <div class="input-group">
            <span class="border-warningg input-group-text centroSearch text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" class="form-control border-warningg" style="color:#7a7a7a">
            <button class="btn corSearch text-white">Pesquisar</button>
          </div>
        </div>
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase navegacao" href="../../main.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase navegacao" href="#services">Catálogos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/screen/services/services.php">Serviços</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
          <?php 
            if(isset($_SESSION["email"]) && $_SESSION["email"] !== null && $_SESSION["email"] !== "" && !$_SESSION["PRESTADOR"]) {
              ?>
              <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/screen/profile/perfilcliente.php?email=<?php echo urlencode($_SESSION["email"]); ?>">
                <i class="fa-solid fa-circle-user me-1"></i>
              </a>
              <?php
              } elseif (isset($_SESSION["email"]) && $_SESSION["email"] !== null && $_SESSION["email"] !== "" && $_SESSION["PRESTADOR"]){
              ?>
              <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/screen/profile/perfilprestador.php?email=<?php echo urlencode($_SESSION["email"]); ?>">
                <i class="fa-solid fa-circle-user me-1"></i>
              </a>
              <?php
              } else {
              ?>
              <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/screen/login/login.php">
                Entrar
              </a>
            <?php
            }
          ?>
                </i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container emp-profile">
    <div id="showErrorMessageInvalidPass" style="display:none;" class="alert alert-danger" role="alert">
      Senha atual incorreta
      <button type="button" class="close" onclick="fecharAlerta()">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <form method="post" action="../../updateUserAccount.php" id="updateFormCliente" name="updateFormCliente" enctype="multipart/form-data" onsubmit="return validarSenhaAtual();">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <?php
                  $email = $_SESSION["email"] ?? null;

                  if (!empty($email)) {
                      $sql = "SELECT * FROM Prestador WHERE email = '$email'";
                      $result = $con->query($sql);

                      if ($result->num_rows > 0) {
                          $row = $result->fetch_assoc();

                          echo '<img class="imagemPessoa" src="data:image/png;base64,' . base64_encode($row["Foto_Perfil"]) . '"/>';
                      }
                  }
                ?>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                <div class="file btn btn-lg btn-primary">
                    Mudar foto
                    <input type="file" name="imagem" placeholder="imagem"/>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <?php
                $email = $_SESSION["email"] ?? null;

                if (!empty($email)) {
                    $sql = "SELECT * FROM Prestador WHERE email = '$email'";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $nome = $row["Nome"];
                        $tipo_servico = $row["Servico_Prestado"];
                        $avaliacao = $row["Avaliacao"];

                        echo '<h5>' . $nome . '</h5>';
                        echo '<h6>' . $tipo_servico . '</h6>';
                        echo '<p class="proile-rating">Avaliação : <span>' . $avaliacao . '/5</span></p>';
                    } else {
                        echo "Usuário não encontrado.";
                    }
                }
                ?>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sobre</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2 flex-column justify-content-evenly">
            <button type="submit" class="profile-edit-btn" name="btnSave" value="Salvar">Salvar</button>
            <button type="button" class="profile-edit-btn bg-danger text-white" onclick="del_account()">Deletar Conta</button>
            <script>
                function del_account() {
                    if (confirm("Deletar sua conta?")) {
                        window.location.href = "../../deleteUserAccount.php";
                    }
                }
            </script>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <p>Contato</p>
                <div class="row">
                    <?php
                    $email = $_SESSION["email"] ?? null;

                    if (!empty($email)) {
                        $sql = "SELECT * FROM Prestador WHERE email = '$email'";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $telefone = $row["Telefone"];
                            ?>
                                  <p>Telefone: <input type="text" placeholder="<?php echo $telefone ?>" value="<?php echo $telefone ?>" id="telUser" name="telUser" autocomplete="off"
                                                        pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})"
                                                        title="Número de telefone precisa ser no formato (99) 9999-9999"></p><br/>
                            <?php
                        }
                    }
                    ?>
                </div>
                <p>Email: <?php echo $_SESSION["email"]; ?></p><br/>
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <?php
                    $email = $_SESSION["email"] ?? null;

                    if (!empty($email)) {
                        $sql = "SELECT * FROM Prestador WHERE email = '$email'";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $nome = $row["Nome"];
                            $tipo_servico = $row["Servico_Prestado"];
                            $avaliacao = $row["Avaliacao"];

                            $sql_servicos = "SELECT Nome_servico FROM Servico";
                            $result_servicos = $con->query($sql_servicos);
                            $servicosDisponiveis = array();
                            while ($row_servico = $result_servicos->fetch_assoc()) {
                                $servicosDisponiveis[] = $row_servico['Nome_servico'];
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nome</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="<?php echo $nome ?>" value="<?php echo $nome ?>" id="nameUser" name="nameUser">
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Serviço</label>
                              </div>
                              <div class="col-md-6">
                                <select class="form-style" id="servicoPrestador" name="servicoPrestador" aria-placeholder="Selecione um Serviço" autocomplete="off">
                                  <option value="" disabled>Selecione um serviço</option>
                                  <?php
                                  foreach ($servicosDisponiveis as $servico) {
                                      $selected = ($servico == $tipo_servico) ? 'selected' : '';
                                      echo "<option value='" . htmlspecialchars($servico) . "' $selected>" . htmlspecialchars($servico) . "</option>";
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <?php
                        }
                        else {
                            echo "Usuário não encontrado.";
                        }
                    }
                    ?>
                    <div class="profile-head">
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Alterar senha</a>
                            </li>
                          </ul>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label>Sua senha atual</label>
                              </div>
                              <div class="col-md-6">
                                <input type="password" placeholder="" 
                                id="senhaAtual" 
                                name="senhaAtual"
                                oninput="inserirSenhaNova()">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="senhaNova">Nova senha</label>
                              </div>
                              <div class="col-md-6">
                                <input type="password" placeholder="" id="senhaNova" name="senhaNova" 
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}" 
                                title="A senha deve conter pelo menos 8 caracteres, incluindo pelo menos um dígito, uma letra minúscula, uma letra maiúscula e um caractere especial."
                                oninput="validarSenhaNova()">
                              </div>
                          </div>
                </div>
            </div>
        </div>
    </div>
</form>
    </div>
    <footer class="bg-dark">
      <div class="footer-top">
        <div class="container">
          <div class="row gy-5">
            <div class="col-lg-3 col-sm-6">
              <a href="../../main.php"> <img class="logoFotter" src="/Images/Logo/logopng1.png" alt=""></a>
              <div class="line"></div>
              <p>Nosso trabalho é fazer o melhor caminho entre você e o prestador de serviços ideal.</p>
              <div class="social-icons">
                <a href="https://github.com/jessicamonteir/Callit"><i class="ri-github-fill"></i></a>
                <a href="#"><i class="ri-whatsapp-line"></i></a>
                <a href="#"><i class="ri-mail-line"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <h5 class="mb-0 text-white">Serviços</h5>
              <div class="line"></div>
              <ul>
                <li><a href="#">Limpeza</a></li>
                <li><a href="#">Cozinheiro</a></li>
                <li><a href="#">Aula Particular</a></li>
                <li><a href="#">Faz Tudo</a></li>
                <li><a href="#">Jardinagem</a></li>
                <li><a href="#">Eletricista</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-sm-6">
              <h5 class="mb-0 text-white">Sobre Nós</h5>
              <div class="line"></div>
              <ul>
                <li><a href="../../main.php">Callit</a></li>
                <li><a href="/screen/services/services.php">Serviços</a></li>
                <li><a href="#about">Informações</a></li>
                <li><a href="#reviews">Avaliações</a></li>
                <li><a href="#criadores">Criadores</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-sm-6">
              <h5 class="mb-0 text-white">Nos Contate!</h5>
              <div class="line"></div>
              <ul>
                <li>R. Imac. Conceição, 1155</li>
                <li>Curitiba</li>
                <li>80215-901</li>
                <li>support@callit.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
      
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function fecharAlerta() {
      document.getElementById('showErrorMessageInvalidPass').style.display = "none";
  }

  function validarSenhaAtual() {
    const senhaAtualEnviada = document.getElementById('senhaAtual').value;
    const senhaAtualBanco = '<?php echo $senhaAtualCriptografada; ?>';
    let senhaAtualEnviadaCriptografada;

    if (senhaAtualEnviada) {
        const dados = { senhaAtual: senhaAtualEnviada };
        $.ajax({ 
            url: '../../senhaAtualVerdadeira.php',
            type: 'POST',
            data: dados,
            async: false,     
            success: function(data) { 
              senhaAtualEnviadaCriptografada = data;
            },
        });

        if (senhaAtualEnviadaCriptografada === senhaAtualBanco)
        {
          return true;
        }
        else
        {
          document.getElementById('showErrorMessageInvalidPass').style.display = "block";
          return false;
        }
    } else {
        if (document.getElementById('senhaNova').value) {
            document.getElementById('showErrorMessageInvalidPass').style.display = "block";
            return false;
        } else {
            return true;
        }
    }
  }

  function validarSenhaNova() {
      var senhaNova = document.getElementById('senhaNova').value;
      var senhaAtualInput = document.getElementById('senhaAtual');
      
      if (senhaNova.trim() !== '') {
          senhaAtualInput.required = true;
      } else {
          senhaAtualInput.required = false;
      }
  }

  function inserirSenhaNova() {
      var senhaAtual = document.getElementById('senhaAtual').value;
      var senhaNovaInput = document.getElementById('senhaNova');
      
      if (senhaAtual.trim() !== '') {
        senhaNovaInput.required = true;
      } else {
        senhaNovaInput.required = false;
      }
  }
</script>
</html>