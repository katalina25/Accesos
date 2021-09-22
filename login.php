<?php
session_start();


if (!(isset($_SESSION['usu']) && $_SESSION['usu'])) {}
 else{
    header('Location: index.php');
}
$mostrarError = 0;
if (!(isset($_SESSION['error']) && $_SESSION['error'])) {}
 else{
    unset($_SESSION["error"]);
    $mostrarError = 1;
}


?>
<!DOCTYPE html>

<html>
<head>
    <title>Accesos Clínica</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body class="is-preload">
    <!-- Wrapper -->
    <form method="POST" action="ActLogin.php">
        <div id="wrapper">


            <!-- Header -->
            <header id="header">
                <div class="inner">

                    <!-- Logo -->
                    <a href="#" class="logo" title="Refrescar página web">
                        <span class="symbol">
                            <img src="images/logo.png" alt="" style="object-fit: cover;" /></span>
                        <span class="title">Accesos Directos </span>
                        <h2>Clínica Alemana Osorno</h2>
                    </a>


                </div>
            </header>

            <!-- Main -->
            <div id="main">
                <div class="inner">

                    <div class="container" style="margin-top:1.5em">
                        <h2>Iniciar Sesión</h2>

                    
                        
                        <input runat="server" class="" name="txtUser" id="txtUser" type="text" placeholder="Usuario" required/>
                        <input runat="server" class="" name="txtPassword" id="txtPassword" type="password" placeholder="Contraseña" required/>
                        <button ID="btnLogin" type="submit" class="button small fit">Iniciar Sesión</button>
                        
                        <div id="errorLogin" class="alerta">
								Usuario y/o contraseña incorrectos, intente nuevamente.
						</div>
                    </div>
                </div>

            </div>

        <!-- Footer -->
        <?php include_once 'footer.php'?>

        </div>
    </form>

    <script>
    $(document).ready(function () {
        $("#errorLogin").prop("hidden", true);
        var error = <?= $mostrarError?> ;
        if (error != 0) {
        $("#errorLogin").prop("hidden", false);
        $( "#errorLogin" ).fadeOut( 7000, function() {});
        }
      });
    </script>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>





</body>

</html>