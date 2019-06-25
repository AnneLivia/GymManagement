<?php
    
    $conexao = mysqli_connect('localhost','root', '') or die("Erro de conexao ".mysqli_connect_error());
        
    $bd = mysqli_select_db($conexao, "ManiaFitness");
    if(empty($bd)) {
        $criaBD = mysqli_query($conexao, "CREATE DATABASE ManiaFitness DEFAULT CHARSET=utf8");
        if(!$criaBD) {
            die("Erro ao criar banco de dados");
        }
    }


    if(!mysqli_query($conexao, "SELECT * FROM alunos")) {
        $table = "CREATE TABLE alunos (
            id int(100) NOT NULL AUTO_INCREMENT,
            email varchar(60) NOT NULL,
            nome varchar(20) NOT NULL,
            nascimento varchar(20) NOT NULL,
            cpf varchar(20) NOT NULL,
            sexo varchar(20) NOT NULL,
            peso varchar(60) NOT NULL,
            altura varchar(60) NOT NULL,
            cidade varchar(20) NOT NULL,
            bairro varchar(20) NOT NULL,
            cep varchar(20) NOT NULL,
            ncasa INT NOT NULL,
            complemento varchar(60) NOT NULL,
            telefone varchar(40) NOT NULL,
            PRIMARY KEY(id)
        )  DEFAULT CHARSET=utf8";
        $criaTabela = mysqli_query($conexao, $table);
        if(!$criaTabela) {
            die("Erro ao criar tabela");
        } 
    }

    $email = $_POST['aluno_email'];
    $nome = $_POST['aluno_nome'];
    $cpf = $_POST['aluno_cpf'];
    $nasc = date("d/m/Y", strtotime($_POST['aluno_nascimento']));
    $sexo = $_POST['aluno_sexo'];
    $peso = $_POST['aluno_peso'];
    $altura = $_POST['aluno_altura'];
    $cidade = $_POST['aluno_cidade'];
    $bairro = $_POST['aluno_bairro'];
    $cep = $_POST['aluno_cep'];
    $ncasa = $_POST['aluno_ncasa'];
    $complemento = $_POST['aluno_complemento'];
    $telefone = $_POST['aluno_telefone'];

   // echo "'$email', '$nome','$nasc', '$cpf', '$nasc', '$sexo', '$peso', '$altura', '$cidade', '$bairro', '$cep', '$ncasa', '$complemento'";
    $getEmail = "SELECT email FROM alunos WHERE email = '$email'";

    $selectEmail = mysqli_query($conexao, $getEmail);

    if(mysqli_num_rows($selectEmail) == 0 ) {
        $query = "INSERT INTO alunos(
            email, 
            nome,
            nascimento, 
            cpf,
            sexo,
            peso,
            altura,
            cidade,
            bairro,
            cep,
            ncasa,
            complemento,
            telefone
        ) VALUES ('$email', '$nome','$nasc', '$cpf', '$sexo', '$peso', '$altura', '$cidade', '$bairro', '$cep', '$ncasa', '$complemento', '$telefone')";
        $insert = mysqli_query($conexao, $query);
        if(!$insert) {
            echo "<script>alert('Erro no cadastro')</script>";
        } else {
            echo "<script>alert('Dados do aluno(a) $nome cadastrado com sucesso')</script>";
        }
    } else {
        echo "<script>alert('Email já cadastrado')</script>";
    }
    header("refresh:0.5;url=index.php");
    mysqli_close($conexao);
?>
