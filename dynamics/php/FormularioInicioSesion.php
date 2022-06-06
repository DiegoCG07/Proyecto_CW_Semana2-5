<?php
    $correo = (isset($_POST["correo"]) && $_POST["correo"] != "") ? $_POST["correo"] : false;
    $contrasena = (isset($_POST["contrasena"]) && $_POST["contrasena"] != "") ? $_POST["contrasena"] : false;

    if(isset($_SESSION["correo"])){
        // header("location: Pag principal");
    } else {
        include ("./config.php");
        $conexion = connect();
        if(!$conexion){
            $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
            echo json_encode($respuesta);
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
            $sql = "SELECT * FROM usuario NATURAL JOIN email NATURAL JOIN contrasena;";
            $res = mysqli_query($conexion, $sql);
            while($row = mysqli_fetch_assoc($res)){
                if($row['Email'] == $correo){
                    $existeEmail = true;
                    $contrasena_hash_base = $row["Contrasena_hash"];
                    $sal_base = $row["Sal"];
                }
            }
            if($existeEmail == false){
                $respuesta = array("ok" => true, "texto" => "Usuario no registrado");
                echo json_encode($respuesta);
            } else if($existeEmail == true){
                require_once "Seguridad.php";
                if(verificar_contra_pimienta($contrasena,$sal_base,$contrasena_hash_base) == true){
                    $respuesta = array("ok" => true, "texto" => "Datos válidos");
                    echo json_encode($respuesta);
                } else {
                    $respuesta = array("ok" => true, "texto" => "Contraseña incorrecta");
                    echo json_encode($respuesta);
                }
            }
        }
    }
?>