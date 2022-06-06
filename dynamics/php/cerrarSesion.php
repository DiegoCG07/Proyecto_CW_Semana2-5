<?php
    session_name("Sesion");
    session_id("021e31y8d4655");
    session_start();
    if( isset($_SESSION["ID_TipoUsuario"]) ){
        session_unset();
        session_destroy();
        header("location: ../../FormularioInicioSesion.php");
    }
?>