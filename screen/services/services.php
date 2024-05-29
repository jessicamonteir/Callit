<?php
  session_start();

  include('../../conn.php');
  $s_name = session_name();
  $offset     = 3*60*60;                              // converte 3 houras para segundos
  $dateFormat = "d/m/Y h:i:s";                        // formata dia/mês/ano hora:minuto:segundo
  $timeNdate  = gmdate($dateFormat, time()-$offset);  // Data Hora na timezone Brasil/BSB

  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
      // último request foi há mais de 1 minuto atrás
      session_unset();     // libera (unset) todas as variáveis de sessão 
      session_destroy();   // destrói (destroy) todos os dados de sessão do atual usuário
      // A sessão acabou de expirar
      // Esse é o momento para desviar a página para a "página inicial" ou para a "página de login" do site
      header('Location: /Callit/screen/login/login.php');
  }
  $_SESSION['LAST_ACTIVITY'] = time(); // Atualiza time stamp da última atividade realizada  
  ?>    

<script>
function updateTime() {
      const timeElement = document.getElementById('time');
      const now = new Date();
      const hours = now.getHours().toString().padStart(2, '0');
      const minutes = now.getMinutes().toString().padStart(2, '0');
      const seconds = now.getSeconds().toString().padStart(2, '0');
      const timeString = `${hours}:${minutes}:${seconds}`;
      timeElement.textContent = timeString;

}

setInterval(updateTime, 1000); // Atualiza a cada segundo
updateTime(); // Chama a função para exibir o tempo atual imediatamente
</script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="services.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <title>Serviços</title>
</head>
<body>
<?php 
  if (($_SESSION['USUARIO'] == TRUE)){
  }
  elseif (($_SESSION['PRESTADOR'] == TRUE)){
    echo '<script type="text/javascript">',
    'document.addEventListener("DOMContentLoaded", function() {',
    'prestadorScreen();',
    '});',
    '</script>';
  }elseif (($_SESSION['ADMIN'] == TRUE)){
    echo '<script type="text/javascript">',
    'document.addEventListener("DOMContentLoaded", function() {',
    'admScreen();',
    '});',
    '</script>';
  }
  else{
    header('Location: /Callit/screen/login/login.php');
    exit;}
  
?>

  <script type="text/javascript">
    function prestadorScreen() {
      document.documentElement.style.setProperty('--main-color', '#75df74');
      document.documentElement.style.setProperty('--light-main', '#9fffac');
      document.querySelector('.navlogo').src = '/Callit/Images/Logo/logopnglightgreen.png';
      document.querySelector('.logoFotter').src = '/Callit/Images/Logo/logolight1.png';
    }
    function admScreen() {
      document.documentElement.style.setProperty('--main-color', '#ff7676');
      document.documentElement.style.setProperty('--light-main', '#ff7676');
    }
  </script>
  <!--Nav-->
  <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand navegacao" href="/Callit/main.php"><strong><img src="/Callit/Images/Logo/caliit.png" alt="Callit Logo"></strong></a>
      <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
        <div class="input-group">
          <span class="border-warningg input-group-text centroSearch text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
          <input type="text" id="pesquisa-mobile" placeholder="Pesquise por um prestador" class="form-control border-warningg" style="color:#7a7a7a">
          <button type="button" class="btn corSearch text-white" onclick="pesquisar('pesquisa-mobile')">Pesquisar</button>
        </div>
      </div>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <div class="ms-auto d-none d-lg-block">
          <div class="input-group">
            <span class="border-warningg input-group-text centroSearch text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" id="pesquisa-desktop" placeholder="Pesquise por um prestador" class="form-control border-warningg" style="color:#7a7a7a">
            <button type="button" class="btn corSearch text-white linkskheader btnheader" onclick="pesquisar('pesquisa-desktop')">Pesquisar</button>
              </div>
            </div>
            <script>
    function pesquisar(inputId) {
      var nome = document.getElementById(inputId).value;
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../../pesquisar.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          try {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
              window.location.href = "/Callit/screen/profile/perfilprestador.php?email=" + encodeURIComponent(response.email);
            } else {
              alert(response.message || "Nenhum resultado encontrado");
            }
          } catch (e) {
            console.error("Erro ao analisar JSON: ", e);
            console.error("Resposta do servidor: ", xhr.responseText);
          }
        }
      };
      xhr.send("nome=" + encodeURIComponent(nome));
    }
  </script>
            <ul class="navbar-nav ms-auto ">
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase navegacao linkskheader" href="/Callit/main.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase navegacao linkskheader" href="/Callit/main.php#services">Catálogos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase navegacao linkskheader" href="/Callit/screen/services/services.php">Serviços</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto ">
              <li class="nav-item">
              <?php 
                if(isset($_SESSION["email"]) && $_SESSION["email"] !== null && $_SESSION["email"] !== "" && $_SESSION["USUARIO"]) {
                ?>
                <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/screen/profile/perfilcliente.php?email=<?php echo urlencode($_SESSION["email"]); ?>">
                <?php
                          $sql = "SELECT * FROM Usuario WHERE email = '".$_SESSION["email"]."'";
                          $result = $con->query($sql);

                          if ($result->num_rows > 0) {
                              $row = $result->fetch_assoc();

                              echo '<img id="imgperfilheadercliente" class="imagemPessoa" src="data:image/png;base64,' . base64_encode($row["Foto_Perfil"]) . '"/>';
                          }
                    ?> 
                </a>
                <?php
                } elseif (isset($_SESSION["email"]) && $_SESSION["email"] !== null && $_SESSION["email"] !== "" && $_SESSION["PRESTADOR"]){
                ?>
                <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/screen/profile/perfilprestador.php?email=<?php echo urlencode($_SESSION["email"]); ?>">
                <?php
                          $sql = "SELECT * FROM Prestador WHERE email = '".$_SESSION["email"]."'";
                          $result = $con->query($sql);

                          if ($result->num_rows > 0) {
                              $row = $result->fetch_assoc();

                              echo '<img id="imgperfilheaderprestador" class="imagemPessoa" src="data:image/png;base64,' . base64_encode($row["Foto_Perfil"]) . '"/>';
                          }
                    ?> 
                </a>
                <?php
                }elseif (isset($_SESSION["email"]) && $_SESSION["email"] !== null && $_SESSION["email"] !== "" && $_SESSION["ADMIN"]){
                  ?>
                  <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/screen/profile/admin.php">
                    Gerenciar Perfis
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

  <div class="container bg-white">
    <nav class="navbarsrv navbar-expand-md navbar-light">
        <div class="container-fluid p-0"> <a class="navbar-brand text-uppercase fw-800" href="#"><span class="border-red pe-2">Callit</span></a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="myNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button>
            <div class="collapse navbar-collapse" id="myNav">
                <div class="navbar-navsrv ms-auto"> <select  id="opcao" class="nav-linksrv selectfiltro" onchange="mudaropcao()"><option  value="Avaliacao">Mais bem avaliados</option><option value="Nome">Ordem alfabética</option><option value="Id_Prestador">Cadastros mais recentes</option></select><a class="nav-linksrv filtros active" aria-current="page" href="#" data-service="Em Alta">Em Alta</a> <a class="nav-linksrv filtros" href="#" data-service="Pedreiro">Pedreiro</a> <a class="nav-linksrv filtros" href="#" data-service="Eletricista">Eletricista</a> <a class="nav-linksrv filtros" href="#" data-service="Pintor">Pintor</a> <a class="nav-linksrv filtros" href="#" data-service="Jardinagem">Jardinagem</a> <a class="nav-linksrv filtros" href="#" data-service="Encanador">Encanador</a> </div>
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelectorAll('.filtros').forEach(function(link) {
                        link.addEventListener('click', function(event) {
                            var service = this.getAttribute('data-service');
                            var opcao =document.getElementById('opcao').value
                            document.querySelectorAll('.filtros').forEach(function(link) {
                              link.classList.remove('active');
                            });
                            this.classList.add("active");
                            
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "/Callit/mudarFiltro.php", true);
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    document.querySelector('.row').innerHTML = xhr.responseText;
                                }
                            };
                            xhr.send(`service=${service}&filtro=${opcao}`);
                        });
                    });
                    

                });
                function mudaropcao(){
                
                     
                      var activeLink = document.querySelector('.filtros.active');
                      var opcao =document.getElementById('opcao').value
                      var service = activeLink.getAttribute('data-service');
                      var xhr = new XMLHttpRequest();
                      xhr.open("POST", "/Callit/mudarFiltro.php", true);
                      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                      xhr.onload = function () {
                        console.log(opcao)
                          if (xhr.status === 200) {
                              document.querySelector('.row').innerHTML = xhr.responseText;
                          }
                      };
                      xhr.send(`service=${service}&filtro=${opcao}`);
                };
                    
                  
                </script>
            </div>
        </div>
    </nav>
    <!--Areas-->
    <div class="row">
    <?php
      $sql = "SELECT * FROM Prestador";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              ?>
              <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                  <div class="product"> <img src="data:image/png;base64, <?php echo base64_encode($row["Foto_Perfil"]); ?>" alt="">
                      <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                          <a href="/Callit/screen/profile/perfilprestador.php?email=<?php echo urlencode($row["Email"]); ?>"><li class="icon"><i class="ri-user-fill"></i></li></a>
                      </ul>
                  </div>
                  <?php
                  echo "<div class='tag bg-".$row["Servico_Prestado"]."'>"; echo $row["Servico_Prestado"]; ?></div>
                  <div class="title pt-4 pb-1"><?php echo $row["Nome"]; ?></div>
                  <div class="d-flex align-content-center justify-content-center">
                      <?php
                      $rating = $row["Avaliacao"];
                      for ($i = 0; $i < 5; $i++) {
                          if ($rating >= 1) {
                              echo '<span class="fas fa-star"></span>';
                          } elseif ($rating >= 0.5) {
                              echo '<span class="fas fa-star-half-alt" style="color: goldenrod; font-size: 0.65rem;"></span>';
                          } else {
                              echo '<span class="far fa-star"></span>';
                          }
                          $rating--;
                      }
                      ?>
                  </div>
              </div>
          <?php
          }
      } else {
          echo "Nenhum prestador encontrado.";
      }
      ?>
    </div>
  </div>
</div>

<!--FOOTER-->

<footer class="bg-dark">
    <div class="footer-top">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-3 col-sm-6">
            <a href="../../main.php"> <img class="logoFotter" src="/Callit/Images/Logo/logopng1.png"></a>
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
              <li><a href="/Callit/screen/services/services.php">Serviços</a></li>
              <li><a href="../../main.php">Informações</a></li>
              <li><a href="../../main.php">Avaliações</a></li>
              <li><a href="../../main.php">Criadores</a></li>
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

  <script script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>