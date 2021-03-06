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
        <title>Nueva Tarea</title>
        <link rel="icon" href="../statics/media/img/icono.jpg" type="image/png">
        <!--stylesheets-->
        <link rel="stylesheet" href="../statics/styles/creaTareaProf.css">
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
                                echo "<a class='nav-link' href='./VistaPrinAdmin.php'>P??gina Inicial</a>";
                            }
                        ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./foroPreguntas.php">Foro de preguntas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./calendario.php">Calendario</a>
                        </li>
                    </ul>
                </div>
            </div>         
        </nav>

        <div id="titulo2">
            <span>Coyo 6</span><br>
        </div>

        <div id="contenedor">
              
            <section id="contenido" class="secciones">
                <?php
                    echo "<span id='bienvenida'>??Bienvenidx, ".$_SESSION["Usuario"]."!</span><br><br>";
                    echo "<span id='bienvenida'>".$_SESSION["Nombre"]." ".$_SESSION["Apellidos"]."</span><br>";
                ?>
                <span id="texto">Crea una publicaci??n</span><br><br>
                
                
                <div id="borde2">
                    <?php
                        echo "
                            <form action='./creaPublicacionProf.php' id='formulario' method='post' enctype='multipart/form-data'>

                            <label for='titulo'>T??tulo: </label><br>
                            <input type='text' name='titulo' id='titulo'><br><br>

                            <!-- Aqui no supe c??mo hacerle para que desplegara la descripcion conforme se vaya escribiendo, asi q con CSS solo le puse el tama??o xd -->
                            <div id='contenedorDescripcion'>
                                <label for='descripcion'>Descripci??n: </label>
                                <input type='text' name='descripcion' id='descripcion'><br><br>
                            </div><br><br>

                            <input type='file' name='archivo' id='archivo'><br><br>

                            <button id='btnEnviar'>Crear Publicaci??n</button>
                            </form>
                        ";
    
                        $titulo = (isset($_POST["titulo"]) && $_POST["titulo"] != "") ?$_POST["titulo"] : false;
                        $descripcion = (isset($_POST["descripcion"]) && $_POST["descripcion"] != "") ?$_POST["descripcion"] : false;

                        if($titulo != "" && $descripcion!="" && isset($_FILES['archivo'])){
                            $name = $_FILES['archivo']['name'];
                            $ext = pathinfo($name,PATHINFO_EXTENSION);

                            if($ext=="png" || $ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="bmp" || $ext=="txt" || $ext=="doc" || $ext=="docx" || $ext=="ppt" || $ext=="pptx" || $ext=="pdf" || $ext=="xls"){
                                $arch=$_FILES['archivo']['tmp_name'];
                                $nombreArchivo = $_SESSION["ID_Clase"]."_".$titulo.".".$ext;
                                $ruta = "../statics/files/material/$nombreArchivo";
                                rename($arch,$ruta);

                                // PETICION
                                include("../dynamics/php/config.php");
                                $conexion = connect();
                                if(!$conexion){
                                    echo "No se pudo conectar a la base";
                                } else {
                                    $sql = "INSERT INTO ruta_archivo (Ruta) VALUES ('$ruta')";
                                    $res = mysqli_query($conexion, $sql);
                                    if($res == true){
                                        $ID_RutaArchivo = mysqli_insert_id($conexion);
                                        $ID_Clase = $_SESSION["ID_Clase"];
                                        $sql = "INSERT INTO clase_has_publicaciones (ID_Clase,ID_Publicacion) VALUES ('$ID_Clase',1)";
                                        $res = mysqli_query($conexion, $sql);
                                        if($res == true){
                                            $ID_cHp = mysqli_insert_id($conexion);
                                            $fecha = date('Y-m-d h:i:s');
                                            $sql = "INSERT INTO material (ID_cHp,Nombre,Descripcion,Fecha_Asignacion,ID_RutaArchivo) VALUES ($ID_cHp,'$titulo','$descripcion','$fecha',$ID_RutaArchivo)";
                                            $res = mysqli_query($conexion, $sql);
                                            if($res == true){
                                                echo "<strong>Tu archivo se subio correctamente</strong><br><br>";
                                            } else {
                                                echo "No se pudo crear el material";
                                            }
                                        } else {
                                            echo "No se creo la publicaci??n";
                                        }
                                    } else {
                                        echo "No se pudo conectar a la base";
                                    }
                                }
                            } else {
                                echo "$name  No se puede subir";
                            }
                        }
                    ?>
                </div>
            </section>
            <aside class="secciones">
                <div class="opciones">
                    <!-- Juegos educativos-->
                    <div id="calendario" class="elementosAside">
                        <a href="./Calendario.php" class="linksVistas">Calendario</a>
                    </div>  
                    <div id="foro" class="elementosAside">
                        <a href="./foroPreguntas.php" class="linksVistas">Foro de Dudas</a>
                    </div>
                </div>
            </aside>
        </div>

        <footer>
            <div class="footer">
                <span>
                    <h5>Sitios de inter??s</h5>
                    <ul>
                        <li><a href="http://enp.unam.mx/" target="_blank">P??gina Oficial de la ENP</a></li>
                        <li><a href="https://www.prepa6.unam.mx/ENP6/_P6/" target="_blank">P??gina oficial ENP 6</a></li>
                    </ul>
                </span>
                <span>
                    <h5>Aviso Legal</h5>
                    <p>Hecho en M??xico, todos los derechos reservados 2022-2022.</p>
                    <a href="./creditos.html">Cr??ditos</a>       
                </span>
                <span>
                    <h5>Contactos y condiciones</h5>
                </span> 
            </div>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js "></script>
        <script src="../dynamics/JS/creaMaterialProf.js"></script>
    </body>

</html>