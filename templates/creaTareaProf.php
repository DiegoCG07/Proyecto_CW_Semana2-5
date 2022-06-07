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
    <link rel="stylesheet" href="../statics/styles/creaTareaProf.css">
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
        ?>
        <span id='bienvenida'>Crear una Tarea</span><br><br>";
    </div>

    <div id="borde">
        <br>
        <span id="texto">Crea una tarea</span><br><br>
        <form action="" id="formulario">

            <label for="titulo">Título: </label><br>
            <input type="text" name="titulo" id="titulo"><br><br>

            <!-- Aqui no supe cómo hacerle para que desplegara la descripcion conforme se vaya escribiendo, asi q con CSS solo le puse el tamaño xd -->
            <div id="contenedorDescripcion">
                <label for="descripcion">Descripción: </label>
                <input type="text" name="descripcion" id="descripcion"><br><br>
            </div><br>

            <button id="btnEnviar">Crear Tarea</button>
        </form>
    </div>


    <div id="borde2">
        <div class="especificaciones">
            <span>Para: Todos</span><br><br>
            <span>Puntos: 100</span><br><br>
            <label for="fecha">Fecha de entrega: </label>
            <input type="date">
        </div>
    </div>




    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js "></script>
</body>
</html>