<?php
    include("./config.php");
    $conexion = connect();
    if(!$conexion){
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
    }
    else {
        $grupo = (isset($_POST['grupo'])&& $_POST['grupo']!='')? $_POST['grupo']: false;
        $materia = (isset($_POST['materia'])&& $_POST['materia']!='')? $_POST['materia']: false;
        $descripcion = (isset($_POST['descripcion'])&& $_POST['descripcion']!='')? $_POST['descripcion']: false;

        //Genera el codigo de la clase aleatorio
        $codigoClase = uniqid();
        $arreglo = str_split($codigoClase, 7);
        $codigoClase = $arreglo[1];

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