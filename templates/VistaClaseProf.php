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
    <title>Clases</title>
    <link rel="stylesheet" href="../statics/styles/VistaClaseProf.css">
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
        <br>
        <span>Nombre de la materia Grupo</span><br>
        <?php
            echo "<span id='bienvenida'>".$_SESSION["Nombre"]." ".$_SESSION["Apellidos"]."</span><br>";

            echo "<span id='bienvenida'>¡Bienvenidx, ".$_SESSION["Usuario"]."!</span><br><br>";
        ?>
    </div>

    <div id="borde">
        <div id="generarAviso">
            <span>Generar un aviso</span>
        </div>
        <div id="generarTarea">
            <span>Generar una Tarea</span>
        </div>
        <div id="generarActividad">
            <span>Generar una Actividad</span>
        </div>
        <div id="generarPublicacion">
            <span>Generar una Publicación</span>
        </div>
    </div>
    
    <div class="opciones">
        <div id="calendario">
            <span>Calendario</span>
        </div>
        <div id="participantes">
            <span>Participantes</span>
        </div>
        <div id="contacto">
            <span>Contacta a tu alumno</span>
        </div>
        <a href="./juegosProf.php" target="_self">
            <div id="contacto">
                <span>Juegos</span>
            </div>
        </a>
    </div>

    


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js "></script>
    <script src="../dynamics/JS/VistaClaseProf.js"></script>
</body>
</html>