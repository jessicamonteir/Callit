
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="/Callit/css.css">
    <link rel="stylesheet" href="CadastroCont.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    
  </head>
  <body>

    <!--Nav-->

      <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand navegacao" href="/Callit/main.php"><strong><img src="/Callit/Images/Logo/caliit.png" ></strong></a>
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
                <a class="nav-link mx-2 text-uppercase navegacao" href="main.php">Home</a>
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
                if(isset($_SESSION["email"]) && $_SESSION["email"] !== null) {
                  ?>
                  <script>
                    console.log(
                      <?php 
                      $_SESSION["email"];
                    ?>)
                  </script>
                  <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/screen/profile/perfilcliente.php">
                    <i class="fa-solid fa-circle-user me-1">
                  <?php
                } else {
                  ?>
                  <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/screen/login/login.php">
                    <i class="fa-solid fa-circle-user me-1"></i>
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
      <form>
      <div class="container text-center">
      <div class="row">
        <div class="col">
        </div>   
      <div class="col">
      <div class="card-back">
        <h1>Insira mais informações sobre você</h1>
        
  
                <p>Tipo de cadastro</p>
                <select class="tipodeconta" name="tipodeconta" id="tipodeconta" onChange="mudarTipo()">
                    <option value="cliente">Cliente</option>
                    <option value="prestador">Prestador</option>
                </select>
            
            <script>
                function mudarTipo(){
                var tipo = document.getElementById("tipodeconta")
                var escolha = tipo.value
                if (escolha == "cliente"){
                    document.getElementById("cadastrocliente").style.display="block";
                    document.getElementById("cadastroprestador").style.display="none";
                }
                if (escolha == "prestador"){
                    document.getElementById("cadastrocliente").style.display="none";
                    document.getElementById("cadastroprestador").style.display="block";
                }
                }
            </script>
            <div id="cadastrocliente">
                <p>CEP<p>
                <input type="text" placeholder="CEP">
                <p>CPF<p>
                <input type="text" placeholder="CPF">
                <p>Telefone para contato<p>
                <input type="text" placeholder="Telefone">
            </div>
            <div id="cadastroprestador">
            <p id="tiposervico">Tipo de serviço<p>
                <select id="escolhaserviço">
                  <option>Jardinagem</option>
                  <option>Culinária</option>
                  <option>Aulas particulares</option>
                  <option>Eletricista</option>
                  <option>Faz tudo</option>
              </select>
                <p>Telefone<p>
                <input type="text" placeholder="Telefone para contato">
                <p>CPF<p>
                <input type="text" placeholder="CPF">
            </div>
               <input class="btncadastro mt-4" id="botaocadastro "type="button" value="Cadastrar"> 
              </div>
              
        </form>
        </div>
        <div class="col">
              </div>
              </div>
              </div>

    
    <footer class="bg-dark">
      <div class="footer-top">
        <div class="container">
          <div class="row gy-5">
            <div class="col-lg-3 col-sm-6">
              <a href="main.php"> <img class="logoFotter" src="Images/Logo/logopng1.png" alt=""></a>
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
                <li><a href="main.php">Callit</a></li>
                <li><a href="screen/services/services.php">Serviços</a></li>
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