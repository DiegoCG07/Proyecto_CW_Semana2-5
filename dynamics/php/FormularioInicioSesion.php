<?php
    $correo = (isset($_POST["correo"]) && $_POST["correo"] != "") ? $_POST["correo"] : false;
    $contrasena = (isset($_POST["contrasena"]) && $_POST["contrasena"] != "") ? $_POST["contrasena"] : false;

    include ("./config.php");
    $conexion = connect();
    if(!$conexion){
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
    } else {
        // echo "<table border=\"2\>";
        //     echo "<thead>";
        //         echo "<tr>";
        //             echo "<th colspan=\"4\"><b></b></th>";
        //         echo "</tr>";
        //         echo "<tr>";
        //             echo "<td colspan=\"4\"><b><center>Has iniciado sesión como:</center></b></td>";
        //         echo "</tr>";
        //     echo "</thead>";
        //     echo "<body>";
        //         echo "<tr>";
        //             echo "<td><strong>Correo:</strong> $correo</td>";
        //         echo "</tr>";
        //         echo "<tr>";
        //             echo "<td><strong>Contraseña:</strong> $contrasena</td>";
        //         echo "</tr>";
        //     echo "</body>";
        // echo "</table>";
        // echo "<br>";

        $existeEmail = false;
        $sql = "SELECT * FROM usuario NATURAL JOIN email NATURAL JOIN contrasena";
        $res = mysqli_query($conexion, $sql);
        while($row = mysqli_fetch_assoc($res)){
            if($row['Email'] == $correo){
                $existeEmail = true;
                $contrasena_hash_base = $row["Contrasena_hash"];
                $sal_base = $row["Sal"];
                $ID_Usuario = $row["ID_Usuario"];
                $nombre_usuario = $row["Nombre"];
                $ID_TipoUsuario = $row["ID_TipoUsuario"];
            }
        }
        if($existeEmail == false){
            $respuesta = array("ok" => true, "texto" => "Usuario no registrado");
        } else if($existeEmail == true){
            require_once "Seguridad.php";
            if(verificar_contra_pimienta($contrasena,$sal_base,$contrasena_hash_base) == true){
                // Inicio sesión
                session_name("Sesion");
                session_id("021e31y8d4655");
                session_start();
                if($ID_TipoUsuario == 1){
                    $sql = "SELECT*FROM alumno NATURAL JOIN usuario NATURAL JOIN grado NATURAL JOIN grupo NATURAL JOIN turno NATURAL JOIN email WHERE ID_Usuario=$ID_Usuario";
                    $res = mysqli_query($conexion,$sql);
                    while($row = mysqli_fetch_assoc($res)){
                        $_SESSION["ID_Usuario"] = $row["ID_Usuario"];
                        $_SESSION["Num_Cuenta"] = $row["Num_Cuenta"];
                        $_SESSION["Telefono"] = $row["Telefono"];
                        $_SESSION["Usuario"] = $row["Usuario"];
                        $_SESSION["ID_TipoUsuario"] = $row["ID_TipoUsuario"];
                        $_SESSION["Nombre"] = $row["Nombre"];
                        $_SESSION["Apellidos"] = $row["Apellidos"];
                        $_SESSION["Grado"] = $row["Grado"];
                        $_SESSION["Grupo"] = $row["Grupo"];
                        $_SESSION["Turno"] = $row["Turno"];
                        $_SESSION["Email"] = $row["Email"];
                    }
                    $respuesta = array("ok" => true, "texto" => "Alumno");
                } else if($ID_TipoUsuario == 2){
                    $sql = "SELECT*FROM profesor NATURAL JOIN usuario NATURAL JOIN email WHERE ID_Usuario=$ID_Usuario";
                    $res = mysqli_query($conexion,$sql);
                    while($row = mysqli_fetch_assoc($res)){
                        $_SESSION["ID_Usuario"] = $row["ID_Usuario"];
                        $_SESSION["Num_Trabajador"] = $row["Num_Trabajador"];
                        $_SESSION["Telefono"] = $row["Telefono"];
                        $_SESSION["Usuario"] = $row["Usuario"];
                        $_SESSION["ID_TipoUsuario"] = $row["ID_TipoUsuario"];
                        $_SESSION["Nombre"] = $row["Nombre"];
                        $_SESSION["Apellidos"] = $row["Apellidos"];
                        $_SESSION["Email"] = $row["Email"];
                    }
                    $respuesta = array("ok" => true, "texto" => "Profesor");
                }
            } else {
                $respuesta = array("ok" => true, "texto" => "Contraseña incorrecta");
            }
        }
    }
    echo json_encode($respuesta);
?>