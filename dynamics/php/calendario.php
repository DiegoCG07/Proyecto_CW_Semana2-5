<?php
    include("./config.php");
    $conexion = connect();
    if(!$conexion){
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar a la base de datos");
    } else {
        $sql = "SELECT * FROM calendario NATURAL JOIN tipo_fecha";
        $res = mysqli_query($conexion, $sql);
        if($res == true){
            $resultados = [];
            while($row = mysqli_fetch_assoc($res)){
                $resultados[] = array("ID_Fecha" => $row["ID_Fecha"], "Asunto" => $row["Asunto"], "Fecha" => $row["Fecha"], "TipoFecha" => $row["TipoFecha"]);
            }
            $respuesta = array("ok" => true,"resultados"=>$resultados);
        } else {
            $respuesta = array("ok" => false, "texto" => "No se pudo ingresar al calendario");
        }
    }
    echo json_encode($respuesta);
?>