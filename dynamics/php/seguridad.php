<?php
    function generarPimienta(){
        $caracteres = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
        $partes_pimienta = array_rand($caracteres,2);
        $pimienta = $caracteres[$partes_pimienta[0]].$caracteres[$partes_pimienta[1]];
        return $pimienta;
    }
?>