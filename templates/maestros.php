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
        <title>Principal</title>
        <link rel="stylesheet" href="../libs/bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
        <link rel="stylesheet" href="../libs/bootstrap-5.2.0-beta1-dist/css/bootstrap.css.map">
        <link rel="stylesheet" href="../statics/styles/inicio.css">
    </head>

    <body>

        <!-- BARRA DE NAVEGACION -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Titulo -->
                <a class="navbar-brand" id="titulo" href="#">Coyo 6</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Perfil: MAESTRO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Más</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" id="buscador">
                        <input class="form-control me-2" type="search" placeholder="¡Bienvenid@!" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
        <div>
            <h1 class="logo">Coyo 6</h1>
            <img src="../statics/img/coyoseis.png" alt="Collage" class="coyoseis">
        </div>
        <div id="clases">
            <?php
                echo "<h1>¡Bienvenidx, ".$_SESSION["Usuario"]."!</h1>";
            ?>
            <br>

            <!-- clases -->
            <div class="card">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title">Materia 1</h5>
                    <p class="card-text">Grupo: </p>
                    <a href="#" class="btn btn-primary">Ir a Tablón</a>
                </div>
            </div>

            <!-- <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Materia 2</h5>
                    <p class="card-text">Grupo: </p>
                    <a href="#" class="btn btn-primary">Ir a Tablón</a>
                </div>
            </div>


            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Materia 3</h5>
                    <p class="card-text">Grupo: </p>
                    <a href="#" class="btn btn-primary">Ir a Tablón</a>
                </div>
            </div>

            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Materia 4</h5>
                    <p class="card-text">Grupo: </p>
                    <a href="#" class="btn btn-primary">Ir a Tablón</a>
                </div>
            </div>

            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Materia 5</h5>
                    <p class="card-text">Grupo: </p>
                    <a href="#" class="btn btn-primary">Ir a Tablón</a>
                </div>
            </div>

            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Materia 6</h5>
                    <p class="card-text">Grupo: </p>
                    <a href="#" class="btn btn-primary">Ir a Tablón</a>
                </div>
            </div> -->

            <form action='../dynamics/php/cerrarSesion.php' method='post' target='_self'>
                <button>Cerrar sesion</button>
            </form>

            <script src="../libs/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.js"></script>
    </body>

</html>