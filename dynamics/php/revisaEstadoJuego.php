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
            if(isset($ID_cHp)){
                $sql = "SELECT ID_EstadoJuego FROM ahorcado NATURAL JOIN clase_has_publicaciones WHERE ID_Clase='$ID_Clase' && ID_cHp=$ID_cHp";
                $res = mysqli_query($conexion, $sql);
                if($res == true){
                    while($row = mysqli_fetch_assoc($res)){
                        $ID_EstadoJuego = $row["ID_EstadoJuego"];
                    }
                    $respuesta = array("ok" => true,"ID_EstadoJuego" => $ID_EstadoJuego);
                } else {
                    $respuesta = array("ok" => false, "texto" => "No se han creado juegos");
                }
            } else {
                $respuesta = array("ok" => false, "texto" => "No se han creado juegos");
            }
        } else {
            $respuesta = array("ok" => false, "texto" => "No se pudo ingresar");
        }
    }
    echo json_encode($respuesta);
?>