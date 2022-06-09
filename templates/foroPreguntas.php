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
        <title>Foro de preguntas</title>
        <!--stylesheets-->
        <link rel="icon" href="../statics/media/img/icono.jpg" type="image/png">
        <link rel="stylesheet" href="../statics/styles/main.css">
        <link rel="stylesheet" href="../statics/styles/foroPreguntas.css">
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
                <div>
                    <?php
                        if($_SESSION["ID_TipoUsuario"] == 1){
                            echo "<a class='nav-link' href='./perfilUsuario.php'>Perfil: ALUMNO</a>";
                        } else if($_SESSION["ID_TipoUsuario"] == 2){
                            echo "<a class='nav-link' href='./perfilUsuario.php'>Perfil: PROFESOR</a>";
                        }else if($_SESSION["ID_TipoUsuario"] == 4){
                            echo "<a class='nav-link' href='./perfilUsuario.php'>Perfil: ADMIN";
                        }
                    ?>
                </div>

                <div id="iconosNav">
                    <a class="nav-link dropdown-toggle"id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../statics/media/img/usuario.png" class="icono" alt="perfil">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class='dropdown-item' href='./perfilUsuario.php'>Perfil</a></li>
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
                                echo "<a class='nav-link' href='./alumnoTablero.php'>Mis cursos</a>";
                            } else if($_SESSION["ID_TipoUsuario"] == 2){
                                echo "<a class='nav-link' href='./VistaPrinProf.php'>Mis cursos</a>";
                            }else if($_SESSION["ID_TipoUsuario"] == 4){
                                echo "<a class='nav-link' href='./VistaPrinAdmin.php'>Página Inicial</a>";
                            }
                        ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./foroPreguntas.php">Foro de preguntas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./calendario.html">Calendario</a>
                        </li>
                    </ul>
                </div>
            </div>         
        </nav>

        <div id="titulo2">
            <span class="coyoseis">Foro de Preguntas</span>
        </div>

        <!-- <h1>Foro de Preguntas</h1> -->
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-primary" id="btnPredeterminadas">Dudas frecuentes</button>
            <button type="button" class="btn btn-outline-primary" id="btnDudas">Foro de dudas</button>
        </div>

        <div id="predeterminadas" style="display: none;"></div>

        <div id="dudas" style="display: none;">
            <?php
                if($_SESSION["ID_TipoUsuario"] == 1){
                    echo "<form>
                        <input type='text' name='preguntaForo' id='preguntaForo' placeholder='Haz una pregunta'><br><br>
                        <button type='submit' id='agregar'>+</button>
                        <button type='reset' id='cancelar'>Cancelar</button>
                    </form>";
                }
            ?>
            <div id="dudasForo"></div>
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

        <script src="../dynamics/JS/foroPreguntas.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>