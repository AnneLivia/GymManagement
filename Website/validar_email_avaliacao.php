<?php
session_start();

$email = $_POST['aluno_email'];

$conexao = mysqli_connect('localhost', 'root', '') or die('Erro de conexão' . mysqli_connect_error());

$bd = mysqli_select_db($conexao, "ManiaFitness");

// se banco de dados não existe, criar outro
if (empty($bd)) {
    $createBD = mysqli_query($conexao, "CREATE DATABASE ManiaFitness DEFAULT CHARSET=utf8");
    // se o banco de dados não tiver sido criado
    if (!$createBD) {
        die("Erro ao criar banco de dados");
    }
}

// se chegou aqui, BD existe ou foi criado
// agora verificar se tabela alunos existe

// pode_inserir é a variável que determinará se poderá inserir os dados da avaliação ou não
$pode_inserir = false;
// se tabela alunos existir
if (mysqli_query($conexao, "SELECT * FROM alunos")) {
    // verificar se o email digitado existe lá, pois só assim poderá ser cadastrado uma avaliação
    $search_element = mysqli_query($conexao, "SELECT * FROM alunos WHERE email = '$email'");
    // se não tiver encontrado, dado não existe na tabela
    if (mysqli_num_rows($search_element) > 0 ){
        // agora se tiver encontrado, aluno está cadastrado na academia, por isso pode inserir recebe true,
        $pode_inserir = true;
        // mas, já que somente uma avaliação por vez será cadastrada para cada aluno, 
        // deve ser verificado se a avaliação desse aluno já não está cadastrada
        if(mysqli_query($conexao, "SELECT * FROM avaliacao")) {
           $possui_avaliacao = mysqli_query($conexao, "SELECT * FROM avaliacao WHERE email = '$email'");
           if (mysqli_num_rows($possui_avaliacao) > 0) {
               // se entrar aqui, é porque já existe dados sobre esse aluno na tabela de avaliação
               // portanto pode inserir recebe false, para não permitir que o dado seja inserido
               $pode_inserir = false;
               echo "<script>alert('Aluno com email $email, já possui avaliação cadastrada no sistema')</script>";
           } 
        } 

        if($pode_inserir){
            // se entrar aqui, é porque o aluno é cadastrado na academia, e esse aluno ainda não possui avaliação cadastrada
            while ($info = mysqli_fetch_array($search_element)) {
                // portanto, obter o nome e o email desse aluno, para que possa ser criado as sessões e 
                // inserido esses dados no form, para que o usuário não necessite preencher novamente
                $_SESSION['nome_aluno'] = $info['nome'];
                $_SESSION['email_aluno'] = $email;
                
                header("location: inserir_avaliacao.php");
            }
        } 
    } else {
        // se chegou aqui, email não está cadastrado no sistema
        echo "<script>alert('Aluno com email $email, não está cadastrado no sistema')</script>";
    }
} else {
    echo "<script>alert('Não existe aluno cadastrado no sistema')</script>";
}

header("refresh: 0.5; url = email_avaliacao.php");

mysqli_close($conexao);
