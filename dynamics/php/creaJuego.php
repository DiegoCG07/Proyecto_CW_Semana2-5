<?php
    include("./config.php");
    $conexion = connect();
    if(!$conexion){
        $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
    } else {
        $ID_Clase = (isset($_POST["ID_Clase"]) && $_POST["ID_Clase"] != "") ? $_POST["ID_Clase"] : false;
        $ID_EstadoJuego = (isset($_POST["ID_EstadoJuego"]) && $_POST["ID_EstadoJuego"] != "") ? $_POST["ID_EstadoJuego"] : false;
        $palabras = (isset($_POST["arr_palabras"]) && $_POST["arr_palabras"] != "") ? $_POST["arr_palabras"] : false;
        $arr_palabras = explode(",", $palabras);

        // Checa si existe tabla para borrarla y volver a escribir





        $sql = "INSERT INTO clase_has_publicaciones (ID_Clase,ID_Publicacion) VALUES ('$ID_Clase',3)";
        $res = mysqli_query($conexion, $sql);
        if($res == true){
            $ID_cHp = mysqli_insert_id($conexion);
            $todobien = 0;
            for($i=0; $i<count($arr_palabras); $i++){
                $sql = "INSERT INTO ahorcado (ID_cHp,Palabra,ID_EstadoJuego) VALUES ($ID_cHp,'$arr_palabras[$i]',$ID_EstadoJuego)";
                $res = mysqli_query($conexion, $sql);
                if($res == true){
                    $todobien++;
                } else {
                    $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
                }
            }
            if($todobien == count($arr_palabras)){
                $respuesta = array("ok" => true, "texto" => "Se registraron las palabras");
            }
        } else {
            $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
        }
    }
    echo json_encode($respuesta);
?>