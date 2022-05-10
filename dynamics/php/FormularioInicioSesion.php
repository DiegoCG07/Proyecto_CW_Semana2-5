<?php
    $correo = (isset($_POST["correo"]) && $_POST["correo"] != "") ?$_POST["correo"] : "no especificado";

    $contraseña = (isset($_POST["contraseña"]) && $_POST["contraseña"] != "") ?$_POST["contraseña"] : "no especificado";

    echo "<table border=\"2\>";
        echo "<thead>";
            echo "<tr>";
                echo "<th colspan=\"4\"><b></b></th>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan=\"4\"><b><center>Has iniciado sesión como:</center></b></td>";
            echo "</tr>";
        echo "</thead>";

        echo "<body>";
            echo "<tr>";
                echo "<td><strong>Correo:</strong> $correo</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td><strong>Contraseña:</strong> $contraseña</td>";
            echo "</tr>";
        echo "</body>";
    echo "</table>";
    echo "<br>";
?>