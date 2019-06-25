<?php 
    session_start();
    if(!isset($_SESSION['email'])) {
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

                            $conexao = mysqli_connect('localhost','root','') or die("Erro de conexao com o servidor".mysqli_connect_error());

                            $bd = mysqli_select_db($conexao, "ManiaFitness");

                            if(empty($bd)) {
                                die("Banco de dados não encontrado");
                            }

                            $query = "SELECT sexo FROM adm WHERE email = '$email'";
                            $select = mysqli_query($conexao, $query);
                            
                            if($select) {
                                $genero = mysqli_fetch_array($select)['sexo'];
                                if($genero == "feminino") {
                                    echo "<img src='assets/img/female.png' class='userImg img-responsive'/>";
                                } else {
                                    echo "<img src='assets/img/male.png' class='userImg img-responsive'/>";
                                }   
                            }
                        ?>
                       
                        <p id="userEmail"><?php echo $email;?></p>
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
                        <h2>Avaliação dos Alunos</h2>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <table class="table_ativos table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Data</th>
                                    <th>Possui deficiência? Qual?</th>
                                    <th>Massa Corporal</th>
                                    <th>Envergadura</th>
                                    <th>Perímetro da cintura</th>
                                    <th>Abdominal</th>
                                    <th>Corrida de 20 metros</th>
                                    <th>Salto em distância</th>
                                    <th>Triceps</th>
                                    <th>Coxa</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                
                                    $conexao = mysqli_connect('localhost','root', '') or die("Erro de conexao ".mysqli_connect_error());
                                        
                                    $bd = mysqli_select_db($conexao, "ManiaFitness");
                                    if(empty($bd)) {
                                        $criaBD = mysqli_query($conexao, "CREATE DATABASE ManiaFitness DEFAULT CHARSET=utf8");
                                        if(!$criaBD) {
                                            die("Erro ao criar banco de dados");
                                        }
                                    }
                                
                                
                                    if(mysqli_query($conexao, "SELECT * FROM Avaliacao")) {
                                    
                                        $getTodosAlunos = "SELECT * FROM Avaliacao";
                                    
                                        $select = mysqli_query($conexao, $getTodosAlunos);
                                        
                                        if(mysqli_num_rows($select) != 0 ) {
                                            $i = 0;
                                            while($info = mysqli_fetch_array($select)) {
                                                $id = $info['id'];
                                                $name = $info['nome'];
                                                $email = $info['email'];
                                                $data = $info['data_avaliacao'];
                                                $deficiencia = $info['deficiencia'];
                                                $massa = $info['massa'];
                                                $envergadura = $info['envergadura'];
                                                $cintura = $info['perimetro_cintura'];
                                                $abdominal = $info['abdominal'];
                                                $corrida = $info['corrida'];
                                                $salto = $info['salto'];
                                                $triceps = $info['triceps'];
                                                $coxa = $info['coxa'];
                                                echo "<tr id='$id'>
                                                        <td>$name</td>
                                                        <td>$email</td>
                                                        <td>$data</td>
                                                        <td>$deficiencia</td>
                                                        <td>$massa</td>
                                                        <td>$envergadura</td>
                                                        <td>$cintura</td>
                                                        <td>$abdominal</td>
                                                        <td>$corrida</td>
                                                        <td>$salto</td>
                                                        <td>$triceps</td>
                                                        <td>$coxa</td>
                                                        <td><button class='delete_avaliacao btn btn-danger'>Delete</button></td>
                                                </tr>";
                                            }
                                            $i++;
                                        }
                                    }
                                    
                                    mysqli_close($conexao);
                                ?>
                            
                            </tbody>
                        </table>
                        <button class="btn-addAvalicao btn btn-primary" onclick="window.location.href = 'email_avaliacao.php'";>Adicionar nova avaliação</button>
                    </div>
                </div>
            </div>
            <footer>
                <p class="text-center">
                    Developed by <a href="https://github.com/AnneLivia" target="u_black">Anne Livia</a> 
                    and <a href="https://github.com/Marcos-Fernando" target="u_black">Marcos Fernando</a><br/>
                    © All Rights Reserved.
                    <script>document.write(new Date().getFullYear())</script>
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