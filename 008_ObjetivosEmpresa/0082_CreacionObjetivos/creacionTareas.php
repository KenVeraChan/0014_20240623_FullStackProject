<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        if(!isset($_SESSION["usuario"]))
        {
            //Si es falso que no se ha registrado nada en la sesion
            header("Location:../../005_Login/0052_LoginJEFES/loginJEFES.php");
        }
        $_SESSION["cediendo"]=0; //Se reinicia la variable para la carga del codigo PHP
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creando Tareas</title>
    <link rel="stylesheet" href="creacionTareas.css">
    <script src="creacionTareas.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../008_ObjetivosEmpresa/0082_CreacionObjetivos/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
        <div id="areaSesion">
            <table style="width:100%">
                <tr>
                        <div id="bienvenido"><strong><?php echo"Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
                        <a href="../../005_Login/salidaPagina.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
                </tr>
            </table>
        </div>        
        <div class="VaciobotonesPrincipal"></div>
        <table id="tabla">
            <tr class="cajaBotonera">
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: white" onclick="cargaCuadro();">CARGAR TAREAS</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: white" onclick="location.href=''"> AÑADIR TAREAS</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: white" onclick="location.href=''"> EVALUAR CANDIDATOS</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: white" onclick="location.href=''">VOLVER</button>
                </td>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>
    <div class="consulta">
        <div class="base">
            <div class="tablaBBDD">
                <table id="tablaPaginacion">
                    <tr class="cabecera">
                        <td class="cajaT">TAREA</td>
                        <td class="cajaT">DEPARTAMENTO</td>
                        <td class="cajaT">TECNICOS</td>
                        <td class="cajaT">COSTES(-) y BENEFICIO(+)</td>
                        <td class="cajaT">FECHA</td>
                        <td class="cajaT">RESOLUCION</td>
                    </tr>
                <?php
                    $_SESSION["cediendo"]=1;  //Se cede el paso del código de búsqueda PHP
                    require "gestionTareas.php";
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
            </div>
            <div class="tablaBBDD2">
                <table id="tablaEstadisticas">
                    <tr class="cabecera">
                        <td class="cajaE"><strong>DEPARTAMENTOS</strong></td>
                        <td class="cajaS"><strong>INGRESOS</strong></td>
                        <td class="cajaS"><strong>COSTES</strong></td>
                        <td class="cajaS"><strong>BENEFICIOS</strong></td>
                        <td class="cajaS"><strong>GANANCIA %</strong></td>              
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">I+D+I</td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">MARKETING</td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">PRODUCCION</td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">RR.HH.</td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">FINANZAS</td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">LOGISTICA</td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">DIRECTIVO</td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">ADMINISTRACION</td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">COMERCIAL</td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                        <td class="cajaS"></td>
                    </tr>
                </table>
            </div>
        </div>
        <img id="imagenPortada" src="../../008_ObjetivosEmpresa/0082_CreacionObjetivos/images/REUNIONES.jpg" alt="Imagen Reuniones">
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