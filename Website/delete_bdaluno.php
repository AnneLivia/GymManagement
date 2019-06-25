<?php

    $id = $_GET['id'];
    
    $conexao = mysqli_connect('localhost','root', '') or die("Erro de conexao ".mysqli_connect_error());
        
    $bd = mysqli_select_db($conexao, "maniafitness");
    if(empty($bd)) {
        $criaBD = mysqli_query($conexao, "CREATE DATABASE maniafitness DEFAULT CHARSET=utf8");
        if(!$criaBD) {
            die("Erro ao criar banco de dados");
        }
    }

    // if tabela existe
    if(mysqli_query($conexao, "SELECT * FROM alunos")) {
        $query = "DELETE FROM alunos WHERE id = '$id'";
        $delete = mysqli_query($conexao, $query);
        if($delete) {
            echo "<script>alert('Aluno removido com sucesso')</script>";
        } 
    }
    header("refresh:0.5;url=alunos_ativos.php");
    mysqli_close($conexao);
?>