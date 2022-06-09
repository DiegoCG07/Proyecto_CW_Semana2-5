<?php
    include("./config.php");
    $conexion = connect();
    if(!$conexion){
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
    } else {
        $ID_Clase = (isset($_POST["ID_Clase"]) && $_POST["ID_Clase"] != "") ? $_POST["ID_Clase"] : false;
        $sql = "SELECT*FROM material NATURAL JOIN clase_has_publicaciones WHERE ID_Clase='$ID_Clase'";
        $res = mysqli_query($conexion, $sql);
        if($res == true){
            $resultados = [];
            while($row = mysqli_fetch_assoc($res)){
                $resultados[] = array("id" => $row["ID_Material"], "Nombre" => $row["Nombre"], "Descripcion" => $row["Descripcion"], "Fecha_asignacion" => $row["Fecha_asignacion"], "Fecha_limite" => $row["Fecha_limite"]);
            }
            $respuesta = array("ok" => true,"resultados"=>$resultados);
        } else {
            $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
        }
    }
    echo json_encode($respuesta);
?>