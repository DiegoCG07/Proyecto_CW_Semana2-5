<?php
    include("./config.php");
    $conexion = connect();
    if(!$conexion){
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
    } else {
        $grado = (isset($_POST["grado"]) && $_POST["grado"] != "") ? $_POST["grado"] : false;
        $turno = (isset($_POST["turno"]) && $_POST["turno"] != "") ? $_POST["turno"] : false;
        if($grado == 1){
            $sql = ($turno == 1) ? "SELECT * FROM grupo WHERE Grupo<450" : "SELECT * FROM grupo WHERE Grupo>450 && Grupo<500";
        }else if($grado == 2){
            $sql = ($turno == 1) ? "SELECT * FROM grupo WHERE Grupo>500 && Grupo<550" : "SELECT * FROM grupo WHERE Grupo>550 && Grupo<600";
        }else if($grado == 3){
            $sql = ($turno == 1) ? "SELECT * FROM grupo WHERE Grupo>600 && Grupo<650" : "SELECT * FROM grupo WHERE Grupo>650";
        } else {
            $sql = "SELECT * FROM grupo";
        }
        $res = mysqli_query($conexion, $sql);
        if($res == true){
            $resultados = [];
            while($row = mysqli_fetch_assoc($res)){
                $resultados[] = array("id" => $row["ID_Grupo"], "numero" => $row["Grupo"]);
            }
            $respuesta = array("ok" => true,"resultados"=>$resultados);
        } else {
            $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
        }
    }
    echo json_encode($respuesta);

?>