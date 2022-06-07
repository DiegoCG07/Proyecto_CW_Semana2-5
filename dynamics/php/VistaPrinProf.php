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

    $numTrabajador = $_SESSION["Num_Trabajador"];

    $sql = "SELECT * FROM clase NATURAL JOIN grupo NATURAL JOIN materia WHERE Num_Trabajador = '$numTrabajador'";
    $res = mysqli_query($conexion, $sql);
    if($res == true){
        $resultado = [];
        while($row = mysqli_fetch_assoc($res)){
            $resultado[] = array("ID_Clase" => $row["ID_Clase"], "Grupo" => $row["Grupo"], "Materia" => $row["Materia"]);
        }
        $respuesta = array("ok" => true,"resultado" => $resultado);
    } else {
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
    }
}
echo json_encode($respuesta);

?>