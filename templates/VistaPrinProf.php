<?php
    session_name("Sesion");
    session_id("021e31y8d4655");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coyo 6</title>
        <link rel="stylesheet" href="../statics/styles/VistaPrinProf.css">
        <link rel="stylesheet" href="../libs/bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    </head>
    <body>
        <nav class="navbar bg-light fixed-top">
            <div class="container-fluid">

                <a class="navbar-brand" id="titulo">Coyo 6</a>

                <button id="boton" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Opciones</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="https://www.prepa6.unam.mx/ENP6/_P6/">Conoce nuestro plantel</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="https://www.prepa6.unam.mx/ENP6/_P6/">Prepa 6</a>
                            </li>
                        </ul>
                    
                    </div>
                </div>
            </div>
        </nav>


        <div id="titulo2">
            <br><br>
            <span>Coyo 6</span>
        </div>


        <div id="borde">
            <br>
            <?php
                echo "<span id='bienvenida'>¡Bienvenidx, ".$_SESSION["Usuario"]."!</span><br><br>";
            ?>

            <div id="contenedorGrupos"></div>
            <a href="./crearClaseProf.php" target="_self">
                <div class="grupos">
                    <br>
                    <span>+</span><br><br>
                    <span>Agregar clase</span>
                </div>
            </a>

            <form action='../dynamics/php/cerrarSesion.php' method='post' target='_self' style="margin: 3em;">
                <button>Cerrar sesion</button>
            </form>
        </div>

        <div class="opciones">
            <div id="calendario">
                <span>Calendario</span>
            </div>
            <div id="avisos">
                <span>Avisos</span>
            </div>
        </div>

        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js "></script>
        <script src="../dynamics/JS/VistaPrinProf.js"></script>
    </body>
</html>