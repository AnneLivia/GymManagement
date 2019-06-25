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
                        <h2> Modalidades</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="portfolio-item mix_all">
                                <img src="assets/img/portfolio/ballet.jpg" class="img img-responsive" alt="" />
                                <div class="overlay">
                                    <p class="text-center">
                                        <strong>AULA DE BALLET</strong><br />
                                        O Ballet Clássico (ou balé clássico) nos leva a
                                        outros mundos e épocas. É algo além da nossa vida
                                        diária. Usa muitas convenções e é isso que o faz
                                        claro e compreensível, sem que se precise da
                                        linguagem ou de outras formas de comunicação.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <div class="portfolio-item">
                                <img src="assets/img/portfolio/jump.jpg" class="img-responsive " alt="" />
                                <div class="overlay">
                                    <p class="text-center">
                                        <strong>JUMP</strong><br />
                                        O Jump é praticada em cima de pequenas camas
                                        elásticas e mistura a dança com aeróbica.
                                        Tem alto gasto calórico e é recomendada para
                                        perder peso. Além de ser um ótimo exercício
                                        cardiovascular e prevenção da osteoporose.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <div class="portfolio-item">
                                <img src="assets/img/portfolio/zumba.jpg" class="img-responsive " alt="" />
                                <div class="overlay">
                                    <p class="text-center">
                                        <strong>ZUMBA</strong><br />
                                        Aqueles que buscam se agitar com uma dança diferente com muita animação,
                                        mesmo que nunca tenham praticado qualquer tipo de dança antes.
                                        Dançando as coreografias do Zumba,
                                        você adotará um estilo de vida mais
                                        saudável e terá muito mais disposição e
                                        alegria.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <div class="portfolio-item">
                                <img src="assets/img/portfolio/yoga.jpg" class="img-responsive " alt="" />
                                <div class="overlay">
                                    <p class="text-center">
                                        <strong>YOGA</strong><br />
                                        Yoga é a transformação da consciência humana em consciência divina.
                                        É uma filosofia prática que permite ao ser humano acordar de seu
                                        sono e vivenciar a felicidade permanente que ele é.
                                        Yoga é a suspensão dos processos mentais.
                                        Yoga é uma prática que procura trabalhar o ser humano como um todo.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <div class="portfolio-item">
                                <img src="assets/img/portfolio/musculacao.jpg" class="img-responsive " alt="" />
                                <div class="overlay">
                                    <p class="text-center">
                                        <strong>MUSCULAÇÃO</strong><br />
                                        A musculação é um tipo de exercício realizado com pesos de diversas cargas,
                                        amplitude e tempo de contração, o que faz dela uma atividade física indicada
                                        para pessoas com diferentes objetivos.
                                        Musculação é a atividade que força os músculos de maneira controlada buscando o aumento da força.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <div class="portfolio-item">
                                <img src="assets/img/portfolio/spinning.jpg" class="img-responsive " alt="" />
                                <div class="overlay">
                                    <p class="text-center">
                                        <strong>SPINNING</strong><br />
                                        Uma hora de spinning pode fazer você gastar entre 500 a 700 calorias, dependendo da intensidade.
                                        O spinning também tem características semelhantes a exercícios intervalados de alta intensidade, e com isso, 
                                        pode aumentar a queima de gordura por tempo considerável mesmo depois do exercício.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
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