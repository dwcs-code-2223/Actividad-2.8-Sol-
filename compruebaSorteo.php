<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comprueba sorteo</title>
    </head>
    <body>
        <h1>Comprueba sorteo</h1>

        <form action="sorteoManager.php">

            <?php
            // put your code her
            require_once 'util.php';

            for ($i = 1; $i <= count($semana); $i++) {
                $j = $i - 1;
                $nombre_dia = ucfirst($semana[$j]);

                $id = "label" . $i;
                echo "<input type = 'checkbox' id ='$id' name ='$semana[$j]'>";
                echo "<label for ='$id'>$nombre_dia</label>";
            }
            ?>
            <div>
            <label for="combinacion"> Introduzca su combinación separada por uno o varios espacios: </label>
            
                <input type="text" name="combinacion" id="combinacion">  
            </div>
            <br/>
             <input type="hidden" name="fijo" value="true">
           
            <div>
                <input type="submit" value="Comprobar">
            </div>
        </form>
    </body>
</html>
