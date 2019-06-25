<?php
    
    $conexao = mysqli_connect('localhost','root', '') or die("Erro de conexao ".mysqli_connect_error());
        
    $bd = mysqli_select_db($conexao, "ManiaFitness");
    if(empty($bd)) {
        $criaBD = mysqli_query($conexao, "CREATE DATABASE ManiaFitness DEFAULT CHARSET=utf8");
        if(!$criaBD) {
            die("Erro ao criar banco de dados");
        }
    }


    if(!mysqli_query($conexao, "SELECT * FROM instrutores")) {
        $table = "CREATE TABLE instrutores (
            id int(100) NOT NULL AUTO_INCREMENT,
            nome varchar(20) NOT NULL,
            nascimento varchar(20) NOT NULL,
            cpf varchar(20) NOT NULL,
            sexo varchar(20) NOT NULL,
            cidade varchar(20) NOT NULL,
            bairro varchar(20) NOT NULL,
            cep varchar(20) NOT NULL,
            ncasa INT NOT NULL,
            complemento varchar(60) NOT NULL,
            email varchar(60) NOT NULL,
            telefone varchar(40) NOT NULL,
            treinamento varchar(100) NOT NULL,
            dias varchar(100) NOT NULL,
            PRIMARY KEY(id)
        )  DEFAULT CHARSET=utf8";
        $criaTabela = mysqli_query($conexao, $table);
        if(!$criaTabela) {
            die("Erro ao criar tabela");
        } 
    }

    $email = $_POST['instrutor_email'];
    $nome = $_POST['instrutor_nome'];
    $cpf = $_POST['instrutor_cpf'];
    $nasc = date("d/m/Y", strtotime($_POST['instrutor_nascimento']));
    $sexo = $_POST['instrutor_sexo'];
    $cidade = $_POST['instrutor_cidade'];
    $bairro = $_POST['instrutor_bairro'];
    $cep = $_POST['instrutor_cep'];
    $ncasa = $_POST['instrutor_ncasa'];
    $complemento = $_POST['instrutor_complemento'];
    $telefone = $_POST['instrutor_telefone'];
    $treinamento = $_POST['instrutor_treinamento'];
    $dias = $_POST['instrutor_days'];
   // echo "'$email', '$nome','$nasc', '$cpf', '$nasc', '$sexo', '$peso', '$altura', '$cidade', '$bairro', '$cep', '$ncasa', '$complemento'";
    $getEmail = "SELECT email FROM instrutores WHERE email = '$email'";

    $selectEmail = mysqli_query($conexao, $getEmail);

    if(mysqli_num_rows($selectEmail) == 0 ) {
        $query = "INSERT INTO instrutores(
            email, 
            nome,
            nascimento, 
            cpf,
            sexo,
            cidade,
            bairro,
            cep,
            ncasa,
            complemento,
            telefone,
            treinamento,
            dias
        ) VALUES ('$email', '$nome','$nasc', '$cpf', '$sexo', '$cidade', '$bairro', '$cep', '$ncasa', '$complemento', '$telefone', '$treinamento', '$dias')";
        $insert = mysqli_query($conexao, $query);
        if(!$insert) {
            echo "<script>alert('Erro no cadastro')</script>";
        } else {
            echo "<script>alert('Dados do instrutor(a) $nome cadastrado com sucesso')</script>";
        }
    } else {
        echo "<script>alert('Email já cadastrado')</script>";
    }
    header("refresh:0.5;url=index.php");
    mysqli_close($conexao);
?>
