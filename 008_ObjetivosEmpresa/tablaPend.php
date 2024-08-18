<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBDD Empleados</title>
    <link rel="stylesheet" href="../008_ObjetivosEmpresa/tablaPend.css">
</head>
<body>
    <?php
    include "../005_Login/conexionPHP.php";
    $base= ConexionPHP::getConexionJEFES_RRHH();  //Conexion establecida desde la clase ConexionPHP
    $BD_tabla=ConexionPHP::getBD_TablaJefesTareas(); //Solicita nombre BBDD de los JEFES

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
                <td class="cajaT">TAREA</td>
                <td class="cajaT">DEPARTAMENTO</td>
                <td class="cajaT">TÉCNICOS</td>
                <td class="cajaT">COSTES</td>
                <td class="cajaT">FECHA</td>
                <td class="cajaT">RESOLUCIÓN</td>
            </tr>

            <?php
                foreach($registro as $persona):
            ?>
            <tr class="cabecera">
                <td class="caja"><?php echo($persona->TAREA);?></td>
                <td class="caja"><?php echo($persona->DEPARTAMENTO);?></td>
                <td class="caja"><?php echo($persona->TECNICOS);?></td>
                <td class="caja"><?php echo($persona->COSTES);?></td>
                <td class="caja"><?php echo($persona->FECHA);?></td>
                <td class="caja"><?php echo($persona->RESOLUCION);?></td>
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
                                   background-color: rgb(147, 0, 183);
                                   . 
                                   text-align: center
                            '></td>";
                }
                echo "</tr></table></form>";
        ?>
</body>
</html>