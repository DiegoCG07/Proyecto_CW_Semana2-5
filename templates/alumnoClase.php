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
        <title>Coyo-Clases</title>
        <link rel="icon" href="../statics/media/img/icono.jpg" type="image/png">
        <link rel="stylesheet" href="../statics/styles/main.css">
        <link rel="stylesheet" href="../libs/bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
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
                    <a class="nav-link" href="#">Perfil: ALUMNO</a>
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><img src="../statics/media/img/busqueda.png" alt="lupa"></button> -->
                </form>

                <div id="iconosNav">
                    <!-- <img src="../statics/media/img/campana.png" class="icono" alt="notificaciones"> -->
                    <a class="nav-link dropdown-toggle"id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../statics/media/img/usuario.png" class="icono" alt="perfil">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="./PerfilProf.php">Perfl</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Preferencias</a></li> -->
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../dynamics/php/cerrarSesion.php">Cerrar Sesion</a></li>
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
                            <a class="nav-link" href="./alumnoInicio.php">Mis cursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./foroPreguntas.php">Foro de preguntas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Calendario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tablón</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="">Mis Cursos</a>
                        </li> -->
                    </ul>
                </div>
            </div>         
        </nav>

        <div id="titulo2">
            <span class="coyoseis">NOMBRE CLASE</span>
        </div>

        <div id="contenedor">
            <section id="contenido" class="secciones">
                <?php
                        echo "<span id='bienvenida'>".$_SESSION["Nombre"]." ".$_SESSION["Apellidos"]."</span><br>";
                    echo "<span id='bienvenida'>¡Bienvenidx, ".$_SESSION["Usuario"]."!</span><br><br>";
                ?>

                <!--planeo ponerle un evento para que muestre solo tareas o solo material-->
                <div class="contenidoClase">
                    <span>Avisos generales</span>
                    <div id="avisos" style="display: none;">
                        
                    </div>
                </div>
                    
                <select name="publicaciones" id="publicaciones"  class="contenidoClase">
                    <option value="1">Asignaciones</option>
                    <option value="2">Material</option>
                    <option value="3">Juego</option>
                </select> 

               <div id="tareas" style="display: none;"  class="contenidoClase">
                    <span>Asignaciones</span>
                </div>

                <div id="material" style="display: none;"  class="contenidoClase">
                    <span>Material</span>
                </div>
                <div id="juegos">
                    <form action="./ahorcado.html" method="post">
                        <button id="ahorcado" style="display: none;">Ahorcado</button>
                    </form>
                </div>
                <!-- <div id="tablón" style="display: none;">
                    <span>Aisgnaciones</span>
                </div> -->
            </section>

            <aside class="secciones">
                <div class="opciones">
                    <!-- Juegos educativos-->
                    <div id="calendario" class="elementosAside">
                        <a href="./alumnoCalendario.php" class="linksVistas">Calendario</a>
                    </div>  
                    <div id="foro" class="elementosAside">
                        <a href="./alumnoForo.php" class="linksVistas">Foro de Dudas</a>
                    </div>      
                    <div id="calificaciones" class="elementosAside">
                        <a href="./alumnoCalificaciones.php" class="linksVistas">Calificaciones</a>
                    </div>
                    <div id="contacto" class="elementosAside" href="./alumnoContacto.php">
                        <a href="./alumnoContacto.php" class="linksVistas">Contacta a tu profesor</a>
                    </div>
                </div>
            </aside>
        </div>

        <footer>
            <div class="footer">
                <span>
                    <h5>Sitios de interés</h5>
                    <ul>
                        <li><a href="http://enp.unam.mx/" target="_blank">Página Oficial de la ENP</a></li>
                        <li><a href="https://www.prepa6.unam.mx/ENP6/_P6/" target="_blank">Página oficial ENP 6</a></li>
                    </ul>
                </span>
                <span>
                    <h5>Aviso Legal</h5>
                    <p>Hecho en México, todos los derechos reservados 2022-2022.</p>
                    <a href="./creditos.html">Créditos</a>       
                </span>
                <span>
                    <h5>Contactos y condiciones</h5>
                </span> 
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../dynamics/JS/alumnoClase.js"></script>
    </body>
</html>