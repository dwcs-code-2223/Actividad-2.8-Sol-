<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
$semana = ["lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo"];
const MIN_NUM = 1;
const MAX_NUM = 99;
const NUM_TOTAL_SORTEO = 4;

function crearSorteo(int $num_total, int $min, int $max): array {
    $resultado = [];

    for ($i = 0; count($resultado) < $num_total; $i++) {
        $num = random_int($min, $max);
        //$num = rand($min, $max);
        if (!in_array($num, $resultado)) {
            $resultado[] = $num;
        }
    }

    return $resultado;
}

function isValid(string $combinacion): bool {

    $valido = true;
    if ($combinacion != "" && !str_contains($combinacion, ".")) {
        $array_enteros = explodeCombinacion($combinacion);
        if (count($array_enteros) == NUM_TOTAL_SORTEO) {
            foreach ($array_enteros as $temp) {
                if (is_numeric($temp)) {
                    if ($temp < MIN_NUM || $temp > MAX_NUM) {
                        $valido = false;
                        echo("Los enteros no están en el rango permitido<br/>");
                        break;
                    } else {

                        if (hayDuplicados($array_enteros)) {
                            $valido = false;
                            echo("No se permiten duplicados en la combinación<br/>");
                            break;
                        }
                    }
                } else {
                    $valido = false;
                    echo("Solo se permiten enteros<br/>");
                    break;
                }
            }
        } else {
            $valido = false;
            echo "Introduzca solo " . NUM_TOTAL_SORTEO . " números<br/>";
        }
    } else {
        $valido = false;
        echo("Introduzca la combinación de números enteros separados por espacios<br/>");
    }
    return $valido;
}

function explodeCombinacion(string $combinacion): array {
    $array_enteros = explode(" ", $combinacion);
    $array_enteros = array_filter($array_enteros, "filtrar");

    return $array_enteros;
}

function hayDuplicados(array $array_enteros): bool {
    $array_unico = array_unique($array_enteros);
    return(count($array_unico) != count($array_enteros));
}

function filtrar($valor) {
    return ($valor != "");
}
