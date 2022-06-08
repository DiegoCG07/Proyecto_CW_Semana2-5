<?php
    include("./config.php");
    $conexion = connect();
    if(!$conexion){
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
    } else {
        $ID_Clase = (isset($_POST["ID_Clase"]) && $_POST["ID_Clase"] != "") ? $_POST["ID_Clase"] : false;
        $titulo = (isset($_POST["titulo"]) && $_POST["titulo"] != "") ? $_POST["titulo"] : false;
        $descripcion = (isset($_POST["descripcion"]) && $_POST["descripcion"] != "") ? $_POST["descripcion"] : false;
        $fecha = (isset($_POST["fechaAsignacion"]) && $_POST["fechaAsignacion"] != "") ? $_POST["fechaAsignacion"] : false;
        $fechaLimite = (isset($_POST["fechaLimite"]) && $_POST["fechaLimite"] != "") ? $_POST["fechaLimite"] : false;

        // CREAR PUBLICACION
        $sql = "INSERT INTO clase_has_publicaciones (ID_Clase,ID_Publicacion) VALUES ('$ID_Clase',2)";
        $res = mysqli_query($conexion, $sql);
        if($res == true){
            $ID_cHp = mysqli_insert_id($conexion);
            // CREAMOS TAREA
            $sql = "INSERT INTO tarea (ID_cHp,Nombre,Descripcion,Fecha_asignacion,Fecha_limite) VALUES ($ID_cHp,'$titulo','$descripcion','$fecha','$fechaLimite')";
            $res = mysqli_query($conexion, $sql);
            if($res == true){
                $ID_Tarea = mysqli_insert_id($conexion);
                // ALUMNOS DE ESA CLASE
                $sql = "SELECT Num_Cuenta FROM alumno_has_clase WHERE ID_Clase='$ID_Clase'";
                $res = mysqli_query($conexion, $sql);
                if($res == true){
                    $arr_alumnos = [];
                    while($row = mysqli_fetch_assoc($res)){
                        $arr_alumnos[] = array("Num_Cuenta" => $row["Num_Cuenta"]);
                    }
                    // for($i=0; $i<count($arr_alumnos); $i++){
                    foreach($arr_alumnos as $alumno => $valor){
                        // ASIGNAR TAREA A UN ALUMNO
                        $Num_Cuenta = $valor["Num_Cuenta"];
                        // var_dump($Num_Cuenta);
                        $sql = "INSERT INTO alumno_has_tarea (Num_Cuenta,ID_Tarea,ID_EstadoTarea,Fecha_Entrega) VALUES ('$Num_Cuenta',$ID_Tarea,2,'$fechaLimite')";
                        $res = mysqli_query($conexion, $sql);
                        if($res == true){
                            $respuesta = array("ok" => true, "texto" => "Se creo la tarea");
                        } else {
                            echo mysqli_error($conexion);
                            $respuesta = array("ok" => false, "texto" => "No se asigno la tarea");
                        }
                    }
                } else {
                    echo mysqli_error($conexion);
                    $respuesta = array("ok" => false, "texto" => "No se encontraron alumnos");
                }
            } else {
                echo mysqli_error($conexion);
                $respuesta = array("ok" => false, "texto" => "No se creo la tarea");
            }
        } else {
            echo mysqli_error($conexion);
            $respuesta = array("ok" => false, "texto" => "No se creo la puublicacion");
        }
    }
    echo json_encode($respuesta);
?>