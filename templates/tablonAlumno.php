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
        <title>Tablón de alumnos | Coyo-Clases</title>
        <link rel="icon" href="../statics/media/img/icono.jpg" type="image/png">
        <link rel="stylesheet" href="../statics/styles/creditos.css">
        <link rel="stylesheet" href="../statics/styles/main.css">
        <link rel="stylesheet" href="../statics/styles/tablonAlumno.css">
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
                                echo "<a class='nav-link active' aria-current='page' href='./alumnoTablero.php'>Mis cursos</a>";
                            } else if($_SESSION["ID_TipoUsuario"] == 2){
                                echo "<a class='nav-link' href='./VistaPrinProf.php'>Mis cursos</a>";
                            }else if($_SESSION["ID_TipoUsuario"] == 4){
                                echo "<a class='nav-link' href='./VistaPrinAdmin.php'>Página Inicial</a>";
                            }
                        ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link href="./foroPreguntas.php">Foro de preguntas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./calendario.html">Calendario</a>
                        </li>
                    </ul>
                </div>
            </div>         
        </nav>

        <div id="titulo2">
            <span class="coyoseis">Tablón de alumnos</span>
        </div>

        <div id="contenedor">
            <section id="contenido" class="secciones">
                <div class="input-group mb-3">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Filtrar por: </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Materia</a></li>
                        <li><a class="dropdown-item" href="#">Creador</a></li>
                        <li><a class="dropdown-item" href="#">Fecha de publicación</a></li>
                        <li><a class="dropdown-item" href="#">Tipo de Material</a></li>
                        <li><a class="dropdown-item" href="#">Tema</a></li>
                        <li><a class="dropdown-item" href="#">Unidad</a></li>
                        <li><a class="dropdown-item" href="#">Fecha de edición</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Mi Historial</a></li>
                    </ul>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Busca un material de estudio">
                    <button id="btn-agregar">+</button>    
                </div>
                
                <div id="contenedor-mostrar" style="display:none;"></div>

                <div id="contenedor-agregar" style="display:none;">
                    <?php
                        echo "
                        <form action='./tablonAlumno.php' id='form-nuevo' method='post' enctype='multipart/form-data'>
                            <div>
                                <h2>Subir un material de estudio</h2><br>
                            </div>
                            <div class='campo-form'><label>Unidad: </label> <input type='text' name='unidad' id='unidad'></div><br>
                            <div class='campo-form'><label>Tema: </label> <input type='text' name='tema'></div><br>
                            <div class='campo-form'><label>Materia</label> <select id='select-materia' name='materia'></select></div><br>
                            <div class='mb-3'>
                                <input class='form-control' type='file' id='archivo'>
                            </div>
                            <button id='btn-enviar'>Enviar</button>
                        </form>
                        ";
                        $unidad = (isset($_POST["unidad"]) && $_POST["unidad"] != "") ? $_POST["unidad"] : false;
                        $tema = (isset($_POST["tema"]) && $_POST["tema"] != "") ? $_POST["tema"] : false;
                        $materia = (isset($_POST["materia"]) && $_POST["materia"] != "") ? $_POST["materia"] : false;
                        if($unidad != "" && $tema != "" && $materia != "" && isset($_FILES['archivo'])){
                            // Obtengo nombre y extensión 
                            $name = $_FILES['archivo']['name'];
                            $ext = pathinfo($name,PATHINFO_EXTENSION);

                            if($ext=="png" || $ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="bmp" || $ext=="txt" || $ext=="doc" || $ext=="docx" || $ext=="ppt" || $ext=="pptx" || $ext=="pdf" || $ext=="xls"){
                                $arch=$_FILES['archivo']['tmp_name'];
                                $nombreArchivo = $_SESSION["Num_Cuenta"]."_".$unidad."_".$tema."_".$materia.".".$ext;
                                $ruta = "../statics/files/tablon/$nombreArchivo";
                                rename($arch,$ruta);
                                if($ext=="txt" || $ext=="doc" || $ext=="docx"){
                                    $ID_TipoMaterial = 1;
                                } else if($ext=="png" || $ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="bmp"){
                                    $ID_TipoMaterial = 2;
                                } else if($ext=="ppt" || $ext=="pptx"){
                                    $ID_TipoMaterial = 3;
                                } else if($ext=="pdf"){
                                    $ID_TipoMaterial = 4;
                                } else if($ext=="xls"){
                                    $ID_TipoMaterial = 5;
                                } else {
                                    $ID_TipoMaterial = 6;
                                } 
                                // PETICION
                                include("../dynamics/php/config.php");
                                $conexion = connect();
                                if(!$conexion){
                                    echo mysqli_error($conexion);
                                    echo "<label for='formFile' class='form-label' id='mensaje'>No se pudo conectar a la base</label>";
                                } else {
                                    $sql = "INSERT INTO ruta_archivo (Ruta) VALUES ('$ruta')";
                                    $res = mysqli_query($conexion, $sql);
                                    if($res == true){
                                        $ID_RutaArchivo = mysqli_insert_id($conexion);
                                        $Num_Cuenta = $_SESSION["Num_Cuenta"];
                                        $fecha = date('Y-m-d h:i:s');
                                        $sql = "INSERT INTO material_tablon (Num_Cuenta,ID_Materia,ID_RutaArchivo,ID_EstadoMaterial,Fecha_Publicacion,Fecha_Edición,Unidad,Tema,ID_TipoMaterial,Megusta) VALUES ('$Num_Cuenta',$materia,'$ID_RutaArchivo',2,'$fecha','$fecha','$unidad','$tema',$ID_TipoMaterial,0)";
                                        $res = mysqli_query($conexion, $sql);
                                        if($res == true){
                                            echo mysqli_error($conexion);
                                            echo "<label for='formFile' class='form-label' id='mensaje'>Tu archivo se subio correctamente</label>";
                                        } else {
                                            echo mysqli_error($conexion);
                                            echo "<label for='formFile' class='form-label' id='mensaje'>No se pudo crear el material de estudios</label>";
                                        }
                                    } else {
                                        echo mysqli_error($conexion);
                                        echo "<label for='formFile' class='form-label' id='mensaje'>No se pudo subir el archivo</label>";
                                    }
                                }
                            }
                        }
                    ?>
                </div>
            </section>
            <aside class="secciones">
                <div class="opciones">
                    <!-- Juegos educativos-->
                    <div id="calendario" class="elementosAside">
                        <a href="./Calendario.html" class="linksVistas">Calendario</a>
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
        <script src="../dynamics/JS/tablonAlumno.js"></script>
    </body>
</html>