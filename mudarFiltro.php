<?php
session_start();
include('conn.php');

$service = $_POST['service'];
$opcao = $_POST["filtro"];

if ($service == "Em Alta") {
    if ($opcao == "Nome"){
        $sql = "SELECT * FROM Prestador ORDER BY $opcao ";
    }else{
        $sql = "SELECT * FROM Prestador ORDER BY $opcao DESC";
    }
    
} else {
    if ($opcao == "Nome"){
        $sql = "SELECT * FROM Prestador WHERE Servico_Prestado = '" . $con->real_escape_string($service) . "' ORDER BY $opcao";
    }else{
        $sql = "SELECT * FROM Prestador WHERE Servico_Prestado = '" . $con->real_escape_string($service) . "' ORDER BY $opcao DESC";
    }
}

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
            <div class="tag bg-<?php echo $row["Servico_Prestado"]; ?>"><?php echo $row["Servico_Prestado"]; ?></div>
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
    echo "<p>Nenhum prestador encontrado.<p>";
    echo "<br><br><br><br><br><br><br><br><br>";
}

$con->close();
?>