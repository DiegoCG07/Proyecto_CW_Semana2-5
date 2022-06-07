<?php
    include ("./config.php");
    $conexion = connect();
    if(!$conexion){
        echo "No se pudo conectar con la base de datos";
    } else {
        require_once "Seguridad.php";
        $alumProf = (isset($_POST["alumProf"]) && $_POST["alumProf"] != "") ? $_POST["alumProf"] : false; //Alumno-Profe
        $nombre = (isset($_POST["nombre"]) && $_POST["nombre"] != "") ? $_POST["nombre"] : false; //Nombre
        $apellidos = (isset($_POST["apellidos"]) && $_POST["apellidos"] != "") ? $_POST["apellidos"] : false; //Apellidos
        $usuario = (isset($_POST["usuario"]) && $_POST["usuario"] != "") ? $_POST["usuario"] : false; //Usuario
        $correo = (isset($_POST["correo"]) && $_POST["correo"] != "") ? $_POST["correo"] : false; //Correo
        $contraseña = (isset($_POST["contraseña"]) && $_POST["contraseña"] != "") ? $_POST["contraseña"] : false; //Contraseña
        $noTelef = (isset($_POST["noTelef"]) && $_POST["noTelef"] != "") ? $_POST["noTelef"] : false; //Número de teléfono
        if($alumProf == 1){
            $noCuenta = (isset($_POST["noCuenta"]) && $_POST["noCuenta"] != "") ? $_POST["noCuenta"] : false; //Número de Cuenta
            $grado = (isset($_POST["grado"]) && $_POST["grado"] != "") ? $_POST["grado"] : false; //Grado
            $grupo = (isset($_POST["grupo"]) && $_POST["grupo"] != "") ? $_POST["grupo"] : false; //Grupo
            $turno = (isset($_POST["turno"]) && $_POST["turno"] != "") ? $_POST["turno"] : false;
        } else if($alumProf == 2){
            $numTrabajador = (isset($_POST["numTrabajador"]) && $_POST["numTrabajador"] != "") ? $_POST["numTrabajador"] : false; //Número de trabajador
        }

        // HASHEO
        $sal = uniqid();
        $pimienta = generarPimienta();
        $hasheo = hash("sha256", $contraseña.$pimienta.$sal);
        echo $sal."<br>".$pimienta."<br>".$hasheo;

        // PETICIONES
        $sql = "INSERT INTO email (Email) VALUES ('$correo')";
        $res = mysqli_query($conexion, $sql);
        if($res == true){
            $ID_Email = mysqli_insert_id($conexion);
            $sql = "INSERT INTO contrasena (Contrasena_hash,Sal) VALUES ('$hasheo','$sal')";
            $res = mysqli_query($conexion, $sql);
            if($res == true){
                $ID_Contrasena = mysqli_insert_id($conexion);
                $sql = "INSERT INTO usuario (ID_Email,ID_Contrasena,ID_TipoUsuario,Nombre,Apellidos) VALUES ($ID_Email,$ID_Contrasena,$alumProf,'$nombre','$apellidos')";
                $res = mysqli_query($conexion, $sql);
                if($res == true){
                    $ID_Usuario = mysqli_insert_id($conexion);
                    if($alumProf == 1){
                        // Petición principal alumno
                        $sql = "INSERT INTO alumno VALUES ($noCuenta,$noTelef,'$usuario',$grado,$grupo,$turno,$ID_Usuario)";
                    } else if($alumProf == 2) {
                        // Petición principal maestro
                        $sql = "INSERT INTO profesor VALUES ('$numTrabajador',$noTelef,'$usuario',$ID_Usuario)";
                    }
                    $res = mysqli_query($conexion, $sql);
                    if($res == true){
                        echo "<h1>Se registro correctamente al usuario</h1>";
                        header("location: ../../FormularioInicioSesion.php");
                    } else {
                        echo "<h1>Fallo al subir los datos</h1>";
                    }
                } else {
                    echo "<h1>Fallo al subir los datos</h1>";
                }
            } else {
                echo "<h1>Fallo al subir los datos</h1>";
            }
        } else {
            echo "<h1>Fallo al subir los datos</h1>";
        }
    }
?>