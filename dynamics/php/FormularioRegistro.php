<?php
    include ("./config.php");
    $conexion = connect();
    if(!$conexion){
        echo "No se pudo conectar con la base de datos";
    } else {
        require_once "seguridad.php";
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
        } else if($alumProf == 2){
            $numTrabajador = (isset($_POST["numTrabajador"]) && $_POST["numTrabajador"] != "") ? $_POST["numTrabajador"] : false; //Número de trabajador
        }

        echo "<table border=\"2\>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th colspan=\"4\"><b></b></th>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td colspan=\"4\"><b><center>Tu cuenta:</center></b></td>";
                echo "</tr>";
            echo "</thead>";
            echo "<body>";
                echo "<tr>";
                    echo "<td><strong>Tipo de Usuario:</strong> $alumProf</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><strong>Nombre:</strong> $nombre</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><strong>Apellidos:</strong> $apellidos</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><strong>Usuario:</strong> $usuario</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><strong>Correo electrónico:</strong> $correo</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><strong>Contraseña:</strong> $contraseña</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><strong>Número Telefonico:</strong> $noTelef</td>";
                echo "</tr>";
                if($alumProf == 1){
                    echo "<tr>";
                        echo "<td><strong>Número de Cuenta:</strong> $noCuenta</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><strong>Grado:</strong> $grado</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><strong>Grupo:</strong> $grupo</td>";
                    echo "</tr>";
                } else if($alumProf == 2) {
                    echo "<tr>";
                        echo "<td><strong>Número de Trabajador:</strong> $numTrabajador</td>";
                    echo "</tr>";
                }
            echo "</body>";
        echo "</table>";

        //HASHEO
        $sal = uniqid();
        $pimienta = generarPimienta();
        $hasheo = hash("sha256", $contraseña.$pimienta.$sal);
        echo $sal."<br>".$pimienta."<br>".$hasheo;
    }
?>