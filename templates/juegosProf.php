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
        <!-- stylesheets-->
        <!-- <link rel="stylesheet" href="../statics/styles/VistaPrinProf.css"> -->
        <link rel="stylesheet" href="../statics/styles/main.css">
        <link rel="stylesheet" href="../statics/styles/nav.css">
        <link rel="stylesheet" href="../statics/styles/mainProfe.css">
        <link rel="stylesheet" href="../libs/bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
        <title>Juegos</title>
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
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><img src="../statics/media/img/busqueda.png" alt="lupa"></button> -->
                </form>
                <div id="iconosNav">
                    <img src="../statics/media/img/campana.png" class="icono" alt="notificaciones">
                    <a class="nav-link dropdown-toggle"id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../statics/media/img/usuario.png" class="icono" alt="perfil">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="#">Perfl</a></li>
                        <li><a class="dropdown-item" href="#">Preferencias</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Cerrar Sesion</a></li>
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
                            <a class="nav-link" href="#">Página Inicial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Calendario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Mis Cursos</a>
                        </li>
                    </ul>
                </div>
            </div>    
        </nav>

        <div id="titulo2">
            <br>
            <span>Nombre de la materia Grupo</span><br>
            
        </div>
        <div id="contenedor">
            <section id="contenido" class="secciones">
                <?php
                    echo "<span id='bienvenida'>".$_SESSION["Nombre"]." ".$_SESSION["Apellidos"]."</span><br>";
                    echo "<span id='bienvenida'>¡Bienvenidx, ".$_SESSION["Usuario"]."!</span><br><br>";
                ?>
                <button id="btn-editar">Editar ahorcado</button>
                <button id="btn-vista">Vista Previa</button>
                
                <form id="formEditar" style="display: none;">
                    <br><br>
                    <fieldset style="width: 400px; color: black;">
                        <legend>Editar Ahorcado</legend>
                        <br><br><label for="input">Agrega un palabra menor a 10 caracteres: </label><br><br>
                        <input type="text" name="input" id="input" maxlength="10">
                        <button id="agregar">Agregar</button>
                        <ul id="lista"></ul><br>
                        <label for="estado">Estado del juego: </label>
                        <select name="estado" id="estado">
                            <option value="1">Oculto</option>
                            <option value="2">No oculto</option>
                        </select><br><br>
                        <button id="enviar">Enviar</button>
                    </fieldset>
                </form>
                
                <form action="./VistaClaseProf.php" method="post">
                    <button id="btn-Regresar">Regresar</button>
                </form>
                
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
                        <li><a href="">DGENP</a></li>
                        <li><a href="">Página oficial ENP 6</a></li>
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
                    <h5 href="">Créditos</h5>
                </span>
            </div>
            
        </footer>


        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js "></script>
        <script src="../dynamics/JS/juegosProf.js"></script>
    </body>

</html>