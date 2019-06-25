document.querySelector(".btn-remover").addEventListener('click', e => {
    e.preventDefault();
    if(confirm("Tem certeza que deseja remover sua conta?")) {
        window.location.href = "delete_bdadm.php";
    }
});