<?php
    include("./config.php");
    $conexion = connect();
    if(!$conexion){
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
    }
    else {
        session_name("Sesion");
        session_id("021e31y8d4655");
        session_start();

        $numCuenta = $_SESSION["Num_Cuenta"];

        $sql = "SELECT * FROM alumno_has_clase NATURAL JOIN clase NATURAL JOIN materia NATURAL JOIN profesor WHERE Num_Cuenta ='$numCuenta'";
        $res = mysqli_query($conexion, $sql);
        if($res == true){
            $resultado = [];
            while($row = mysqli_fetch_assoc($res)){
                $resultado[] = array("Materia" => $row["Materia"], "Profesor" => $row["Usuario"], "ID_Clase" => $row["ID_Clase"]);
            }
            $respuesta = array("ok" => true,"resultado" => $resultado);
        } else {
            $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
        }
    }
    echo json_encode($respuesta);
?>