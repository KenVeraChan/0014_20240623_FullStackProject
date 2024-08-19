<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        if(!isset($_SESSION["usuario"]))
        {
            //Si es falso que no se ha registrado nada en la sesion
            header("Location:../005_Login/0051_LoginRRHH/loginRRHH.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas Pendientes Generadas</title>
    <link rel="stylesheet" href="tareasPendientes.css">
    <script src="tareasPendientes.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../008_ObjetivosEmpresa/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
    <div id="areaSesion">
        <table style="width:100%">
            <tr>
                    <div id="bienvenido"><strong><?php echo"Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
                    <a href="../005_Login/salidaPagina.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
            </tr>
        </table>
    </div>        
        <div class="VaciobotonesPrincipal"></div>
        <table id="tabla">
            <tr class="cajaBotonera">
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../001_Busqueda/busquedaPHP.php'">BUSCAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../002_Inserccion/inserccionPHP.php'"> RECLUTAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../003_Actualizacion/actualizacionPHP.php'">CONFIGURAR CANDIDATO</button>
                </td>
            </tr>
            <tr class="cajaBotonera">    
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../004_Eliminacion/eliminacionPHP.php'"> DESESTIMAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../000_ConsultaContactos/ConsultaContactos.php'">MENU Y BBDD</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../008_ObjetivosEmpresa/tareasPendientes.php'">TAREAS PENDIENTES</button>
                </td>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>
    <div class="consulta">
        <?php $_SESSION["semaforo"]=1; include "controlPend.php"; ?>
        <div class="tablaBBDD">
            <table id="tablaPaginacion">
                <tr class="cabecera">
                    <td class="cajaT">ID</td>
                    <td class="cajaT">TAREA</td>
                    <td class="cajaT">DEPARTAMENTO</td>
                    <td class="cajaT">TECNICOS</td>
                    <td class="cajaT">COSTES</td>
                    <td class="cajaT">FECHA</td>
                    <td class="cajaT">RESOLUCION</td>
                </tr>

                <?php
                    foreach($registro as $persona):
                ?>
                <tr class="cabecera">
                    <td class="caja"><?php echo($persona->ID);?></td>
                    <td class="caja"><?php echo($persona->TAREA);?></td>
                    <td class="caja"><?php echo($persona->DEPARTAMENTO);?></td>
                    <td class="caja"><?php echo($persona->TECNICOS);?></td>
                    <td class="caja"><?php echo($persona->COSTES);?></td>
                    <td class="caja"><?php echo($persona->FECHA);?></td>
                    <td class="caja"><?php echo($persona->RESOLUCION);?></td>
                    <td class="caja">
                        <a href="../008_ObjetivosEmpresa/0081_ConfirmacionObjetivos/actualizarTareasPend.php?id=<?php echo($persona->ID);?>">
                            <input class="botonera" type="submit" value="Actualizar">
                        </a>
                    </td>
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
                    echo"<br><br>";
                    echo"<form method='GET' style='margin-left:100px width:800px'><table style='width:750px'><tr>";
                    for($i=0;$i<(round($filasSQLBoton,0,PHP_ROUND_HALF_UP)+1);$i++)
                    {
                        echo"<td><input 
                                type='submit'
                                name='cargaPagina'
                                class='accionamientos' 
                                value='$i'></td>";
                    }
                    echo "<td class='nota'> Hay: ".$filasSQL." regitros detectados</td>";
                    echo "</tr></table></form>";
            ?>
        </div>
        <img id="imagenPortada" src="../008_ObjetivosEmpresa/images/SERVIDOR.jpg" alt="Imagen servidor">
    </div>
    <div class="piePagina">
        <footer id="piePrincipal">
            <div id="zocalo">
                -------- Fundadores --------
                <br><strong>William Wissangel</strong></br>
                <strong>Sharyllín Rousher</strong>
                <br>---- Correo Electrónico ----</br>
                <strong>sfer4D_corporation@outlook.com</strong>
            </div>
            <div class="pie">
                Asociado: <strong>BioGenTech Corp</strong><br>
                Competidor: <strong>Techeimer Corp</strong><br>
                Inversor: <strong>Medigraria Corporation</strong><br>
                Registro 2024: <strong>Registro C4321</strong>
            </div>
        </footer>
    </div>
</body>
</html>