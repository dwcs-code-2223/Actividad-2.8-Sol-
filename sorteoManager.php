<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


require_once 'util.php';


$sorteo_semanal = [];

//Apartado b)
foreach ($semana as $dia) {
    $sorteo_semanal[$dia] = crearSorteo(NUM_TOTAL_SORTEO, MIN_NUM, MAX_NUM);
}

//print_r($sorteo_semanal);
echo "<br/>";

//Apartado c)



if (isset($_GET["fijo"])) {

    $fijo_param = $_GET["fijo"];

    if ($fijo_param == true) {

        $sorteo = array("lunes" => array(79, 63, 78, 11),
            "martes" => array(6, 48, 35, 29),
            "miércoles" => array(89, 56, 12, 34),
            "jueves" => array(3, 69, 77, 1),
            "viernes" => array(21, 27, 78, 23),
            "sábado" => array(27, 71, 26, 9),
            "domingo" => array(80, 88, 31, 78));

        if (isset($_GET["dia"])) {
            $dia_num = $_GET["dia"];

            $dia_semana = $semana[$dia_num - 1];
            echo "El resultado del sorteo para el día $dia_semana es: <br/>";
            $resultado = implode(",", array_values($sorteo[$dia_semana]));
            echo $resultado;
        } elseif (isset($_GET["combinacion"])) {

            $combinacion = $_GET["combinacion"];

            $dias_consulta = [];

            foreach ($semana as $nombre_dia) {
                if (isset($_GET[$nombre_dia])) {
                    $dias_consulta[$nombre_dia] = $_GET[$nombre_dia];
                }
            }
            if (count($dias_consulta) == 0) {
                exit("Seleccione al menos un día de la semana");
            } elseif (isValid($combinacion)) {
                $array_enteros = explodeCombinacion($combinacion);
                $array_dif = [];
                foreach ($dias_consulta as $key => $value) {
                    $array_diff = array_diff($array_enteros, $sorteo[$key]);
                    if (count($array_diff) == 0) {
                        echo "<div style='color:green'>!Enhorabuena! La combinación para $key está premiada</div>";
                        echo "La combinación introducida es: ";
                        $cadena = implode(", ", $array_enteros);
                        echo $cadena . "<br/>";
                    } else {
                        echo "<div style='color:red'>Lo sentimos. La combinación para $key NO está premiada </div>";
                        $cadena = implode(", ", $array_enteros);
                        echo $cadena . "<br/>";
                    }
                }
            } else {
                exit("La combinación no es válida");
            }
        }
    }
}
