<?php
    session_name("Sesion");
    session_id("021e31y8d4655");
    session_start();
    if(isset($_SESSION["ID_TipoUsuario"])){
        if($_SESSION["ID_TipoUsuario"] == 1){
            header("location: ./templates/alumnoInicio.php");
        } else if($_SESSION["ID_TipoUsuario"] == 2){
            header("location: ./templates/VistaPrinProf.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de Sesión</title>
        <link rel="stylesheet" href="./statics/styles/main.css">
        <link rel="stylesheet" href="./statics/styles/formularioInicio.css">
    </head>

    <body>
        <header></header>

        <div class="contenido">
            <div class="form">
                <form id="formInicio" method="post">
                        <strong><h2>¿Qué tal Coyo-amigo?</h2></strong>
                        <h3>Iniciar sesión</h3>

                        <label for="correo"></label>
                        <input type="email" name="correo" id="correo" required placeholder="Correo"> <br><br>

                        <label for="contrasena"></label>
                        <input type="text" name="contrasena" id="contrasena" required placeholder="Contraseña"> <br><br>

                        <a href="./dynamics/php/IntentoContraseña.php">¿Olvidaste tu contraseña o nombre de usuario?</a> <br><br>
                        
                        <button type="submit" id="btn-inicio">Iniciar sesión</button><br><br>

                        <a href="./templates/FormularioRegistro.html" target="_self" style="display: none;" id="btn-registro">Registrate</a>
                </form>
            </div>
        </div>

        <footer></footer>

        <script src="./dynamics/JS/FormularioInicioSesion.js"></script>
    </body>

</html>