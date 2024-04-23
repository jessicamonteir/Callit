function hideUser(x){
  console.log("opa")
  if(x.checked){
    document.getElementById("registerFormUser").style.display = "none";
    document.getElementById("registerFormPrestador").style.display = "initial";
  }
}
function hidePrestador(x){
  console.log("opa")
  if(x.checked) {
    document.getElementById("registerFormPrestador").style.display = "none";
    document.getElementById("registerFormUser").style.display = "initial";
  }
}



const username = document.getElementById('logname')
const login = document.getElementById('logemail')
const sigemail = document.getElementById('sigemail')
const password = document.getElementById('logpass')

function validation(){
  const usernameValue = username.value;
  const loginValue = login.value;
  const sigemailValue = sigemail.value;
  const passwordValue = password.value;

  const regexPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
  const regexEmail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
  const regexUsername = /^[a-zA-Z]{4,}(?: [a-zA-Z]+){0,2}$/;

  if(!regexUsername.test(usernameValue)){
    let errorMessage = document.getElementById('showErrorMessage');
    errorMessage.style.display = 'block';
    return false;
  }
  if(!regexEmail.test(loginValue)){
    let errorMessage = document.getElementById('showErrorMessage');
    errorMessage.style.display = 'block';
    return false;
  }
  if(!regexPass.test(passwordValue)){
    let errorMessage = document.getElementById('showErrorMessage');
    errorMessage.style.display = 'block';
    return false;
  }
  if(!regexEmail.test(sigemailValue)){
    let errorMessage = document.getElementById('showErrorMessage');
    errorMessage.style.display = 'block';
    return false;
  }
  return true; // Retorne true se todas as validações passarem
}
