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
  $sqlId = "SELECT * FROM Prestador WHERE Email = '$email'";
  $result = $con->query($sqlId);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $id = $row["Id_prestador"];
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
<?php 
  if (($_SESSION['USUARIO'] == TRUE)){
  }
  elseif (($_SESSION['PRESTADOR'] == TRUE)){
  }
  else{
    header('Location: /Callit/screen/login/login.php');
    exit;}
?>
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
                <div class="col-md-6 cabecalho">
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
                                        $avaliacaostar = (5-$avaliacao)*20;

                                        echo '<div class="row">';
                                        echo "<h5>" . $nome . "</h5>";
                                        echo '</div>';
                                        echo '<div class="row">';
                                        echo "<h6>" . $tipo_servico . "</h6>";
                                        echo '</div>';
                                        echo '<span>Avaliação:</span>';
                                        echo "<div class='review-stars' data-avaliacaostar='" . $avaliacaostar . "' id='avaliacao' title='" . $avaliacao . " estrelas'></div>";
                                        if ($email != $_SESSION["email"]){
                                        echo '<br>';
                                        echo '<span id="escolhasua" class="daravaliacao" style="display:none">Escolha sua avaliação:</span>';
                                        echo '<button type="button" id="botaoavaliar" class="profile-edit-btn botaoavaliacao" onclick="avaliar()">Clique aqui para dar sua avaliação</button>';
                                        echo "<div class='givereview-stars' class='daravaliacao' style='display:none' data-daravaliacaostar='" . $avaliacaostar . "'id='avaliacao2' title='" . $avaliacao . " estrelas'></div>";
                                        echo '<br>';
                                        echo "<span id='avaliartemporeal' style='display:none'>Passe o mouse por cima das estrelas para avaliar e clique na sua escolha</span>";
                                        
                                        echo '<input type="hidden" id="emailp" value="'.$email.'"> ';
                                        }
                      
                                    }
                                  }
                                ?>
                               


                                
                           

                    
                                <script>
                                function avaliar(){
                                const givereviewStars = document.getElementById('avaliacao2');
                                const avaliacao = document.getElementById('avaliartemporeal');
                                const botao = document.getElementById('botaoavaliar');
                                const escolhasua = document.getElementById('escolhasua');
                                givereviewStars.style.display="inline-block";
                                avaliacao.style.display="inherit";
                                escolhasua.style.display="inline-block";
                                botao.style.display="none";
                                console.log("a")
                                }
                            

                                
                                document.addEventListener('DOMContentLoaded', (event) => {
                                const reviewStars = document.getElementById('avaliacao');
                                const givereviewStars = document.getElementById('avaliacao2');
                                if (reviewStars) {
                                    const avaliacaostar = reviewStars.getAttribute('data-avaliacaostar')
                                    const style = document.createElement('style');
                                    style.innerHTML = `
                                        .review-stars:after {
                                            width: ${avaliacaostar}%;
                                        }
                                    `;
                                    document.head.appendChild(style);
                                }
                                if (givereviewStars){
                                  givereviewStars.addEventListener('mousemove', function(e) {
                                    const rect = givereviewStars.getBoundingClientRect();
                                    const mouseX = e.clientX - rect.left;
                                    console.log(mouseX);
                                    const widthPercentage = (100-(mouseX / rect.width) * 100)-0.9;
                                    const givestyle = document.createElement('style');
                                    givestyle.innerHTML = `
                                        .givereview-stars:after {
                                            width: ${widthPercentage}%;
                                        }
                                    `;
                                    document.head.appendChild(givestyle);
                                    const givereviewStars3 = document.getElementById('avaliacao2');
                                    givereviewStars3.setAttribute('title',Number((5-(widthPercentage/20)).toFixed(1)))
                                    const texto =document.getElementById("avaliartemporeal")
                                    texto.innerHTML=Number((5-(widthPercentage/20)).toFixed(1))
                                    });
                                    givereviewStars.addEventListener('mouseleave', function(e) {
                                      const texto =document.getElementById("avaliartemporeal")
                                     
                                    texto.innerHTML="Passe o mouse por cima das estrelas para avaliar e clique na sua escolha"
                                    });
                                  givereviewStars.addEventListener('click', function(e) {
                                    
                                    const rect = givereviewStars.getBoundingClientRect();
                                    const mouseX = e.clientX - rect.left;
                                    const widthPercentage =(mouseX / rect.width) * 100;
                                    var avaliacao = widthPercentage/20
                                    var avaliacaoround  = Number((avaliacao).toFixed(1))
                                    var email = document.getElementById('emailp').value;
                                    console.log(email);
                                    var conexao = new XMLHttpRequest();
                                    conexao.open("POST", "/Callit/avaliar.php", true);
                                    conexao.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                    conexao.send(`Avaliacao=${avaliacaoround}&email=${email}`);
                                    
                                      if (conexao.status === 200) {
                                          console.log('Avaliação enviada com sucesso');
                                      } else {
                                          console.error('Erro ao enviar avaliação');
                                      }
                                      const givereviewStars2 = document.getElementById('avaliacao2');
                                      const avaliacao2 = document.getElementById('avaliartemporeal');
                                      const escolhasua2 = document.getElementById('escolhasua');
                                      givereviewStars2.style.display="none";
                                      avaliacao2.style.display="none";
                                      escolhasua2.innerHTML="Obrigado por avaliar!";
                                      

                                    
                                });
                                  }
                                  
                                  
    
                              });
                                </script>
                      
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
            <div class="row" id="linha">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p id="cont" style="margin-top:-40px">Contato:</p>
                        <?php
                        if ($email==$_SESSION["email"]){
                        ?>
                        <script>
                        
                        const cont = document.getElementById("cont")
                        cont.style.marginTop="20px"
                      
                        </script>
                          <?php
                        }
                    ?>
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
                                            echo '<span>Nome</span>';
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
                                            echo '<div class="row">';
                                            echo '<div class="col-md-6">';
                                            echo '<label>Serviços já contratados</label>';
                                            echo '</div>';
                                            
                                            $sql = "SELECT * FROM agenda WHERE Cliente = '$email' AND Status_Agendamento='Confirmado'";
                                            $result = $con->query($sql);
                                            
                                            echo '<div class="col-md-6">';
                                            echo '<p>'.$result->num_rows.'</p>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '<div class="row">';
                                            echo '<div class="col-md-6">';
                                            echo '<label>Serviços já prestados</label>';
                                            echo '</div>';
                                          
                                            $sql = "
                                            SELECT a.FK_ID_Prestador,  p.email AS email
                                            FROM Agenda a
                                            JOIN Prestador p ON a.FK_ID_prestador = p.Id_prestador
                                            WHERE p.email = '$email' AND a.Status_Agendamento='Confirmado'";
                                            $result = $con->query($sql);
                                        
                                            echo '<div class="col-md-6">';
                                            echo '<p>'.$result->num_rows.'</p>';
                                            echo '</div>';
                                            echo '</div>';
                                            
                                        } else {
                                            echo "Usuário não encontrado.";
                                        }
                                    }
                                  ?>
                                  <?php
                                  if ($email != $_SESSION["email"]){
                                          ?>
                                        <div class="profile-head">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                          <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Agendamento</a>
                                          </li>
                                        </ul>
                                      
                                        <div class="row">
                                          <div class="col-md-9">
                                            
                                            <section class="container">
                                              <form method="post" action="../../agendar.php">
                                              <?php
                                                echo "<input type='hidden' id='idPrestador' name='idPrestador' value='".$id."'>";
                                                echo "<input type='hidden' id='emailPrestador' name='emailPrestador' value='".$email."'>";
                                                ?>
                                                  <div class="input-group date" id="datepicker">
                                                    <input type="text" class="form-control" id="data" name="data" placeholder="Escolha um dia"/>
                                                      <span class="input-group-append">
                                                        <span class="input-group-text bg-light d-block">
                                                          <script>
                                                              $(function() {
                                                                var idPrestador = $('#idPrestador').val();
                                                                console.log(idPrestador)
                                                                $.ajax({
                                                                  url: '../../ajustarCalendario.php',
                                                                  method: 'POST',
                                                                  data: { Id_Prestador: idPrestador },
                                                                  success: function(data) {
                                                                    datasBloqueadas = data;
                                                                    console.log(datasBloqueadas)
                                                                    $('#datepicker').datepicker({
                                                                      format: "yyyy-mm-dd",
                                                                      datesDisabled: datasBloqueadas,
                                                                      startDate:"0",
                                                                      multidate:true,
                                                                    });
                                                                  }
                                                                });
                                                              });
                                                              
                                                          </script>
                                                          <i class="fa fa-calendar"></i>
                                                        </span>
                                                      </span>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-9">
                                                      <input type="submit" style="margin-top:30px"class="profile-edit-btn" name="btnAgendar" value="Agendar">
                                                    </div>
                                                  </div>
                                              </form>
                                            </section>
                                          </div>
                                        </div>
                                        <?php }else{?>
                                          <div class="profile-head">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                              <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Agendamentos</a>
                                              </li>
                                            </ul>
                                          </div>
                                          <?php 
                                          if (!empty($email)) {
                                                  $idTemp = $_SESSION["id"];
                                                  $sql = "SELECT * FROM agenda WHERE FK_ID_Prestador = '$idTemp' AND Status_Agendamento = 'Confirmar' ORDER BY Data_de_Agendamento";
                                                  $result = $con->query($sql);

                                                  if ($result->num_rows > 0) { 
                                                      echo '<h4>Seus agendamentos pendentes:</h4>';
                                                      while ($row = $result->fetch_assoc()) {
                                                          $cliente = $row["Cliente"];
                                                          $data = $row["Data_de_Agendamento"];
                                                          $IdAgendamento = $row["Id_Agendamento"];
                                                          $sqlCliente = "SELECT * FROM Usuario WHERE Email = '$cliente'";
                                                          $resultCliente = $con->query($sqlCliente);

                                                          if ($resultCliente->num_rows > 0) {
                                                              while ($rowCliente = $resultCliente->fetch_assoc()) { 
                                                                  $nomeCliente = $rowCliente["Nome"];
                                                                  $telefone = $rowCliente["Telefone"];
                                                                  echo '<div class="row">';
                                                                  echo '<div class="col-md-2 ">';
                                                                  echo '<span>Cliente: <a href="/Callit/screen/profile/perfilcliente.php?email=' . urlencode($cliente) . '">' . $nomeCliente . '</a></span>';
                                                                  echo '</div>';
                                                                  echo '<div class="col-md-3">';
                                                                  echo '<span>Contato: '.$telefone.'</span>';
                                                                  echo '</div>';
                                                                  echo '<div class="col-md-4 ">';
                                                                  echo '<span>Dia: '.$data.'</span>';
                                                                  echo '</div>';
                                                                  echo '</div>';
                                                                  echo '<div class="row">';
                                                                  echo '<div class="col-md-6 ">';
                                                                  echo '<form method="post" action="../../confirmarAgendamento.php">';
                                                                  echo '<input type="hidden" name="IdAgendamento" value="'.$IdAgendamento.'">';
                                                                  echo '<button type="submit" name="escolha" value="Confirmado" class="confirm">Confirmar</button>';
                                                                  echo '<button type="submit" name="escolha" value="Negado" class="deny">Negar</button>';
                                                                  echo '</div>';
                                                                  echo '</div>';
                                                                  echo '<br>';
                                                                  echo '<ul class="nav nav-tabs" id="myTab" role="tablist">';
                                                                  echo '<li class="nav-item">';
                                                                  echo '</li>';
                                                                  echo '</ul>';
                                                                  echo '</form>';
                                                              }
                                                          }else {
                                                              $sqlCliente = "SELECT * FROM Prestador WHERE Email = '$cliente'";
                                                              $resultCliente = $con->query($sqlCliente);
                                                              if ($resultCliente->num_rows > 0) {
                                                                while ($rowCliente = $resultCliente->fetch_assoc()) { 
                                                                    $nomeCliente = $rowCliente["Nome"];
                                                                    $telefone = $rowCliente["Telefone"];
                                                                    echo '<div class="row">';
                                                                    echo '<div class="col-md-3 ">';
                                                                    echo '<span>Cliente: <a href="/Callit/screen/profile/perfilprestador.php?email=' . urlencode($cliente) . '">' . $nomeCliente . '</a></span>';
                                                                    echo '</div>';
                                                                    echo '<div class="col-md-3">';
                                                                    echo '<span>Contato: '.$telefone.'</span>';
                                                                    echo '</div>';
                                                                    echo '<div class="col-md-4 ">';
                                                                    echo '<span>Dia: '.$data.'</span>';
                                                                    echo '</div>';
                                                                    echo '</div>';
                                                                    echo '<div class="row">';
                                                                    echo '<div class="col-md-6 ">';
                                                                    echo '<form method="post" action="../../confirmarAgendamento.php">';
                                                                    echo '<input type="hidden" name="IdAgendamento" value="'.$IdAgendamento.'">';
                                                                    echo '<button type="submit" name="escolha" value="Confirmado" class="confirm">Confirmar</button>';
                                                                    echo '<button type="submit" name="escolha" value="Negado" class="deny">Negar</button>';
                                                                    echo '</div>';
                                                                    echo '</div>';
                                                                    echo '<br>';
                                                                    echo '<ul class="nav nav-tabs" id="myTab" role="tablist">';
                                                                    echo '<li class="nav-item">';
                                                                    echo '</li>';
                                                                    echo '</ul>';
                                                                    echo '</form>';

                                                          }
                                                      }
                                                  }
                                              }
                                            }
                                          }
                                               
                                         ?>
                                         <script>
                                          function confirmarAgendamento(){
                                            var  = new XMLHttpRequest();
                                            xhr.open("POST", "/Callit/confirmarAgendamento.php", true);
                                            xhr.preventDefault()
                                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                            xhr.send("Status=Confirmado");
                                         }
                                         function negarAgendamento(){
                                            var xhr = new XMLHttpRequest();
                                            xhr.open("POST", "/Callit/confirmarAgendamento.php", true);
                                            xhr.preventDefault();
                                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                            xhr.send("Status=Negado");
                                         }
                                         </script>
                                         
                                         <?php
                                              $sql = "SELECT * FROM agenda WHERE Cliente = '".$_SESSION["email"]."' AND Status_Agendamento =  'Confirmado'";
                                              $result = $con->query($sql);

                                              if ($result->num_rows > 0) {   
                                                echo '<h4>Seus agendamentos confirmados como cliente:</h4>';
                                                  while ($row = $result->fetch_assoc()) {
                                                      $IdPrestador = $row["FK_ID_Prestador"];
                                                      $data = $row["Data_de_Agendamento"];
                                                      $IdAgendamento = $row["Id_Agendamento"];
                                                      $sqlPrestador = "SELECT * FROM Prestador WHERE Id_prestador = '$IdPrestador'";
                                                      $resultPrestador = $con->query($sqlPrestador);

                                                      if ($resultPrestador->num_rows > 0) {
                                                          while ($rowPrestador = $resultPrestador->fetch_assoc()) { 
                                                              $nomePrestador = $rowPrestador["Nome"];
                                                              $telefone = $rowPrestador["Telefone"];
                                                              $emailPrestador = $rowPrestador["Email"];
                                                              $servico = $rowPrestador["Servico_Prestado"];
                                                              echo '<form method="post" action="../../confirmarAgendamento.php">';
                                                              echo '<div class="row">';
                                                              echo '<div class="col-md-3 ">';
                                                              echo '<span>Prestador: <a href="/Callit/screen/profile/perfilprestador.php?email=' . urlencode($emailPrestador) . '">' . $nomePrestador . '</a></span>';
                                                              echo '</div>';
                                                              echo '<div class="col-md-2 ">';
                                                              echo '<span>Serviço: '.$servico.'</span>';
                                                              echo '</div>';
                                                              echo '<div class="col-md-3 ">';
                                                              echo '<span>Contato: '.$telefone.'</span>';
                                                              echo '</div>';
                                                              echo '<div class="col-md-3 ">';
                                                              echo '<span>Dia: '.$data.'</span>';
                                                              echo '</div>';
                                                              echo '<div class="col-md-6 ">';
                                                              echo '</div>';
                                                              echo '</div>';
                                                            
                                                              echo '<br>';
                                                              echo '<ul class="nav nav-tabs" id="myTab" role="tablist">';
                                                              echo '<li class="nav-item">';
                                                              echo '</li>';
                                                              echo '</ul>';
                                                              echo '<br>';
                                                                    }
                                                                  }}}
                                                                  ?>
                                        <h4>Seus agendamentos confirmados como prestador:</h4>
                                         <?php
                                              $sql = "SELECT * FROM agenda WHERE FK_ID_prestador = '".$_SESSION["id"]."' AND Status_Agendamento =  'Confirmado' ORDER BY Data_de_Agendamento";
                                                        $result = $con->query($sql);

                                                        if ($result->num_rows > 0) {   
                                                            while ($row = $result->fetch_assoc()) {
                                                                $cliente = $row["Cliente"];
                                                                $data = $row["Data_de_Agendamento"];
                                                                $IdAgendamento = $row["Id_Agendamento"];
                                                                $sqlCliente = "SELECT * FROM Usuario WHERE Email = '$cliente'";
                                                                $sqlClientePrest = "SELECT * FROM Prestador WHERE Email = '$cliente'";
                                                                $resultCliente = $con->query($sqlCliente);
                                                                $resultClientePrest = $con->query($sqlClientePrest);

                                                                if ($resultCliente->num_rows > 0) {
                                                                  
                                                                    while ($rowCliente = $resultCliente->fetch_assoc()) { 
                                                                        $nomeCliente = $rowCliente["Nome"];
                                                                        $telefone = $rowCliente["Telefone"];
                                                                        echo '<div class="row">';
                                                                        echo '<div class="col-md-3 ">';
                                                                        echo '<span>Cliente: <a href="/Callit/screen/profile/perfilcliente.php?email=' . urlencode($cliente) . '">' . $nomeCliente . '</a></span>';
                                                                        echo '</div>';
                                                                        echo '<div class="col-md-4 ">';
                                                                        echo '<span>Contato: '.$telefone.'</span>';
                                                                        echo '</div>';
                                                                        echo '<div class="col-md-3 ">';
                                                                        echo '<span>Dia: '.$data.'</span>';
                                                                        echo '</div>';
                                                                        echo '<div class="col-md-6 ">';
                                                                        echo '</div>';
                                                                        echo '</div>';
                                                                      
                                                                        echo '<br>';
                                                                        echo '<ul class="nav nav-tabs" id="myTab" role="tablist">';
                                                                        echo '<li class="nav-item">';
                                                                        echo '</li>';
                                                                        echo '</ul>';
                                                                    }
                                                                  }else if($resultClientePrest->num_rows > 0) {
                                                                    $sqlCliente = "SELECT * FROM Prestador WHERE Email = '$cliente'";
                                                                    $resultCliente = $con->query($sqlCliente);
                                                                    if ($resultCliente->num_rows > 0) {
                                                                      while ($rowCliente = $resultCliente->fetch_assoc()) { 
                                                                          $nomeCliente = $rowCliente["Nome"];
                                                                          $telefone = $rowCliente["Telefone"];
                                                                          echo '<div class="row">';
                                                                          echo '<div class="col-md-3 ">';
                                                                          echo '<span>Cliente: <a href="/Callit/screen/profile/perfilprestador.php?email=' . urlencode($cliente) . '">' . $nomeCliente . '</a></span>';
                                                                          echo '</div>';
                                                                          echo '<div class="col-md-4 ">';
                                                                          echo '<span>Contato: '.$telefone.'</span>';
                                                                          echo '</div>';
                                                                          echo '<div class="col-md-3 ">';
                                                                          echo '<span>Dia: '.$data.'</span>';
                                                                          echo '</div>';
                                                                          echo '<div class="col-md-6 ">';
                                                                          echo '</div>';
                                                                          echo '</div>';
                                                                        
                                                                          echo '<br>';
                                                                          echo '<ul class="nav nav-tabs" id="myTab" role="tablist">';
                                                                          echo '<li class="nav-item">';
                                                                          echo '</li>';
                                                                          echo '</ul>';
                                                                  }
                                                                }
                                                              }else{
                                                                echo '<p>Você não tem agendamentos confirmados!</p>';
                                                               }}}else{
                                                                echo '<span>Você não tem agendamentos confirmados!</span>';
                                                               }} ?>
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
                    <a href="../../main.php"> <img class="logoFotter" src="/Callit/Images/Logo/logopng1.png" alt=""></a>
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
