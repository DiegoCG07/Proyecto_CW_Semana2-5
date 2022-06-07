<?php
    include("./config.php");
    $conexion = connect();
    if(!$conexion){
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
    } else {
        $ID_Clase = (isset($_POST["ID_Clase"]) && $_POST["ID_Clase"] != "") ? $_POST["ID_Clase"] : false;
        $sql = "SELECT MAX(ID_cHp) FROM ahorcado NATURAL JOIN clase_has_publicaciones WHERE ID_Clase='$ID_Clase'";
        $res = mysqli_query($conexion, $sql);
        if($res == true){
            while($row = mysqli_fetch_assoc($res)){
                $ID_cHp = $row["MAX(ID_cHp)"];
            }
            $sql = "SELECT*FROM ahorcado NATURAL JOIN clase_has_publicaciones WHERE ID_cHp='$ID_cHp';";
            $res = mysqli_query($conexion, $sql);
            if($res == true){
                $resultados = [];
                while($row = mysqli_fetch_assoc($res)){
                    $resultados[] = array("frase" => $row["Palabra"]);
                }
                $respuesta = array("ok" => true,"resultados"=>$resultados);
            } else {
                $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
            }
        } else {
            $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
        }
    }
    echo json_encode($respuesta);
?>