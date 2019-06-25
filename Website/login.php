<?php
    session_start();
    // encerrar todas as sessões em login
    if (isset($_SESSION['email'])) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
    }

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
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mania Fitness</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/login.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<!-- BEGIN BODY -->

<body>

    <!-- PAGE CONTENT -->
    <div class="container">
        <div class="text-center">
            <img src="assets/img/logo.jpg" id="logoimg" alt=" Logo" />
        </div>
        <div class="tab-content">
            <div id="login" class="tab-pane active">
                <form action="validar_login.php" method="POST" class="form-signin">
                    <input type="email" name="uEmail" placeholder="Insira seu email" class="uEmail form-control" required />
                    <input type="password" name="uSenha" placeholder="Digite sua senha" class="uSenha form-control" required />
                    <button class="btn text-muted text-center btn-success btnLogin">Log In</button>
                    <button class="btn text-muted text-center btn-danger btnCadastrar" type="submit">Registrar</button>
                </form>
            </div>
            <footer>
                <p class="text-center">
                    Developed by <a href="https://github.com/AnneLivia" target="u_black">Anne Livia</a>
                    and <a href="https://github.com/Marcos-Fernando" target="u_black">Marcos Fernando</a><br />
                    © All Rights Reserved.
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                </p>
            </footer>
        </div>

        <script src="assets/js/login.js"></script>

</body>
<!-- END BODY -->

</html>