<?php
    
    $alumProf = (isset($_POST["alumProf"]) && $_POST["alumProf"] != "") ?$_POST["alumProf"] : "no especificado"; //Alumno-Profe
    $nombre = (isset($_POST["nombre"]) && $_POST["nombre"] != "") ?$_POST["nombre"] : "no especificado"; //Nombre
    $apellidos = (isset($_POST["apellidos"]) && $_POST["apellidos"] != "") ?$_POST["apellidos"] : "no especificado"; //Apellidos
    $usuario = (isset($_POST["usuario"]) && $_POST["usuario"] != "") ?$_POST["usuario"] : "no especificado"; //Usuario
    $correo = (isset($_POST["correo"]) && $_POST["correo"] != "") ?$_POST["correo"] : "no especificado"; //Correo
    $contraseña = (isset($_POST["contraseña"]) && $_POST["contraseña"] != "") ?$_POST["contraseña"] : "no especificado"; //Contraseña
    $noCuenta = (isset($_POST["noCuenta"]) && $_POST["noCuenta"] != "") ?$_POST["noCuenta"] : "no especificado"; //Número de Cuenta
    $grado = (isset($_POST["grado"]) && $_POST["grado"] != "") ?$_POST["grado"] : "no especificado"; //Grado
    $grupo = (isset($_POST["grupo"]) && $_POST["grupo"] != "") ?$_POST["grupo"] : "no especificado"; //Grupo
    $noTelef = (isset($_POST["noTelef"]) && $_POST["noTelef"] != "") ?$_POST["noTelef"] : "no especificado"; //Número de teléfono
    $numTrabajador = (isset($_POST["numTrabajador"]) && $_POST["numTrabajador"] != "") ?$_POST["numTrabajador"] : "no especificado"; //Número de trabajador



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
                echo "<td><strong>Número de Cuenta:</strong> $noCuenta</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td><strong>Grado:</strong> $grado</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td><strong>Grupo:</strong> $grupo</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td><strong>Número Telefonico:</strong> $noTelef</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td><strong>Número de Trabajador:</strong> $numTrabajador</td>";
            echo "</tr>";
        echo "</body>";
    echo "</table>";
    echo "<br>";
    echo '<button type="submit">Continuar</button>'

?>