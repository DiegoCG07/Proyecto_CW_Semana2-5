<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--stylesheets-->
        <title>Clases</title>
        <link rel="icon" href="../statics/media/img/icono.jpg" type="image/png">
        <link rel="stylesheet" href="../statics/styles/vistaAdmin.css">
        <link rel="stylesheet" href="../statics/styles/main.css">
        <link rel="stylesheet" href="../libs/bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    </head>
    <body>
        <nav class="navbar bg-light fixed-top">
            <div class="container-fluid">
                <div id="div1">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class="titulo">Coyo 6</h1>
                </div>
                <form class="d-flex" role="search">
                    <a class="nav-link" href="./vistaPrinAdmin.php">Perfil: ADMINISTRADOR</a>
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><img src="../statics/media/img/busqueda.png" alt="lupa"></button> -->
                </form>

                <div id="iconosNav">
                    <img src="../statics/media/img/campana.png" class="icono" alt="notificaciones">
                    <a class="nav-link dropdown-toggle"id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../statics/media/img/usuario.png" class="icono" alt="perfil">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="./PerfilProf.php">Perfl</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Preferencias</a></li> -->
                        <li><hr class="dropdown-divider"></li>
                        <!-- <li><a class="dropdown-item" href="../dynamics/php/cerrarSesion.php">Cerrar Sesion</a></li> -->
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
                            <a class="nav-link" href="./adminClases.php">Clases</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./adminPartici.php">Usuarios</a>
                            <!-- vista de profes y alumnos -->
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

        <div id="contenedor">
            <section id="contenido" class="contenido">
                <span>Administrador</span>
                <div class="grupos" id="agregarAdmin">
                    <button id="btnAgregar">Agregar administrador</button><br>
                </div>
                <form id="formAgregar" style="display:none;">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre"><br><br>
                    <label for="apellidos">Apellidos: </label>
                    <input type="text" name="apellidos" id="apellidos"><br><br>
                    <label for="correo">Correo electrónico: </label>
                    <input type="email" name="correo" id="correo"><br><br>
                    <label for="usuario">Nombre de usuario: </label>
                    <input type="text" name="usuario" id="usuario"><br><br>
                    <label for="contrasena">Contraseña: </label>
                    <input type="password" name="contrasena" id="contrasena"><br><br>
                    <button type="submit" id="enviar">Enviar</button>
                </form>
            </section>   
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

        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js "></script>
        <script src="../dynamics/JS/agregarAdmin.js"></script>
    </body>

</html>