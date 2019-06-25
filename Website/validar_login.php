<?php
    session_start();

    $email = $_POST['uEmail'];

    // verificar se o endereço digitado é valido
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Endereço de email invalido')</script>";
        header("refresh: 0.5; url = login.php");
    } else {

        $password = $_POST['uSenha'];

        $conexao = mysqli_connect('localhost', 'root', '') or die('Erro de conexão'.mysqli_connect_error());

        $bd = mysqli_select_db($conexao, "ManiaFitness");

        // se banco de dados não existe, criar outro
        if(empty($bd)) {
            $createBD = mysqli_query($conexao,"CREATE DATABASE ManiaFitness DEFAULT CHARSET=utf8");
            // se o banco de dados não tiver sido criado
            if(!$createBD) {
                die("Erro ao criar banco de dados");
            }
        } 

        // se chegou aqui, BD existe ou foi criado
        // agora verificar se tabela adm existe, se não existir, criar
        
        // se não existir, criar a tabela
        if(!mysqli_query($conexao, "SELECT * FROM adm")) {
            
            $table = "CREATE TABLE adm (
                id int(100) NOT NULL AUTO_INCREMENT,
                email varchar(200) NOT NULL,
                senha varchar(30) NOT NULL,
                sexo varchar(30) NOT NULL,
                PRIMARY KEY(id)
            ) DEFAULT CHARSET=utf8";


            $createTable = mysqli_query($conexao, $table);
            
            if(!$createTable) {
                die("Tabela não foi criada com sucesso!");
            }
        }

        // verificar se email fornecido existe na tabela ADM

        $search_element = mysqli_query($conexao, "SELECT * FROM adm WHERE email = '$email'");
        // se não tiver encontrado, dado não existe na tabela
        if(mysqli_num_rows($search_element) == 0) {
            // alertar usuario e redirecionar para tela do login
            echo "<script>alert('$email não está cadastrado no sistema')</script>";
            header("refresh: 0.5; url = login.php");
        } else {
            // se tiver encontrado, verificar se senha está correta
            while($info = mysqli_fetch_array($search_element)) {
                $email = $info['email'];
                $pass = $info['senha'];
                // se estiver correta, criar as sessões desse usuário
                if($pass == $password) {
                    $_SESSION['email'] = $email;
                    $_SESSION['senha'] = $password;
                    echo "<script>alert('Seja bem-vindo(a), $email!')</script>";
                    header("refresh: 0.5; url = index.php");
                } else {
                    // se não estiver correta, alertar o usuário e redirecionar para tela de login novamente
                    echo "<script>alert('Senha Incorreta')</script>";
                    header("refresh: 0.5; url = login.php");
                }
            }
        }
        mysqli_close($conexao);
    }
?>