<?php
    include("./config.php");
    $conexion = connect();
    if(!$conexion){
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
    } else {
        session_name("Sesion");
        session_id("021e31y8d4655");
        session_start();

        $codigo = (isset($_POST['codigo'])&& $_POST['codigo']!='')? $_POST['codigo']: false;

        //Genera el codigo de la clase aleatorio
        $numCuenta = $_SESSION["Num_Cuenta"];

        // $sql = "SELECT COUNT(ID_Clase) FROM Clase WHERE ID_Clase='$codigo'";
        // $res = mysqli_query($conexion, $sql);
        // $validacion = mysqli_fetch_array ($res);
        
        // if($validacion[0] == '1'){
        $sql = "INSERT INTO  alumno_has_clase (Num_Cuenta, ID_Clase) VALUES ('$numCuenta', '$codigo')";
        $res = mysqli_query($conexion, $sql);

        if($res == true){    
            $respuesta = array("ok" => true,"texto"=>"Te has inscrito a una clase");
            
        } else {
            $respuesta = array("ok" => false, "texto" => "No se pudo completar la inscripción (revisa que el código de clase este escrito correctamente)");
        }
    }
    echo json_encode($respuesta);
?>