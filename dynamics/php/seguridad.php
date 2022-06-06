<?php
    function generarPimienta(){
        $caracteres = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
        $partes_pimienta = array_rand($caracteres,2);
        $pimienta = $caracteres[$partes_pimienta[0]].$caracteres[$partes_pimienta[1]];
        return $pimienta;
    }
    function verificar_contra_pimienta($contra,$sal,$hash_guardado){
        $bien = false;
        $caracteres = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
        for($i=0; $i<count($caracteres); $i++){
            for($j=0; $j<count($caracteres); $j++){
                $pimienta = $caracteres[$i].$caracteres[$j];
                if((hash("sha256", $contra.$pimienta.$sal)) === $hash_guardado){
                    $bien = true;
                }
            }
        }
        return $bien;
    }
?>