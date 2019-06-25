<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location: login.php");
}

$email = $_SESSION['email'];
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
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;MANIA FITNESS</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a id="Logout" href="#">LOG OUT</a></li>
                        <li><a href="settings.php">CONFIGURAÇÕES</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <?php
                        $address = "";

                        $conexao = mysqli_connect('localhost', 'root', '') or die("Erro de conexao com o servidor" . mysqli_connect_error());

                        $bd = mysqli_select_db($conexao, "ManiaFitness");

                        if (empty($bd)) {
                            die("Banco de dados não encontrado");
                        }

                        $query = "SELECT sexo FROM adm WHERE email = '$email'";
                        $select = mysqli_query($conexao, $query);

                        if ($select) {
                            $genero = mysqli_fetch_array($select)['sexo'];
                            if ($genero == "feminino") {
                                echo "<img src='assets/img/female.png' class='userImg img-responsive'/>";
                            } else {
                                echo "<img src='assets/img/male.png' class='userImg img-responsive'/>";
                            }
                        }
                        ?>
                        <p id="userEmail"><?php echo $email; ?></p>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-desktop "></i>Inicio</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit "></i>Gerênciamento<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Alunos<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="alunos_ativos.php">Alunos Ativos</a>
                                    </li>
                                    <li>
                                        <a href="cadastrar_alunos.php">Cadastrar Aluno</a>
                                    </li>
                                    <li>
                                        <a href="avaliacao.php">Avaliação</a>
                                    </li>
                                    <li>
                                        <a href="treinos.php">Treinos</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Instrutores<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="instrutores_ativos.php">Instrutores Ativos</a>
                                    </li>
                                    <li>
                                        <a href="cadastrar_instrutor.php">Cadastrar Instrutores</a>
                                    </li>
                                    <li>
                                        <a href="aulas.php">Aulas</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Cadastrar Intrutores
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Informações Básicas</h3>
                                        <form method="POST" action="create_bdInstrutor.php">
                                            <div class="form-group">
                                                <label>Nome Completo</label>
                                                <input class="form-control" id="instrutor_nome" name="instrutor_nome" placeholder="Nome" required />
                                            </div>
                                            <div class="form-group">
                                                <label>CPF</label>
                                                <input type="text" class="form-control" placeholder="Digite o CPF" name="instrutor_cpf" required />
                                                <p class="help-block">000.000.000-00</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Data de Nascimento</label>
                                                <input type="date" class="form-control" name="instrutor_nascimento" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Sexo</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="instrutor_sexo" id="optionsRadios1" value="feminino" checked />Feminino
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="instrutor_sexo" id="optionsRadios2" value="masculino" /> Masculino
                                                    </label>
                                                </div>
                                            </div>
                                            <h3> Dados para contato </h3>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Digite o email" name="instrutor_email" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Telefone</label>
                                                <input type="text" class="form-control" placeholder="Digite o número do telefone" name="instrutor_telefone" required />
                                            </div>
                                            <h3>Endereço</h3>
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input type="text" class="form-control" placeholder="Digite o nome da cidade" name="instrutor_cidade" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Bairro</label>
                                                <input type="text" class="form-control" placeholder="Digite o nome do bairro" name="instrutor_bairro" required />
                                            </div>
                                            <div class="form-group">
                                                <label>CEP</label>
                                                <input type="text" class="form-control" placeholder="Digite o CEP onde reside" name="instrutor_cep" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Número da casa</label>
                                                <input type="text" class="form-control" placeholder="Digite o número da casa" name="instrutor_ncasa" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Complemento</label>
                                                <input type="text" class="form-control" placeholder="Digite um ponto de referência" name="instrutor_complemento" required />
                                            </div>

                                            <h3> Função </h3>
                                            <div class="form-group">
                                                <label>Tipo de treinamento</label>
                                                <input class="form-control" id="instrutor_treinamento" name="instrutor_treinamento" placeholder="Administrará qual treinamento com o corpo" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Dias disponíveis</label><br>
                                                <input class="form-control" id="instrutor_days" name="instrutor_days" placeholder="Dias que estará dispónível..." required />
                                                <p class="help-block">Segunda, Terça, Quarta, ...</p>
                                            </div>
                                            <button type="submit" class="btn-cadastrar btn btn-primary">Cadastrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Elements -->
                </div>
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
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>

</html>