<?php
    session_start();
    if(isset($_SESSION['email_aluno'])) {
        $conexao = mysqli_connect('localhost','root', '') or die("Erro de conexao ".mysqli_connect_error());
            
        $bd = mysqli_select_db($conexao, "ManiaFitness");
        if(empty($bd)) {
            $criaBD = mysqli_query($conexao, "CREATE DATABASE ManiaFitness DEFAULT CHARSET=utf8");
            if(!$criaBD) {
                die("Erro ao criar banco de dados");
            }
        }


        if(!mysqli_query($conexao, "SELECT * FROM Avaliacao")) {
            $table = "CREATE TABLE Avaliacao (
                id int(100) NOT NULL AUTO_INCREMENT,
                email varchar(50) NOT NULL,
                nome varchar(50) NOT NULL,
                data_avaliacao varchar(20) NOT NULL,
                deficiencia varchar(60) NOT NULL,
                massa varchar(20) NOT NULL,
                envergadura varchar(20) NOT NULL,
                perimetro_cintura varchar(60) NOT NULL,
                abdominal varchar(60) NOT NULL,
                corrida varchar(20) NOT NULL,
                salto varchar(20) NOT NULL,
                triceps varchar(20) NOT NULL,
                coxa varchar(20) NOT NULL,
                PRIMARY KEY(id)
            )  DEFAULT CHARSET=utf8";
            $criaTabela = mysqli_query($conexao, $table);
            if(!$criaTabela) {
                die("Erro ao criar tabela");
            } 
        }

        $email = $_POST['aluno_email'];         
        $nome = $_POST['aluno_nome'];
        $data = date("d/m/Y", strtotime($_POST['data_avaliacao']));
        $deficiencia = $_POST['aluno_deficiencia'];
        $massa = $_POST['aluno_massaCorporal'];
        $envergadura = $_POST['aluno_envergadura'];
        $cintura = $_POST['aluno_cintura'];
        $abdominal = $_POST['aluno_abdominal'];
        $corrida = $_POST['aluno_corrida'];
        $salto = $_POST['aluno_salto'];
        $triceps = $_POST['aluno_triceps'];
        $coxa = $_POST['aluno_coxa'];

        // verificar se ainda não existe
        $getEmail = "SELECT * FROM avaliacao WHERE email = '$email'";

        $selectEmail = mysqli_query($conexao, $getEmail);

        // não foi cadastrado avaliação
        if(mysqli_num_rows($selectEmail) == 0 ) {
            $query = "INSERT INTO avaliacao (
                email,
                nome,
                data_avaliacao,
                deficiencia,
                massa,
                envergadura,
                perimetro_cintura,
                abdominal,
                corrida,
                salto,
                triceps,
                coxa
            ) VALUES ('$email', '$nome','$data', '$deficiencia', '$massa', '$envergadura', '$cintura', '$abdominal', '$corrida', '$salto', '$triceps', '$coxa')";
            $insert = mysqli_query($conexao, $query);
            if(!$insert) {
                echo "<script>alert('Erro no cadastro')</script>";
            } else {
                echo "<script>alert('Avaliação do aluno(a) $nome cadastrado com sucesso')</script>";
                // unset as sessões para que outra avaliação de outro aluno possa ser inserida
                unset($_SESSION['nome_aluno']);
                unset($_SESSION['email_aluno']);
            }
        }
    } 
    
    header("refresh:0.5;url=email_avaliacao.php");
    mysqli_close($conexao);
?>
