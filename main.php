<?php 
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"rel="stylesheet"/>
    <link rel="stylesheet" href="css.css">
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
            <a class="navbar-brand navegacao" href="/Callit/main.php"><strong><img src="/Callit/Images/Logo/caliit.png"></strong></a>
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
                <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/screen/login/login.php">
                  <i class="fa-solid fa-circle-user me-1"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
<!--Primeira Parte-->

      <section id="hero" class="min-vh-100 d-flex align-items-center text-center">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1 class="text-uppercase text-white fw-semibold display-1" data-aos="fade-right" data-aos-delay="60">Bem vindo à Callit!</h1>
              <h5 class="text-white mt-3 mb-4"data-aos="fade-left" data-aos-delay="60">Plataforma Freelancer para trabalhos domésticos.</h5>
              <div data-aos="fade-up" data-aos-delay="60">
                <a href="screen/login/login.php" class="btn btn-brand aHomePage me-2">Comece já!</a>
                <a href="#" class="btn btn-light aHomePage ms-2">Nos contate!</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--Segunda Parte-->
      <section id="about" class="section-padding">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
              <div class="section-title">
                <h1 class="display-4 fw-semibold">Sobre nós</h1>
                <div class="line"></div>
                <p>Nosso trabalho é fazer o melhor caminho entre você e o prestador de serviços ideal.</p>
                </div>
              </div>
            </div>
            <div class="row justify-content-between align-items-center"data-aos="fade-down"  data-aos-delay="150">
              <div class="col-lg-6 resizejardineiro" data-aos="fade-down" data-aos-delay="150">
                <img src="./Images/HomePage/Jardineiro.png" alt="">
              </div>
              <div class="col-lg-5">
                <h1>Sobre Callit</h1>
                <p class="mt-3 mb-4">Callit é uma plataforma Freelancer, a qual facilita, tanto para o empregador, quanto para o empregado, os agendamentos e serviços.</p>
                <div class="d-flex pt-4 mb-3">
                  <div class="iconbox me-4">
                    <i class="ri-shield-check-line"></i>
                  </div>
                  <div>
                    <h5>Uma Empresa Segura</h5>
                    <p>Em caso de qualquer contratempo, você será imediatamente reembolsado.</p>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <div class="iconbox me-4">
                    <i class="ri-user-5-fill"></i>
                  </div>
                  <div>
                    <h5>Prestadores Confiáveis</h5>
                    <p>Antes de qualquer permissão para o uso do app, funcionários possuem o seu histórico análisado.</p>
                  </div>
                </div>
                <div class="d-flex">
                  <div class="iconbox me-4">
                    <i class="ri-money-dollar-box-line"></i>
                  </div>
                  <div>
                    <h5>Melhor Preço</h5>
                    <p>Você pode negociar com o prestador e encontrar o preço ideal, pelo trabalho ideal.</p>
                  </div>
                </div>
              </div> 
            </div>
          </div>
      </section>

      <!--Terceira Parte-->

      <section id="services" class="section-padding border-top">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <div class="section-title">
                <h1 class="display-4 fw-semibold"data-aos="fade-down" data-aos-delay="100">Serviços</h1>
                <div class="line"></div>
                <pdata-aos="fade-down" data-aos-delay="100">Temos uma grande variedade de serviços, então, qualquer coisa que desejar, temos como te ajudar!</pdata-aos=>
              </div>
            </div>
          </div>
          <div class="row g-4 text-center">
            <div class="col-lg-4 col-sm-6"data-aos="fade-down" data-aos-delay="150">
              <div class="service theme-shadow p-lg-5 p-4">
                <div class="iconbox">
                  <i class="ri-graduation-cap-line"></i>
                </div>
                <h5 class="mt-4 mb-3">Aula Particular</h5>
                <p>Um reforço para matemática, física, português e muito mais!</p>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"data-aos="fade-down" data-aos-delay="250">
              <div class="service theme-shadow p-lg-5 p-4">
                <div class="iconbox">
                  <i class="ri-restaurant-line"></i>
                </div>
                <h5 class="mt-4 mb-3">Culinária</h5>
                <p>Está afim de comer em casa hoje? É só chamar!</p>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"data-aos="fade-down" data-aos-delay="350">
              <div class="service theme-shadow p-lg-5 p-4">
                <div class="iconbox">
                  <i class="ri-lightbulb-flash-line"></i>
                </div>
                <h5 class="mt-4 mb-3">Eletricista</h5>
                <p>Hoje é dia de consertar aquela lâmpada queimada!</p>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"data-aos="fade-down" data-aos-delay="450">
              <div class="service theme-shadow p-lg-5 p-4">
                <div class="iconbox">
                  <i class="ri-briefcase-2-fill"></i>
                </div>
                <h5 class="mt-4 mb-3">Faz Tudo</h5>
                <p>Contrate agora alguém que seja pau para toda obra!</p>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"data-aos="fade-down" data-aos-delay="550">
              <div class="service theme-shadow p-lg-5 p-4">
                <div class="iconbox">
                  <i class="ri-plant-line"></i>
                </div>
                <h5 class="mt-4 mb-3">Jardinagem</h5>
                <p>Deixe a sua grama mais verde que a do vizinho!</p>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"data-aos="fade-down" data-aos-delay="650">
              <div class="service theme-shadow p-lg-5 p-4">
                <div class="iconbox">
                  <i class="ri-home-4-line"></i>
                </div>
                <h5 class="mt-4 mb-3">Serviço Doméstico</h5>
                <p>Deixe o seu chão brilhando e cheiroso agora mesmo!</p>
              </div>
            </div>
          </div>
          </div>
      </div>
     </section>

     <!--Contador-->
     <section id="counter" class="section-padding">
        <div class="container text-center">
          <div class="row g-4" data-aos="fade-up" data-aos-delay="60">
            <div class="col-lg-3 col-sm-6">
              <h1 class="text-white display-4">7</h1>
              <h6 class="text-uppercase mb-0 text-white mt-3">Clientes Fiéis</h6>
            </div>
            <div class="col-lg-3 col-sm-6">
              <h1 class="text-white display-4">1000+</h1>
              <h6 class="text-uppercase mb-0 text-white mt-3">Prestadores</h6>
            </div>
            <div class="col-lg-3 col-sm-6">
              <h1 class="text-white display-4">5+</h1>
              <h6 class="text-uppercase mb-0 text-white mt-3">Tipos de Serviços</h6>
            </div>
            <div class="col-lg-3 col-sm-6">
              <h1 class="text-white display-4">10+</h1>
              <h6 class="text-uppercase mb-0 text-white mt-3">cinco Estrelas</h6>
            </div>
          </div>
        </div>
     </section>

     <!--Reviews-->

     <section id="reviews" class="section-padding bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <div class="section-title">
              <h1 class="display-4 fw-semibold" data-aos="fade-down"data-aos-delay="100">Avaliações</h1>
              <div class="line" data-aos="fade-down"data-aos-delay="100"></div>
              <p data-aos="fade-down"data-aos-delay="100">Vamos ver o que nossos clientes acham de nossa plataforma?</p>
            </div>
          </div>
        </div>
        <div class="row gy-5 gx-4">
          <div class="col-lg-4 col-sm-6">
            <div class="review">
              <div class="review-head p-4 bg-white theme-shadow"data-aos="fade-up" data-aos-delay="50">
                <div class="text-warning">
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                </div>
                <p>Talvez o melhor site de todos os tempos, nem eu, Ryan Gosling, sou tão incrível!</p>
              </div>
              <div class="review-person mt-4 d-flex align-items-center">
                <img class="reviewer rounded-circle" src="Images/HomePage/GoslingReview.jpg" alt="">
                <div class="ms-3">
                  <h5>Ryan Gosling</h5>
                  <small>Dublê</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="review">
              <div class="review-head p-4 bg-white theme-shadow"data-aos="fade-up" data-aos-delay="150">
                <div class="text-warning">
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                </div>
                <p>Este site está aprovado por verdadeiros patriotas! Tá Okay?? Não vi nenhum bandido neste site!</p>
              </div>
              <div class="review-person mt-4 d-flex align-items-center">
                <img class="reviewer rounded-circle" src="Images/HomePage/mito.jpeg" alt="">
                <div class="ms-3">
                  <h5>Jair Bolsonaro</h5>
                  <small>Ex-presidente do Brasil</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="review">
              <div class="review-head p-4 bg-white theme-shadow"data-aos="fade-up" data-aos-delay="300">
                <div class="text-warning">
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                </div>
                <p>Sensacional! Nem com 4 braços eu faria tanto quanto este site!</p>
              </div>
              <div class="review-person mt-4 d-flex align-items-center">
                <img class="reviewer rounded-circle" src="Images/HomePage/Ben10.jpeg" alt="">
                <div class="ms-3">
                  <h5>Ben 10</h5>
                  <small>Herói</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="review">
              <div class="review-head p-4 bg-white theme-shadow"data-aos="fade-up" data-aos-delay="450">
                <div class="text-warning">
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                </div>
                <p>I really really... uhhh... this Callit is great you know?... God bless America.</p>
              </div>
              <div class="review-person mt-4 d-flex align-items-center">
                <img class="reviewer rounded-circle" src="Images/HomePage/biden.jpeg" alt="">
                <div class="ms-3">
                  <h5>Joe Biden</h5>
                  <small>President of USA</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="review">
              <div class="review-head p-4 bg-white theme-shadow"data-aos="fade-up" data-aos-delay="600">
                <div class="text-warning">
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                </div>
                <p>Callit é incrível! Receba pai, sabe cumé? O melhor do brasil! siuuu CR7.</p>
              </div>
              <div class="review-person mt-4 d-flex align-items-center">
                <img class="reviewer rounded-circle" src="Images/HomePage/pedreiro.jpeg" alt="">
                <div class="ms-3">
                  <h5>Luva de Pedreiro</h5>
                  <small>Intelectual</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="review">
              <div class="review-head p-4 bg-white theme-shadow"data-aos="fade-up" data-aos-delay="750">
                <div class="text-warning">
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                </div>
                <p>Moooo... Mooo Moooo!</p>
              </div>
              <div class="review-person mt-4 d-flex align-items-center">
                <img class="reviewer rounded-circle" src="Images/HomePage/Mooo.jpeg" alt="">
                <div class="ms-3">
                  <h5>Vaca</h5>
                  <small>Servidor Público</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </section>

    <!--Criadores-->
    <section id="criadores" class="section-padding" #swiperRef="" data-aos="fade-up"data-aos-delay="100">
      <div class="container swiper mySwiper">
        <div class="row">
          <div class="col-12 text-center">
            <div class="section-title">
              <h1 class="display-4 fw-semibold">Criadores</h1>
              <div class="line"></div>
              <p>Estas pessoas lindas foram os criadores do site, ideia e apresentação, passe o seu mouse por cime de cada um para saber mais de seu papel.</p>
            </div>
          </div>
        </div>
        <div class="text-center swiper-wrapper">
          <div class="col-md-4 swiper-slide">
            <div class="team-member image-zoom">
              <div class="image-zoom-warpper">
                <img src="/Callit/Images/HomePage/ryan-gosling.jpg" alt="">
              </div>
              <div class="team-member-content">
                <h4 class="text-white">Pedro Dallanora</h4>
                <p class="mb-0 text-white">Desenvolvedor Front-End</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 swiper-slide">
            <div class="team-member image-zoom">
              <div class="image-zoom-warpper">
                <img src="Images/HomePage/ryan-gosling.jpg" alt="">
              </div>
              <div class="team-member-content">
                <h4 class="text-white">Francisco Martins</h4>
                <p class="mb-0 text-white">Desenvolvedor Front-End</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 swiper-slide">
            <div class="team-member image-zoom">
              <div class="image-zoom-warpper">
                <img src="Images/HomePage/ryan-gosling.jpg" alt="">
              </div>
              <div class="team-member-content">
                <h4 class="text-white">Theo Nicoleli</h4>
                <p class="mb-0 text-white">Desenvolvedor Back-End</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 swiper-slide">
            <div class="team-member image-zoom">
              <div class="image-zoom-warpper">
                <img src="Images/HomePage/ryan-gosling.jpg" alt="">
              </div>
              <div class="team-member-content">
                <h4 class="text-white">Felipe Schneider</h4>
                <p class="mb-0 text-white">Desenvolvedor BD</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 swiper-slide">
            <div class="team-member image-zoom">
              <div class="image-zoom-warpper">
                <img src="Images/HomePage/ryan-gosling.jpg" alt="">
              </div>
              <div class="team-member-content">
                <h4 class="text-white">Jessica</h4>
                <p class="mb-0 text-white">Desenvolvedora Front-End</p>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!--FOOTER-->
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

    <script src="/Callit/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>