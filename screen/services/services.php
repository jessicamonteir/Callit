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
<!--Nav-->
    <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand navegacao" href="../../main.php"><strong><img src="/Images/Logo/caliit.png" alt=""></strong></a>
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
                <a class="nav-link mx-2 text-uppercase navegacao" href="/screen/services/services.php">Serviços</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto ">
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase navegacao" href="/screen/profile/editarperfilcliente.php">
                  <i class="fa-solid fa-circle-user me-1"></i>
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
                <div class="navbar-navsrv ms-auto"> <a class="nav-linksrv active" aria-current="page" href="#">Em Alta</a> <a class="nav-linksrv" href="#">Aulas Particulares</a> <a class="nav-linksrv" href="#">Culinária</a> <a class="nav-linksrv" href="#">Eletricista</a> <a class="nav-linksrv" href="#">Faz Tudo</a> <a class="nav-linksrv" href="#">Jardinagem</a> <a class="nav-linksrv" href="#">Serviço Doméstico</a> </div>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="/Images/imagensServicos/professora1.jpg" alt=""> 
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="star">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-half-fill text-warning"></i>
                    </li>
                </ul>
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <a href="/screen/profile/perfilprestador.php"><li class="icon"><i class="ri-user-fill"></i></li></a>
                </ul>
            </div>
            <div class="tag bg-aula">Aula Particular</div>
            <div class="title pt-4 pb-1">Andressa Lima</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">R$ 60,00</div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="/Images/imagensServicos/Jardineiro2.jpg" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="star">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-half-fill text-warning"></i>
                    </li>
                </ul>
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
                </ul>
            </div>
            <div class="tag bg-jardim">Jardinagem</div>
            <div class="title pt-4 pb-1">Paulo Mimoso</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">R$ 55,00</div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="/Images/imagensServicos/cozinheiro3.jpg" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="star">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-half-fill text-warning"></i>
                    </li>
                </ul>
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                  <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
                </ul>
            </div>
            <div class="tag bg-culinaria">Culinária</div>
            <div class="title pt-4 pb-1">Socrátes da Silva</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">R$ 70,00</div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="/Images/imagensServicos/faztudo1.jpg" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="star">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-line text-warning"></i>
                    </li>
                </ul>
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                  <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
                </ul>
            </div>
            <div class="tag bg-faztudo">Faz Tudo</div>
            <div class="title pt-4 pb-1">Arthur Schopenhauer</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">R$ 60,00</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="/Images/imagensServicos/eletricista1.jpg" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="star">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                    </li>
                </ul>
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                  <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
                </ul>
            </div>
            <div class="tag bg-eletricista">Eletricista</div>
            <div class="title pt-4 pb-1">Fabiano Nietzsche</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">R$ 60,00</div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="/Images/imagensServicos/Jardineiro3.jpg" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="star">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-half-fill text-warning"></i>
                    </li>
                </ul>
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                  <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
                </ul>
            </div>
            <div class="tag bg-jardim">Jardinagem</div>
            <div class="title pt-4 pb-1">Julius Evola II</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">R$ 55,00</div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="/Images/imagensServicos/professor1.jpg" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="star">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-half-fill text-warning"></i>
                    </li>
                </ul>
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                  <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
                </ul>
            </div>
            <div class="tag bg-aula">Aula Particular</div>
            <div class="title pt-4 pb-1">Ayn Randomico</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">R$ 70,00</div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="/Images/imagensServicos/cozinheiro2.jpg" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="star">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                    </li>
                </ul>
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                  <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
                </ul>
            </div>
            <div class="tag bg-culinaria">Culinária</div>
            <div class="title pt-4 pb-1">Josias Tomás de Aquino</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">R$ 60,00</div>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
          <div class="product"> <img src="/Images/imagensServicos/Jardineiro4.jpg" alt="">
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                <li class="star">
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-half-fill text-warning"></i>
                </li>
            </ul>
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
              <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
            </ul>
          </div>
          <div class="tag bg-jardim">Jardinagem</div>
          <div class="title pt-4 pb-1">Alberto Hegel da Silva</div>
          <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
          <div class="price">R$ 60,00</div>
      </div>
      <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
          <div class="product"> <img src="/Images/imagensServicos/professor2.jpeg" alt="">
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                <li class="star">
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                </li>
            </ul>
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
              <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
            </ul>
          </div>
          <div class="tag bg-aula">Aula Particular</div>
          <div class="title pt-4 pb-1">Princesilde Izabel II</div>
          <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
          <div class="price">R$ 55.0</div>
      </div>
      <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
          <div class="product"> <img src="/Images/imagensServicos/eletricista2.jpg" alt="">
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                <li class="star">
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-half-fill text-warning"></i>
                </li>
            </ul>
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
              <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
            </ul>
          </div>
          <div class="tag bg-eletricista">Eletricista</div>
          <div class="title pt-4 pb-1">São Agostinho Carrara</div>
          <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
          <div class="price">R$ 70,00</div>
      </div>
      <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
          <div class="product"> <img src="/Images/imagensServicos/empregada1.jpg" alt="">
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                <li class="star">
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-line text-warning"></i>
                </li>
            </ul>
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
              <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
            </ul>
          </div>
          <div class="tag bg-domestico">Empregado(a)</div>
          <div class="title pt-4 pb-1">Hannah Aranha</div>
          <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
          <div class="price">R$ 60,00</div>
      </div>
  </div>
  <div class="row">
      <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
          <div class="product"> <img src="/Images/imagensServicos/empregada2.jpg" alt="">
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                <li class="star">
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-line text-warning"></i>
                </li>
            </ul>
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
              <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
            </ul>
          </div>
          <div class="tag bg-domestico">Empregado(a)</div>
          <div class="title pt-4 pb-1">Santa Anastacia</div>
          <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
          <div class="price">R$ 60,00</div>
      </div>
      <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
          <div class="product"> <img src="/Images/imagensServicos/Jardineiro5.jpg" alt="">
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                <li class="star">
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-half-fill text-warning"></i>
                </li>
            </ul>
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
              <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
            </ul>
          </div>
          <div class="tag bg-jardim">Jardinagem</div>
          <div class="title pt-4 pb-1">Renan Decarti</div>
          <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
          <div class="price">R$ 55,00</div>
      </div>
      <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
          <div class="product"> <img src="/Images/imagensServicos/faztudo2.jpg" alt="">
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                <li class="star">
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                </li>
            </ul>
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
              <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
            </ul>
          </div>
          <div class="tag bg-faztudo">Faz Tudo</div>
          <div class="title pt-4 pb-1">Napoleão de Almeida</div>
          <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
          <div class="price">R$ 70,00</div>
      </div>
      <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
          <div class="product"> <img src="/Images/imagensServicos/cozinheiro1.png" alt="">
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                <li class="star">
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                    <i class="ri-star-fill text-warning"></i>
                </li>
            </ul>
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
              <a href=""><li class="icon"><i class="ri-user-fill"></i></li></a>
            </ul>
          </div>
          <div class="tag bg-culinaria">Culinária</div>
          <div class="title pt-4 pb-1">Carol Danvers</div>
          <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
          <div class="price">R$ 60,00</div>
      </div>
  </div>
</div>

<!--FOOTER-->

<footer class="bg-dark">
    <div class="footer-top">
      <div class="container">
        <div class="row gy-5">
          <div class="col-lg-3 col-sm-6">
            <a href="../../main.php"> <img class="logoFotter" src="/Images/Logo/logopng1.png"></a>
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
              <li><a href="screen/services/services.php">Serviços</a></li>
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