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

        $grupo = (isset($_POST['grupo'])&& $_POST['grupo']!='')? $_POST['grupo']: false;
        $materia = (isset($_POST['materia'])&& $_POST['materia']!='')? $_POST['materia']: false;
        $descripcion = (isset($_POST['descripcion'])&& $_POST['descripcion']!='')? $_POST['descripcion']: false;

        //Genera el codigo de la clase aleatorio
        $codigoClase = uniqid();
        $arreglo = str_split($codigoClase, 7);
        $codigoClase = $arreglo[1];
        $numTrabajador = $_SESSION["Num_Trabajador"];

        $sql = "INSERT INTO clase VALUES ('$codigoClase', $grupo, $materia, '$descripcion', '$numTrabajador')";
        $res = mysqli_query($conexion, $sql);
        if($res == true){
            $respuesta = array("ok" => true,"texto"=>"Se creó la clase");
        } else {
            $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
        }
    }
    echo json_encode($respuesta);

?>