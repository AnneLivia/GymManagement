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
                <form action="create_bdadm.php" class="form-signin" method="POST">
                    <input id="uEmail" name="uEmail" type="email" placeholder="Insira seu email" class="form-control" required />
                    <input id="uSenha" name="uSenha" type="password" placeholder="Digite sua senha" class="form-control" required />
                    <div class="form-group">
                        <label>Sexo</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="adm_sexo" id="optionsRadios1" value="feminino" checked />Feminino
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="adm_sexo" id="optionsRadios2" value="masculino" /> Masculino
                            </label>
                        </div>
                    </div>
                    <button class="btn text-muted text-center btn-danger btnRegistrar" type="submit">Registrar</button>
                    <button class="btn text-muted text-center btn-success btnVoltar">Voltar</button>
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

        <script src="assets/js/cadastro.js"></script>

</body>
<!-- END BODY -->

</html>