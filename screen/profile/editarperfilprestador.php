<?php
  session_start();

  include('../../conn.php');
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
    <link rel="stylesheet" href="/css.css">
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
            <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/screen/profile/perfilcliente.php">
              <i class="fa-solid fa-circle-user me-1"></i>
            </a>
            <?php
            } elseif (isset($_SESSION["email"]) && $_SESSION["email"] !== null && $_SESSION["email"] !== "" && $_SESSION["PRESTADOR"]){
            ?>
            <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/screen/profile/perfilprestador.php">
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
      <form method="post" action="../../updateUserAccount.php">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                <div class="file btn btn-lg btn-primary">
                    Mudar foto
                    <input type="file" name="file"/>
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
            <button type="submit" class="profile-edit-btn" name="btnSave" value="Salvar"><a href="perfilprestador.php">Salvar</a></button>
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

                            echo '<p>Telefone: <input type="text" placeholder="' . $telefone . '" value="' . $telefone . '" id="telUser" name="telUser"></p><br/>';
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

                            echo '<div class="row">';
                            echo '<div class="col-md-6">';
                            echo '<label>Nome</label>';
                            echo '</div>';
                            echo '<div class="col-md-6">';
                            echo '<input type="text" placeholder="'. $nome . '" value="' . $nome . '" id="nameUser" name="nameUser"></p>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="row">';
                            echo '<div class="col-md-6">';
                            echo '<label>Serviço</label>';
                            echo '</div>';
                            echo '<div class="col-md-6">';
                            echo '<select class="form-style" id="servicoPrestador" name="servicoPrestador" aria-placeholder="Selecione um Serviço" autocomplete="off">';
                            echo '<option value="" disabled>Selecione um serviço</option>';
                            foreach ($servicosDisponiveis as $servico) {
                                $selected = ($servico == $tipo_servico) ? 'selected' : '';
                                echo "<option value='" . htmlspecialchars($servico) . "' $selected>" . htmlspecialchars($servico) . "</option>";
                            }
                            echo '</select>';
                            echo '</div>';
                            echo '</div>'; 
                        }
                        else {
                            echo "Usuário não encontrado.";
                        }
                    }
                    ?>
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
</html>