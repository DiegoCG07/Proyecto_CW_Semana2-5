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
        <!--stylesheets-->
        <link rel="stylesheet" href="../statics/styles/creaTareaProf.css">
        <link rel="stylesheet" href="../statics/styles/main.css">
        <link rel="stylesheet" href="../statics/styles/nav.css">
        <link rel="stylesheet" href="../statics/styles/mainProfe.css">
        <link rel="stylesheet" href="../libs/bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
        <title>Nueva Tarea</title>
    </head>

    <body>
        <header> </header>

        <nav class="navbar bg-light fixed-top">
            <div class="container-fluid">
                <div id="div1">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class="titulo">Coyo 6</h1>
                </div>
                <form class="d-flex" role="search">
                    <a class="nav-link" href="#">Perfil: PROFESOR</a>
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><img src="../statics/media/img/busqueda.png" alt="lupa"></button> -->
                </form>
                <div id="iconosNav">
                    <img src="../statics/media/img/campana.png" class="icono" alt="notificaciones">
                    <a class="nav-link dropdown-toggle"id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../statics/media/img/usuario.png" class="icono" alt="perfil">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="http://localhost/Proyecto_CW_Semana2-5/templates/PerfilProf.php">Perfl</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Preferencias</a></li> -->
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="http://localhost/Proyecto_CW_Semana2-5/dynamics/php/cerrarSesion.php">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </div>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/Proyecto_CW_Semana2-5/templates/VistaPrinProf.php">Mis cursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="http://localhost/Proyecto_CW_Semana2-5/templates/foroPreguntas.php">Foro de preguntas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Calendario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tablón</a>
                        </li>
                    </ul>
                </div>
            </div>    
        </nav>

        <div id="titulo2">
            <span>Nombre de la materia Grupo</span><br>
        </div>

        <div id="contenedor">
              
            <section id="contenido" class="secciones">
                <?php
                    echo "<span id='bienvenida'>¡Bienvenidx, ".$_SESSION["Usuario"]."!</span><br><br>";
                    echo "<span id='bienvenida'>".$_SESSION["Nombre"]." ".$_SESSION["Apellidos"]."</span><br>";
                ?>
                <span id="texto">Crea una publicación</span><br><br>
                
                
                <div id="borde2">
                    <form action="" id="formulario">

                        <label for="titulo">Título: </label><br>
                        <input type="text" name="titulo" id="titulo"><br><br>

                        <!-- Aqui no supe cómo hacerle para que desplegara la descripcion conforme se vaya escribiendo, asi q con CSS solo le puse el tamaño xd -->
                        <div id="contenedorDescripcion">
                            <label for="descripcion">Descripción: </label>
                            <input type="text" name="descripcion" id="descripcion"><br><br>
                        </div><br><br>

                        <input type="file" name="material" id="material"><br><br>

                        <button id="btnEnviar">Crear Publicación</button>
                    </form>
                </div>
            </section>
            <aside class="secciones"> 
                <div id="calendario" class="elementosAside">
                    <span>Calendario</span>
                </div>
                <div id="participantes" class="elementosAside">
                    <span>Participantes</span>
                </div>
            </aside>
        </div>
        <footer>
            <div class="footer">
                <span>
                    <h5>Sitios de interés</h5>
                    <ul>
                        <li><a href="http://enp.unam.mx/" target="_blank">DGENP</a></li>
                        <li><a href="https://www.prepa6.unam.mx/ENP6/_P6/" target="_blank">Página oficial ENP 6</a></li>
                    </ul>
                </span>
                <span>
                    <h5>Contactos y condiciones</h5>
                </span>
                <span>
                    <h5>Aviso Legal</h5>
                    <p>Hecho en México, todos los derechos reservados 2022-2022.</p>       
                </span>
                <span>
                    <h5>Créditos</h5>
                    <ul>
                        <li>Majo</li>
                        <li>Ricardo</li>
                        <li>José Zarco</li>
                    </ul>
                </span>
            </div>
            
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js "></script>
        <script src="../dynamics/JS/creaMaterialProf.js"></script>
    </body>

</html>