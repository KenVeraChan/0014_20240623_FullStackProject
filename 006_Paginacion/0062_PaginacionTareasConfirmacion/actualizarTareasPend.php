<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        if(!isset($_SESSION["usuario"]))
        {
            //Si es falso que no se ha registrado nada en la sesion
            header("Location:../../005_Login/0051_LoginRRHH/loginRRHH.php");
        }
        require "../../005_Login/cierreSesionesCookie.php";   //Gestion de cierres de sesion tras consumirse la COOKIE
        $rutaPaginaAcTareasPend="location:../../005_Login/";   //Se pone la ruta desde la página actualizar tareas pendientes
        cargaWebCookie($rutaPaginaAcTareasPend);   //Se ejecuta la función de carga página según cookie desde la página actualizar tareas pendientes    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas Para Confirmar</title>
    <link rel="shortcut icon" href="../../007_Menus/iconoSectorRRHH.ico">
    <link rel="stylesheet" href="actualizarTareasPend.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!-- CARGA LA JQUERY PARA EL JS CIERRE SESSION-->
    <script src="../../005_Login/scriptCierreSesion.js"></script>  <!-- carga del fichero desde LOGIN -->
    <script src="actualizarTareasPend.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../006_Paginacion/0062_PaginacionTareasConfirmacion/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
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
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../../001_Busqueda/busquedaPHP.php'">BUSCAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../../002_Inserccion/inserccionPHP.php'"> RECLUTAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../../003_Actualizacion/actualizacionPHP.php'">CONFIGURAR CANDIDATO</button>
                </td>
            </tr>
            <tr class="cajaBotonera">    
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../../004_Eliminacion/eliminacionPHP.php'"> DESESTIMAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../../000_ConsultaContactos/ConsultaContactos.php'">MENU Y BBDD</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../../006_Paginacion/0061_PaginacionTareas/tareasPendientes.php'">TAREAS PENDIENTES</button>
                </td>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>
    <div class="consulta">
            <?php $_SESSION["semaforoTABLA"]=2; include "../../006_Paginacion/0061_PaginacionTareas/controlPend.php"; ?>
        <div class="tablaBBDD">
            <div id="tablaPaginacion">
                <table id="tabla">
                        <tr class="cabecera">
                            <td class="cajaT"></td>
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
                            <td class="caja">EN BBDD: </td>
                            <td class="caja"><?php $uno=$persona->ID; echo($persona->ID);?></td>
                            <td class="caja"><?php $dos=$persona->TAREA; echo($persona->TAREA);?></td>
                            <td class="caja"><?php $tres=$persona->DEPARTAMENTO; echo($persona->DEPARTAMENTO);?></td>
                            <td class="caja"><?php $cuatro=$persona->TECNICOS; echo($persona->TECNICOS);?></td>
                            <td class="caja"><?php $cinco=$persona->COSTES; echo($persona->COSTES);?></td>
                            <td class="caja"><?php $seis=$persona->FECHA; echo($persona->FECHA);?></td>
                            <td class="caja"><?php $siete=$persona->RESOLUCION; echo($persona->RESOLUCION);?></td>
                        </tr>
                </table>
                    <?php
                        endforeach;
                    ?>
                <form action="../../006_Paginacion/0061_PaginacionTareas/controlPend.php" method="POST">
                    <table id="tabla2">
                        <tr>
                            <td class="caja">ACTUAL: </td>
                            <td class="caja"><?php echo($id)?></td>
                            <td class="caja"><?php echo($dos)?></td>
                            <td class="caja"><?php echo($tres)?></td>
                            <td class="caja"><?php echo($cuatro)?></td>
                            <td class="caja"><?php echo($cinco)?></td>
                            <td class="caja"><?php echo($seis)?></td>
                            <td class="caja">
                            <select name="resolucion" style="width:160px; text-align:center">
                                <option value="APROBADO">APROBADO</option>
                                <option value="DENEGADO">DENEGADO</option>
                                <option value="READMITIDO">READMITIDO</option>
                                <option value="CANCELADO">CANCELADO</option>
                            </select>
                            </td>
                        </tr>
                        <tr style="height:40px">
                        </tr>
                        <tr>
                            <td class="cajaB">
                                <input type="submit" class="botonera" value="ACTUALIZAR" name="actualizar">
                                <input type="submit" class="botonera" value="VOLVER" name="VolverDeActualizar">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
      <img id="imagenPortada" src="../../006_Paginacion/0062_PaginacionTareasConfirmacion/images/DIGITALIZACION.jpg" alt="Imagen servidor">
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
    <?php $_SESSION["semaforo"]=0; //Limpieza de BUFFER imperiosa?>
    <script>
        AddAlert(<?php echo $_SESSION["logeando"]?>,2); 
        //Para el comienzo de la deteccion de la inactividad en la pagina web pero no afecta sin usuario logeado de cualquier tipo
        //Distancia 2 porque es dar dos saltos hasta el directorio raíz
    </script>
</body>
</html>
