document.querySelector('.btnLogin').addEventListener('click', e => {
    e.preventDefault();
    let email = document.querySelector(".uEmail").value;
    let password = document.querySelector(".uSenha").value;

    if(!email || !password) {
        alert("Por favor, preencha os campos para se conectar");
    } else {
        // enviando para o arquivo php, servidor
        // consigo através daqui, enviar os dados para php
        document.querySelector('.form-signin').submit();  
    }
});

document.querySelector('.btnCadastrar').addEventListener('click', e => {
    e.preventDefault();
    window.location.href = "cadastro.php";
});