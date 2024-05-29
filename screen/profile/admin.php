<?php 
session_start();
include("../../conn.php");
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
    <style>
        .center {
            text-align: center;
        }
        .center table {
            margin: 0 auto;
        }
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .delete-btn {
            color: white;
            background-color: red;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<n>
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
                  <a class="nav-link mx-2 text-uppercase navegacao" href="/Callit/session_out.php">
                  SAIR
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

<div class="center">
<?php 
$sql = "SELECT * FROM Usuario";
$result = $con->query($sql);

if ($result->num_rows > 0) {  
  echo '<h4>Usuários</h4>';
  echo '<table>';
  echo '<tr>';
  echo '<th>Id Usuário</th>';
  echo '<th>Nome</th>';
  echo '<th>Email</th>';
  echo '<th>Telefone</th>';
  echo '<th>Foto Perfil</th>';
  echo '<th>Ações</th>';
  echo '</tr>';

  while ($row = $result->fetch_assoc()) {
    $IdUsuario = $row["Id_usuario"];
    $nomeCliente = $row["Nome"];
    $emailCliente = $row["Email"];
    $telefoneCliente = $row["Telefone"];
    $fotoCliente = $row["Foto_Perfil"];

    echo '<tr>';
    echo '<td>' . htmlspecialchars($IdUsuario) . '</td>';
    echo '<td><a href="/Callit/screen/profile/perfilcliente.php?email=' . urlencode($emailCliente) . '">' . htmlspecialchars($nomeCliente) . '</a></td>';
    echo '<td>' . htmlspecialchars($emailCliente) . '</td>';
    echo '<td>' . htmlspecialchars($telefoneCliente) . '</td>';
    echo '<td><img src="data:image/png;base64,' . base64_encode($fotoCliente) . '" alt="Foto de ' . htmlspecialchars($nomeCliente) . '" width="50" height="50"></td>';
    echo '<td><button class="delete-btn" onclick="confirmDelete(' . $emailCliente . ',0)">Excluir</button></td>';
    echo '</tr>';
  }
  
  echo '</table>';
} else {
  echo 'Nenhum usuário encontrado.';
}
?>
<?php 
$sql = "SELECT * FROM Prestador";
$result = $con->query($sql);

if ($result->num_rows > 0) {  
  echo '<h4>Prestadores</h4>';
  echo '<table>';
  echo '<tr>';
  echo '<th>Id Prestador</th>';
  echo '<th>Nome</th>';
  echo '<th>Email</th>';
  echo '<th>Telefone</th>';
  echo '<th>Serviço</th>';
  echo '<th>Foto Perfil</th>';
  echo '<th>Ações</th>';
  echo '</tr>';

  while ($row = $result->fetch_assoc()) {
    $IdPrestador = $row["Id_prestador"];
    $nomePrestador = $row["Nome"];
    $emailPrestador = $row["Email"];
    $telefonePrestador = $row["Telefone"];
    $servicoPrestado = $row["Servico_Prestado"];
    $fotoPrestador = $row["Foto_Perfil"];
    
    echo '<tr>';
    echo '<td>' . htmlspecialchars($IdPrestador) . '</td>';
    echo '<td><a href="/Callit/screen/profile/perfilprestador.php?email=' . urlencode($emailPrestador) . '">' . htmlspecialchars($nomePrestador) . '</a></td>';
    echo '<td>' . htmlspecialchars($emailPrestador) . '</td>';
    echo '<td>' . htmlspecialchars($telefonePrestador) . '</td>';
    echo '<td>' . htmlspecialchars($servicoPrestado) . '</td>';
    echo '<td><img src="data:image/png;base64,' . base64_encode($fotoPrestador) . '" alt="Foto de ' . htmlspecialchars($nomePrestador) . '" width="50" height="50"></td>';
    echo '<td><button class="delete-btn" onclick="confirmDelete(' . $IdPrestador . ',1)">Excluir</button></td>';
    echo '</tr>';
  }
  
  echo '</table>';
} else {
  echo 'Nenhum prestador encontrado.';
}
?>
<h4 >Adicionar Serviço</h4>
<form id="addServiceForm" method="POST" action="..\services\addService.php" class="row g-3">
    <div class="col-lg-6">
        <div class="mb-3">
            <label for="nomeServico" class="form-label">Nome do Serviço</label>
            <input type="text" class="form-control" id="nomeServico" name="nomeServico" required>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            <label for="descServico" class="form-label">Descrição</label>
            <textarea class="form-control" id="descServico" name="descServico" rows="3" required></textarea>
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn corSearch text-white linkskheader btnheader">Adicionar Serviço</button>
    </div>
</form>
<?php 
$sql = "SELECT * FROM Servico";
$result = $con->query($sql);
if($result->num_rows > 0){
  echo "<h4>Serviços</h4>";
  echo "<table>";
  echo "<tr>";
  echo "<th>Id Serviço</th>";
  echo "<th>Serviço</th>";
  echo "<th>Descrição</th>";
  echo "<th>Ações</th>";
  echo "</tr>";
  while ($row = $result->fetch_assoc()) {
    $IdServico = $row["Id_servico"];
    $nomeServico = $row["Nome_servico"];
    $desc = $row["Descricao"];

    echo '<tr>';
    echo '<td>' . htmlspecialchars($IdServico) . '</td>';
    echo '<td>' . htmlspecialchars($nomeServico) . '</td>';
    echo '<td>' . htmlspecialchars($desc) . '</td>';
    echo '<td><button class="delete-btn" onclick="deleteService(' . $IdServico . ')">Excluir</button></td>';
    echo '</tr>';
  }
}
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+cg2kT0vZ6XvvvNUoz5pQiyNU6z3C" crossorigin="anonymous"></script>
<script>
function confirmDelete(id,t) {
  if (confirm("Você realmente deseja excluir este usuário?")) {
    window.location.href = "deleteAccount.php?id=" + id +"&t="+t;
  }
}

function deleteService(id){
  if (confirm("Você realmente deseja excluir este serviço?")) {
    window.location.href = "../services/deleteService.php?id=" + id;
  }
}

function addService() {
  const container = document.createElement('div');
  container.innerHTML = `
    <form action="../services/addService.php" method="post" style="margin-top: 20px;">
      <input type="text" name="nomeServico" placeholder="Nome do Serviço" class="form-control" required>
      <textarea name="descServico" placeholder="Descrição do Serviço" class="form-control" required></textarea>
      <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Adicionar Serviço</button>
    </form>
  `;
  document.body.appendChild(container);
}
</script>

</body>
</html>
