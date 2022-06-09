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
        <link rel="stylesheet" href="../statics/styles/PerfilProf.css">
        <link rel="stylesheet" href="../statics/styles/main.css">
        <link rel="stylesheet" href="../libs/bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
        <title>Coyo-Clases</title>
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
                    <?php
                        if($_SESSION["ID_TipoUsuario"] == 1){
                            echo "<a class='nav-link' href='#'>Perfil: ALUMNO</a>";
                        } else if($_SESSION["ID_TipoUsuario"] == 2){
                            echo "<a class='nav-link' href='#'>Perfil: PROFESOR</a>";
                        }
                    ?>
                </form>
                <div id="iconosNav">
                    <img src="../statics/media/img/campana.png" class="icono" alt="notificaciones">
                    <a class="nav-link dropdown-toggle"id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../statics/media/img/usuario.png" class="icono" alt="perfil">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class='dropdown-item' href='./perfilUsuario.php'>Perfl</a></li>
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
                            <?php
                                if($_SESSION["ID_TipoUsuario"] == 1){
                                    echo "<a class='nav-link' href='./alumnoInicio.php'>Mis cursos</a>";
                                } else if($_SESSION["ID_TipoUsuario"] == 2){
                                    echo "<a class='nav-link' href='./VistaPrinProf.php'>Mis cursos</a>";
                                }
                            ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./foroPreguntas.php">Foro de preguntas</a>
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
            <span class="coyoseis">Coyo 6</span>
        </div>
        <div id="titulo2">
            <br>
            <span>Perfil</span>
        </div>
        

        <div id="contenedor">
            <section id="contenido" class="secciones">
                <div id="subtitulo">
                    <span>General</span>
                </div>
                <div class="contenido">
                    <?php
                        echo "
                        <span class='pregunta'>Nombre: </span>
                            <span class='descripcion'>";
                            echo $_SESSION["Nombre"];
                        echo "
                            </span>
                        <span class='pregunta'>Apellidos: </span>
                            <span class='descripcion'>";
                            echo $_SESSION["Apellidos"];
                        echo "
                            </span>
                        <span class='pregunta'>Dirección de Email: </span>
                            <span class='descripcion'>";
                            echo $_SESSION["Email"];
                        echo "
                            </span>
                        <span class='pregunta'>Nombre de Usuario: </span>
                            <span class='descripcion'>";
                            echo $_SESSION["Usuario"];
                        echo "
                            </span>
                        <span class='pregunta'>Número Telefónico: </span>
                            <span class='descripcion'>";
                            echo $_SESSION["Telefono"]."</span>";
                        if($_SESSION["ID_TipoUsuario"] == 1){
                            echo "
                            <span class='pregunta'>Número de Cuenta: </span>
                                <span class='descripcion'>";
                                echo $_SESSION["Num_Cuenta"]."</span>";
                            echo "
                            <span class='pregunta'><br>Grado: <br></span>
                                <span class='descripcion'>";
                                echo $_SESSION["Grado"]."</span>";
                            echo "
                            <span class='pregunta'><br>Grupo: <br></span>
                                <span class='descripcion'>";
                                echo $_SESSION["Grupo"]."</span>";
                            echo "
                            <span class='pregunta'><br>Turno: <br></span>
                                <span class='descripcion'>";
                                echo $_SESSION["Turno"]."</span>";
                        } else if($_SESSION["ID_TipoUsuario"] == 2){
                            echo "
                            <span class='pregunta'>Número de Trabajador: </span>
                                <span class='descripcion'>";
                                echo $_SESSION["Num_Trabajador"]."</span>";
                        }
                    ?>
                </div>
            </section>

            <aside class="secciones">
                <div id="nombre">
                    <div id="contenidoNombre">
                        <span>Nombre</span>
                    </div>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>