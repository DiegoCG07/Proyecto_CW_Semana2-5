<?php
    include("./config.php");
    $conexion = connect();
    if(!$conexion){
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
    } else {
        $sql = "SELECT * FROM materia";
        $res = mysqli_query($conexion, $sql);
        if($res == true){
            $resultados = [];
            while($row = mysqli_fetch_assoc($res)){
                $resultados[] = array("id" => $row["ID_Materia"], "numero" => $row["Materia"]);
            }
            $respuesta = array("ok" => true,"resultados"=>$resultados);
        } else {
            $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
        }
    }
    echo json_encode($respuesta);
?>