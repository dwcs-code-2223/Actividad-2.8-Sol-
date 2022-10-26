<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comprobar sorteo</title>
    </head>
    <body>
        <h1>Comprobar sorteo</h1>
        <form action="util.php">
            <div>
                <label for="dia">Día:</label>
                <select name="dia" id="dia" required>
                    <?php
                    require_once 'crearSorteo.php';
                    for ($i = 1; $i <= count($semana); $i++) {
                        $j = $i - 1;
                        $nombre_dia = ucfirst($semana[$j]);
                        echo "<option value=\"$i\">$nombre_dia</option>";
                    }
                    ?>


                </select>
            </div>
            <br/>

            <input type="hidden" name="fijo" value="true">
            <div>
                <input type="submit" value="Consultar">
            </div>
        </form>
    </body>
</html>
