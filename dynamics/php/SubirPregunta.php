<?php
    include("./config.php");
    $conexion = connect();
    if(!$conexion){
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar1");
    } else {
        session_name("Sesion");
        session_id("021e31y8d4655");
        session_start();

        $fecha = (isset($_POST['fecha'])&& $_POST['fecha']!='')? $_POST['fecha']: false;
        $pregunta = (isset($_POST['pregunta'])&& $_POST['pregunta']!='')? $_POST['pregunta']: false;
        $numCuenta = $_SESSION["Num_Cuenta"];

        $sql = "INSERT INTO pregunta_foro (Num_Cuenta,Pregunta,Fecha) VALUES ($numCuenta,'$pregunta','$fecha')";
        $res = mysqli_query($conexion, $sql);
        if($res == true){
            $respuesta = array("ok" => true,"texto"=>"Se agregó la pregunta");
        } else {
            // echo mysqli_error($conexion);
            $respuesta = array("ok" => false, "texto" => "No se pudo ingresar2");
        }
    }
    echo json_encode($respuesta);
?>