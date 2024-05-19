<?php 
    include("../../conn.php");
    session_start();
    $sql = "SELECT Nome_servico FROM Servico";
    $result = $con->query($sql);
    $Servicos = array();
    while ($row = $result->fetch_assoc()){
        $Servicos[] = $row['Nome_servico'];
    }
    $con->close()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../login/login.css">
</head>

<body>
<script>

    let activate = false;

    function hideUser() {
        document.getElementById("registerFormUser").style.display = "none";
        document.getElementById("registerFormPrestador").style.display = "initial";
        document.getElementById("usuario").classList.remove("active");
        document.getElementById("prestador").classList.add("active");
        document.querySelector(".card-3d-wrapper").style.height = "130%";
        document.documentElement.style.setProperty('--main-color', '#75df74');
        document.documentElement.style.setProperty('--sec-color', '#167010');
        document.documentElement.style.setProperty('--ter-color', '#rgba(32, 112, 16, 0.2)');
        document.documentElement.style.setProperty('--qua-color', '#129d08');
        document.querySelector('.logo').src = '/Callit/Images/Logo/logopnglightgreen.png';
        activate = true;
    }

    function hidePrestador() {
        document.getElementById("registerFormPrestador").style.display = "none";
        document.getElementById("registerFormUser").style.display = "initial";
        document.getElementById("prestador").classList.remove("active");
        document.getElementById("usuario").classList.add("active");
        document.querySelector(".card-3d-wrapper").style.height = "120%";
        document.documentElement.style.setProperty('--main-color', '#75b5ff');
        document.documentElement.style.setProperty('--sec-color', '#102770');
        document.documentElement.style.setProperty('--ter-color', 'rgba(16, 39, 112, .2)');
        document.documentElement.style.setProperty('--qua-color', '#0a58ca');
        document.querySelector('.logo').src = '/Callit/Images/Logo/logopng.png';
        activate = false;
    }

    function gridToNormal(checkbox) {
        document.documentElement.style.setProperty('--main-color', '#75b5ff');
        document.documentElement.style.setProperty('--sec-color', '#102770');
        document.documentElement.style.setProperty('--ter-color', 'rgba(16, 39, 112, .2)');
        document.documentElement.style.setProperty('--qua-color', '#0a58ca');
        document.querySelector('.logo').src = '/Callit/Images/Logo/logopng.png';
        if(activate && checkbox.checked) {
            document.querySelector(".card-3d-wrapper").style.height = "130%";
        } else {
            if (checkbox.checked) {
                document.querySelector(".card-3d-wrapper").style.height = "120%";
            }
            else {
                document.querySelector(".card-3d-wrapper").style.height = "100%";
            }
        }
    }

    const regexPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    const regexEmail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    const regexUsername = /^[a-zA-Z]{4,}(?: [a-zA-Z]+){0,2}$/;

    function validationUsuario() {
    const username = document.getElementById('lognameUser');
    const sigemail = document.getElementById('sigemailUser');
    const password = document.getElementById('sigpassUser');

    const usernameValue = username.value;
    const sigemailValue = sigemail.value;
    const passwordValue = password.value;
    if (!regexUsername.test(usernameValue) || !regexEmail.test(sigemailValue) || !regexPass.test(passwordValue)) {
        let errorMessage = document.getElementById('showErrorMessageSignUp');
        errorMessage.style.display = "initial";
        errorMessage.textContent = "Cadastro Incorreto";
        return false;
    }
    return true;
}
    function validationPrestador(){
    const usernamePrestador = document.getElementById('lognamePrestador');
    const emailPrestador = document.getElementById('sigemailPrestador');
    const passwordPrestador = document.getElementById('sigpassPrestador');
        
    const usernamePrestadorValue = usernamePrestador.value;
    const emailPrestadorValue = emailPrestador.value;
    const passwordPrestadorValue = passwordPrestador.value;

    let errorMessage = document.getElementById('showErrorMessageSignUp');
    if (!regexUsername.test(usernamePrestadorValue) || !regexEmail.test(emailPrestadorValue) || !regexPass.test(passwordPrestadorValue)) {
        errorMessage.style.display = "initial";
        errorMessage.textContent = "Cadastro Incorreto";
        return false;
    }
    return true;
    }
</script>

    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <img class="logo" src="/Callit/Images/Logo/caliit.png" alt="">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Entrar </span><span>Cadastrar</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" onclick="gridToNormal(this)"/>
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div id="showErrorMessageLogin" style="display:none;" class="alert alert-danger"
                                            role="alert">
                                            Login Incorreto
                                        </div>
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Entrar</h4>

                                            <form id="loginForm" name="loginForm" action="loginToDB.php" method="post">
                                                <div class="form-group">
                                                    <input type="email" name="logemail" class="form-style"
                                                        placeholder="Seu email" id="logemail" autocomplete="off">
                                                    <i class="fa-solid fa-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="logpass" class="form-style"
                                                        placeholder="Sua senha" id="logpass" autocomplete="off">
                                                    <i class="fa-solid fa-lock"></i>
                                                </div>
                                                <div>
                                                    <?php
                                                    if (isset($_SESSION['error_message'])){
                                                    echo '<h6 style="margin-top:10px; color: white !important">' . $_SESSION['error_message'] . '</h6>';
                                                    unset($_SESSION['error_message']);
                                                    }
                                                ?>
                                                </div>
                                                <button type="submit" class="btn mt-4" id="btnlogin">Enviar</button>
                                            </form>
                                            <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Esqueceu a sua
                                                    senha?</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div id="showErrorMessageSignUp" style="display:none;" class="alert alert-danger"
                                            role="alert">
                                            Login Incorreto
                                        </div>
                                        <div class="section text-center">

                                            <h4 class="mb-3 mt-3">Cadastrar</h4>

                                                <div class="d-flex mb-3">
                                                    <div class="flex-grow-1">
                                                        <button type="button" class="btn" id="usuario" onclick="hidePrestador()">
                                                            Usuário
                                                        </button>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <button type="button" class="btn" id="prestador" onclick="hideUser()">
                                                            Prestador
                                                        </button>
                                                    </div>
                                                </div>
                                            
                                            <form id="registerFormUser" name="registerFormUser" action="cadastroToDB.php" method="post"
                                            onsubmit="return validationUsuario();">
                                                <div class="form-group">
                                                    <input type="text" name="lognameUser" class="form-style"
                                                        placeholder="Nome completo" id="lognameUser"
                                                        autocomplete="off">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="sigemailUser" class="form-style"
                                                        placeholder="Seu email" id="sigemailUser"
                                                        autocomplete="off">
                                                    <i class="fa-solid fa-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="sigtelUser" class="form-style"
                                                        placeholder="Seu telefone" id="sigtelUser"
                                                        autocomplete="off"
                                                        pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})"
                                                        title="Número de telefone precisa ser no formato (99) 9999-9999"
                                                        >
                                                    <i class="fa-solid fa-phone"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password"
                                                        class="form-style" 
                                                        id="sigpassUser" 
                                                        name="sigpassUser" 
                                                        required 
                                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}" 
                                                        title="A senha deve conter pelo menos 8 caracteres, incluindo pelo menos um dígito, uma letra minúscula, uma letra maiúscula e um caractere especial." 
                                                        placeholder="Sua senha"
                                                        autocomplete="off"
                                                    />
                                                    <i class="fa-solid fa-lock"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4">Cadastrar Usuário</button>
                                            </form>


                                            <form id="registerFormPrestador" name="registerFormPrestador" 
                                                action="cadastroToDB.php" method="post" style="display:none;"
                                                onsubmit="return validationPrestador();">

                                                <div class="form-group">
                                                    <input type="text" name="lognamePrestador" class="form-style"
                                                        placeholder="Nome completo" id="lognamePrestador"
                                                        autocomplete="off">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="sigemailPrestador" class="form-style"
                                                        placeholder="Seu email" id="sigemailPrestador"
                                                        autocomplete="off">
                                                    <i class="fa-solid fa-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="sigtelPrestador" class="form-style"
                                                        placeholder="Seu telefone" id="sigtelPrestador"
                                                        autocomplete="off"
                                                        pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})"
                                                        title="Número de telefone precisa ser no formato (99) 9999-9999"
                                                        >
                                                    <i class="fa-solid fa-phone"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password"
                                                        class="form-style" 
                                                        id="sigpassPrestador" 
                                                        name="sigpassPrestador" 
                                                        required 
                                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}" 
                                                        title="A senha deve conter pelo menos 8 caracteres, incluindo pelo menos um dígito, uma letra minúscula, uma letra maiúscula e um caractere especial." 
                                                        placeholder="Sua senha"
                                                        autocomplete="off"
                                                    />
                                                    <i class="fa-solid fa-lock"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <select class="form-style" id="servico" name="servico"
                                                    aria-placeholder="Selecione um Serviço" autocomplete="off">
                                                        <option value="" disabled>Selecione um serviço</option>
                                                        <?php
                                                        foreach ($Servicos as $servico) {
                                                            echo "<option value='" . htmlspecialchars($servico) . "'>" . htmlspecialchars($servico) . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <i class="fa-solid fa-lightbulb"></i>
                                                </div>

                                                <button type="submit" class="btn mt-4 mb-4">Cadastrar Prestador</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
