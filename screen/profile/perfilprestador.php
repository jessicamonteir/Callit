<?php
  session_start();
  include('../../conn.php');

  if(isset($_GET['email'])) 
  {
    $email = $_GET['email'];
  }
  else
  {
    echo "Email não fornecido.";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="perfilprestador.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/calendars/calendar-1/assets/css/calendar-1.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
</head>
<body>
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
              <button class="btn corSearch text-white linkskheader">Pesquisar</button>
            </div>
          </div>
          <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ms-auto d-none d-lg-block">
              <div class="input-group">
                <span class="border-warningg input-group-text centroSearch text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control border-warningg" style="color:#7a7a7a">
                <button class="btn corSearch text-white linkskheader btnheader">Pesquisar</button>
              </div>
            </div>
            <ul class="navbar-nav ms-auto ">
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase navegacao linkskheader" href="/Callit/main.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase navegacao linkskheader" href="#services">Catálogos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2 text-uppercase navegacao linkskheader" href="/Callit/screen/services/services.php">Serviços</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto ">
              <li class="nav-item">
              <?php 
                if(isset($_SESSION["email"]) && $_SESSION["email"] !== null && $_SESSION["email"] !== "" && !$_SESSION["PRESTADOR"]) {
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
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                    <?php
                      if (!empty($email)) {
                          $sql = "SELECT * FROM Prestador WHERE email = '$email'";
                          $result = $con->query($sql);

                          if ($result->num_rows > 0) {
                              $row = $result->fetch_assoc();

                              echo '<img id="imgperfil" class="imagemPessoa" src="data:image/png;base64,' . base64_encode($row["Foto_Perfil"]) . '"/>';
                          }
                      }
                    ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                              <?php
                                if (!empty($email)) {
                                    $sql = "SELECT * FROM Prestador WHERE email = '$email'";
                                    $result = $con->query($sql);
                            
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $nome = $row["Nome"];
                                        $tipo_servico = $row["Servico_Prestado"];
                                        $avaliacao = $row["Avaliacao"];

                                        echo "<h5>" . $nome . "<h5>";
                                        echo "<h6>" . $tipo_servico . "<h6>";
                                        echo "<p class='proile-rating'>Avaliação : <span>" . $avaliacao . "</span></p>";
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
                <?php
                  if ($email == $_SESSION["email"])
                  {
                    ?>
                    <div class="col-md-2 flex-column justify-content-evenly">
                      <button type="submit" class="profile-edit-btn" name="btnSave" value="Salvar"><a href="editarperfilprestador.php">Editar Perfil</a></button>
                      <button type="button" class="profile-edit-btn bg-danger text-white" onclick="session_out()">Sair da Sessão</button>
                      <script>
                          function session_out() {
                              if (confirm("Sair da sessão atual?")) {
                                  window.location.href = "../../session_out.php";
                              }
                          }
                      </script>
                    </div>
                    <?php
                  }
                ?>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p id="contato">Contato</p>
                        <div class="row">
                        <?php
                          if (!empty($email)) {
                              $sql = "SELECT * FROM Prestador WHERE email = '$email'";
                              $result = $con->query($sql);
                      
                              if ($result->num_rows > 0) {
                                  $row = $result->fetch_assoc();
                                  $telefone = $row["Telefone"];

                                  echo '<p>Telefone: ' . $telefone . '</p>';
                              }
                          }
                        ?>
                        </div>
                        <p>Email: <?php echo $email;?></p>
                        <div class="container">
                          <div class="chatbox">
                              <div class="chatbox__support">
                                  <div class="chatbox__header">
                                  
                                      <div class="chatbox__content--header">
                                          <h4 class="chatbox__heading--header">Conversa por chat</h4>
                                         
                                      </div>
                                  </div>
                                  <div class="chatbox__messages">
                                      <div>
                                          <div class="messages__item messages__item--operator">
                                              Boa tarde! Gostaria de mais informações sobre o serviço
                                          </div>
                                          <div class="messages__item messages__item--visitor">
                                              Claro! O que gostaria de saber?
                                          </div>
                                          
                                          <div class="messages__item messages__item--typing">
                                              <span class="messages__dot"></span>
                                              <span class="messages__dot"></span>
                                              <span class="messages__dot"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="chatbox__footer">
                            
                                      <input type="text" placeholder="Escreva uma mensagem">
                                      <p class="chatbox__send--footer">Enviar</p>
                            
                                  </div>
                              </div>
                              <div class="chatbox__button">
                                  <button class="btn-chat">Chat</button>
                              </div>
                          </div>
                      </div>
              
              
                        
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            
                                  <?php
                                    if (!empty($email)) {
                                        $sql = "SELECT * FROM Prestador WHERE email = '$email'";
                                        $result = $con->query($sql);
                                
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $nome = $row["Nome"];
                                            $tipo_servico = $row["Servico_Prestado"];
                                
                                            echo '<div class="row">';
                                            echo '<div class="col-md-6">';
                                            echo '<label>Nome</label>';
                                            echo '</div>';
                                            echo '<div class="col-md-6">';
                                            echo '<p>' . $nome . '</p>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '<div class="row">';
                                            echo '<div class="col-md-6">';
                                            echo '<label>Serviço</label>';
                                            echo '</div>';
                                            echo '<div class="col-md-6">';
                                            echo '<p>' . $tipo_servico . '</p>';
                                            echo '</div>';
                                            echo '</div>';
                                        } else {
                                            echo "Usuário não encontrado.";
                                        }
                                    }
                                  ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Disponibilidade:</label>
                                        </div>
                                        <div class="col-md-9">
                                          <section class="container">
                                            <form >
                                                <div class="input-group date" id="datepicker">
                                                  <input type="text" class="form-control" id="date" onChange="mudar()"/>
                                                  <span class="input-group-append">
                                                    <span class="input-group-text bg-light d-block">
                                                    <script>
                                                        var datasBloqueadas = [];

                                                        function bloquearData(){
                                                          var data = document.getElementById("date").value
                                                          datasBloqueadas.push(data)
                                                          console.log(datasBloqueadas)
                                                          $('#datepicker').datepicker('setDatesDisabled', datasBloqueadas);
                                                        }
                                                        $(function(){
                                                          $('#datepicker').datepicker({
                                                              format: "dd/mm/yyyy",
                                                              datesDisabled: datasBloqueadas,
               

                                                          });
                                                        });
                                                        function mudar(){
                                                        var dataa = document.getElementById("date").value
                                                        console.log(dataa)
                                                        }
                                                      </script>
                                                      <i class="fa fa-calendar"></i>
                                                    </span>
                                                  </span>
                                                </div>
                                              
                                            </form>
                                          </section>
                                        </div>

                                    </div>

                        </div>
                        
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </form>  
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
        
    </div>
    

</body>
<script>
  class InteractiveChatbox {
    constructor(a, b, c) {
        this.args = {
            button: a,
            chatbox: b
        }
        this.icons = c;
        this.state = false; 
    }

    display() {
        const {button, chatbox} = this.args;
        
        button.addEventListener('click', () => this.toggleState(chatbox))
    }

    toggleState(chatbox) {
        this.state = !this.state;
        this.showOrHideChatBox(chatbox, this.args.button);
    }

    showOrHideChatBox(chatbox, button) {
        if(this.state) {
            chatbox.classList.add('chatbox--active')
            this.toggleIcon(true, button);
        } else if (!this.state) {
            chatbox.classList.remove('chatbox--active')
            this.toggleIcon(false, button);
        }
    }

    toggleIcon(state, button) {
        const { isClicked, isNotClicked } = this.icons;
        let b = button.children[0].innerHTML;

        if(state) {
            button.children[0].innerHTML = isClicked; 
        } else if(!state) {
            button.children[0].innerHTML = isNotClicked;
        }
    }
}
const chatButton = document.querySelector('.chatbox__button');
const chatContent = document.querySelector('.chatbox__support');
const icons = {
    isClicked: '<img src="/Callit/Images/Profile_Images/chatimg.png" width="50" height="50">',
    isNotClicked: '<img src="/Callit/Images/Profile_Images/chatimg.png" width="60" height="60">'
}
const chatbox = new InteractiveChatbox(chatButton, chatContent, icons);
chatbox.display();
chatbox.toggleIcon(false, chatButton);
</script>
</html>
