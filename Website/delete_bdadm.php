<?php
    session_start();

    // se sessão está setada, então existe tabela ADM
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $conexao = mysqli_connect("localhost","root","") or die("Erro de conexão".mysql_connect_error());
        
        $bd = mysqli_select_db($conexao, "ManiaFitness");

        if(empty($bd)) {
            if(!$createBD) {
                die("Erro ao se conectar com banco de dados");
            }
        }

        $result = mysqli_query($conexao, "DELETE FROM adm WHERE email = '$email'");

        if($result) {
            echo "<script>alert('Conta removida com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro ao remover conta!')</script>";
        }

        header("refresh: 0.5; url = login.php");
        mysqli_close($conexao);
    }
    
?>