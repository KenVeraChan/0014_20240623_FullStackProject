<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBDD Empleados</title>
    <link rel="stylesheet" href="../006_Paginacion/estilosIndex.css">
</head>
<body>
    <?php
    include "../005_Login/conexionPHP.php";
    $base= ConexionPHP::getConexionEmpleados();  //Conexion establecida desde la clase ConexionPHP
    $BD_tabla=ConexionPHP::getBD_TablaEmpleados(); //Solicita nombre BBDD de los JEFES

    $tamPagina=3;
    if(isset($_GET["cargaPagina"]))
        {
            $paginaInicial=($_GET["cargaPagina"])* $tamPagina;
            $_GET["enviar"]=true; //Reactivar por cada accionamiento de boton de paginación
        }
    else
        {
            $paginaInicial=0;
            $_GET["enviar"]=true;
        }
    //RESTO DE CARGAS DE LA PAGINA WEB
    $conexion=$base->query("SELECT * FROM $BD_tabla LIMIT  $paginaInicial,$tamPagina");
    $registro=$conexion->fetchAll(PDO::FETCH_OBJ);
    //Contaje de filas para la paginación posterior
    $filasSQL=$base->query("SELECT * FROM $BD_tabla")->rowCount();  
    //Contar numero de filas afectadas por la sentencia SQL
    ?>
        <table id="tablaPaginacion">
            <tr class="cabecera">
                <td class="cajaT">Id</td>
                <td class="cajaT">Nombre</td>
                <td class="cajaT">Apellidos</td>
                <td class="cajaT">Direccion</td>
                <td class="cajaT">Poblacion</td>
                <td class="cajaT">Profesion</td>
                <td class="cajaT">Salario Anterior</td>
                <td class="cajaT">Contratacion final</td>
            </tr>
            <?php
                foreach($registro as $persona):
            ?>
            <tr class="cabecera">
                <td class="cajaID"><?php echo($persona->ID);?></td>
                <td class="caja"><?php echo($persona->NOMBRE);?></td>
                <td class="caja"><?php echo($persona->APELLIDOS);?></td>
                <td class="caja"><?php echo($persona->DIRECCION);?></td>
                <td class="caja"><?php echo($persona->POBLACION);?></td>
                <td class="caja"><?php echo($persona->PROFESION);?></td>
                <td class="caja"><?php echo($persona->AHORROS);?></td>
                <td class="caja"><?php echo($persona->CONTRATACION);?></td>
            </tr>
            <?php
                endforeach;
            ?>
        </table>
        <?php
                echo "</table>";
                echo "<br><br>";
                //ZONA DE PAGINACION//
                $filasSQLBoton=$filasSQL/$tamPagina;
                echo "<div class='mencion'>".$filasSQL." regitros detectados</div>";
                echo"<br><br>";
                echo"<form method='GET'><table style='width:200px'><tr>";
                for($i=0;$i<(round($filasSQLBoton,0,PHP_ROUND_HALF_UP)+1);$i++)
                {
                    echo"<td><input 
                            type='submit' class='accionamientos'
                            name='cargaPagina' 
                            value='$i'
                            style='width: 30px; 
                                   heigth: 4px;
                                   margin-left: 10px; 
                                   color: white; 
                                   background-color: rgb(184, 88, 9);
                                   . 
                                   text-align: center
                            '></td>";
                }
                echo "</tr></table></form>";
        ?>
</body>
</html>