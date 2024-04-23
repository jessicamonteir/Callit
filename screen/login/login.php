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
    function hideUser(x) {
        if (x.checked) {
            document.getElementById("registerFormUser").style.display = "none";
            document.getElementById("registerFormPrestador").style.display = "initial";
        }
    }

    function hidePrestador(x) {
        if (x.checked) {
            document.getElementById("registerFormPrestador").style.display = "none";
            document.getElementById("registerFormUser").style.display = "initial";
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
        console.log("Ei")
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
        if (!regexUsername.test(usernamePrestadorValue) || !regexEmail.test(emailPrestadorValue) || !regexPass.test(passwordPrestadorValue)) {
        console.log("Opa")
        let errorMessage = document.getElementById('showErrorMessageSignUp');
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
                    <img class="logo" src="/Images/Logo/caliit.png" alt="">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Entrar </span><span>Cadastrar</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
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

                                            <h4 class="mb-4 pb-3">Cadastrar</h4>

                                                <input class="form-check-input" type="radio" name="SignUp" id="usuario" checked
                                                onchange="hidePrestador(this)">
                                                <label class="form-check-label" for="usuario">
                                                    Usuário
                                                </label>
                                                <input class="form-check-input" type="radio" name="SignUp" id="prestador"
                                                onchange="hideUser(this)">
                                                <label class="form-check-label" for="prestador">
                                                    Prestador
                                                </label>
                                            
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
                                                    <input type="password" name="sigpassUser" class="form-style"
                                                        placeholder="Sua senha" id="sigpassUser"
                                                        autocomplete="off">
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
                                                    <input type="password" name="sigpassPrestador" class="form-style"
                                                        placeholder="Sua senha" id="sigpassPrestador"
                                                        autocomplete="off">
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

                                                <button type="submit" class="btn mt-4">Cadastrar Prestador</button>
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
