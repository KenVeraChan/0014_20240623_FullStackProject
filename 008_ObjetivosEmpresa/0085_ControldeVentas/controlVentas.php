<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        if(!isset($_SESSION["usuario"]))
        {
            //Si es falso que no se ha registrado nada en la sesion
            header("Location:../../005_Login/0052_LoginJEFES/loginJEFES.php");
        }
        require "gestionVentas.php";
        require "../../005_Login/cierreSesionesCookie.php";   //Gestion de cierres de sesion tras consumirse la COOKIE
        $rutaPaginaControlVentas="location:../../005_Login/";   //Se pone la ruta desde la página control Ventas Jefe
        cargaWebCookie($rutaPaginaControlVentas);   //Se ejecuta la función de carga página según cookie desde la página control Ventas Jefe      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Ventas</title>
    <link rel="stylesheet" href="controlVentas.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!-- CARGA LA JQUERY PARA EL JS CIERRE SESSION-->
    <script src="../../005_Login/scriptCierreSesion.js"></script>  <!-- carga del fichero desde LOGIN -->
    <script src="controlVentas.js"></script>
</head>
<body onload="cargarPagina()">
        <div class="letreroOK" style=
               "position:absolute;
                width:100%; 
                height: 30px; 
                text-align: center;
                color: white;
                margin-top:-40px;
                background-color: rgba(0, 0, 19, 0.89);
                box-shadow: none">
        </div>
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../008_ObjetivosEmpresa/0085_ControldeVentas/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
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
                    <button class="bloque_opciones" style="color: white" name="introTareas" onclick="cargaIntroIncidencia()"> AÑADIR INCIDENCIA</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: white" name="inspeCandidatos" onclick="cargaCuadroPedidos();"> EVALUAR PEDIDOS</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: white" onclick="location.href='../../007_Menus/0073_MenuOpJEFES/OpJEFES.php'">VOLVER</button>
                </td>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>
    <div class="consulta">
        <div class="base1">
            <div class="tablaBBDD1">   <!-- INTRODUCCION DE INCIDENCIAS: TABLA 1 DE FORMULARIO -->
                <table id="tablaIntroTareas">
                    <form class="tablaAcciones" action="../../008_ObjetivosEmpresa/0085_ControldeVentas/gestionVentas.php" method="get">
                        <p class="separacion"></p>
                        <label class="celda">INCIDENCIA:<input type="text" class="celdas" name="nombreTarea"></label> <!--ID-->
                        <p class="separacion"></p>
                        <label class="celda">DEPARTAMENTO:
                        <select name="departamento" class="desplegable">
                                    <option style="width: 180px;"></option>
                                    <option style="width: 180px;">I+D+I</option>
                                    <option style="width: 180px;">MARKETING</option>
                                    <option style="width: 180px;">PRODUCCION</option>
                                    <option style="width: 180px;">RR.HH.</option>
                                    <option style="width: 180px;">FINANZAS</option>
                                    <option style="width: 180px;">LOGISTICAS</option>
                                    <option style="width: 180px;">DIRECTIVO</option>
                                    <option style="width: 180px;">ADMINISTRACION</option>
                                    <option style="width: 180px;">COMERCIAL</option>
                                </select>
                        </label> <!--DEPARTAMENTO-->                        
                        <p class="separacion"></p>
                        <label class="celda">TECNICOS:<input type="number" class="celdas" name="tecnicos"min="1" max="100"></label>  
                        </label> <!--TECNICOS-->
                        <p class="separacion"></p>
                        <label class="celda">COSTES:<input type="text" class="celdas" name="costes"></label>
                        <p class="separacion"></p>
                        <label class="celda">FECHA:<input type="date" class="desplegable" name="fecha"></label>
                            <p class="separacion"></p>
                        <label class="celda">CONFIRMACIÓN:
                            <select name="resolucion" class="desplegable">
                                    <option></option>
                                    <option>APROBADO</option>
                                    <option>CANCELADO</option>
                                    <option>PENDIENTE</option>
                                    <option>READMITIDO</option>
                                </select>
                        </label>
                        <p class="separacion"></p>                  
                        <input type="submit" value="INSERTAR" name="inserccion" class="boton">
                    </form>
                </table>
            </div>    
        </div>
        <div class="base2">
            <div class="tablaBBDD2">  <!-- EVALUACION DE PEDIDOS: TABLA 2 DE PERSONAL PARA PLANTILLA -->
                <table id="tablaCandidatura">
                    <tr class="cabecera">
                        <td class="cajaT">ID</td>
                        <td class="cajaT">NOMBRE</td>
                        <td class="cajaT">NUMERO</td>
                        <td class="cajaT">TELEFONO</td>
                        <td class="cajaT">DIRECCION</td>
                        <td class="cajaT">CORREO ELECTRÓNICO</td>
                        <td class="cajaT">CONCEPTO</td>
                        <td class="cajaT">DEPARTAMENTO</td>
                        <td class="cajaT">CANTIDAD</td>
                        <td class="cajaT">COSTE UNITARIO</td>
                        <td class="cajaT">COSTE TOTAL</td>
                        <td class="cajaT">FECHA PEDIDO</td>
                        <td class="cajaT">REFERENCIA PEDIDO</td>
                        <td class="cajaT">TRAMITACIÓN DEL PEDIDO</td>
                    </tr>
                <?php
                    inspecionPedidos();
                    $registroCandidatos= $_SESSION["candidatos"];
                    foreach($registroCandidatos as $candidato):
                ?>
                    <tr class="cabecera">
                        <td class="caja"><?php echo($candidato->ID);?></td>
                        <td class="caja"><?php echo($candidato->NOMBRE);?></td>
                        <td class="caja"><?php echo($candidato->NUMERO);?></td>
                        <td class="caja"><?php echo($candidato->TELEFONO);?></td>
                        <td class="caja"><?php echo($candidato->DIRECCION);?></td>
                        <td class="caja"><?php echo($candidato->CORREO);?></td>
                        <td class="caja"><?php echo($candidato->CONCEPTO);?></td>
                        <td class="caja"><?php echo($candidato->DEPARTAMENTO);?></td>
                        <td class="caja"><?php echo($candidato->CANTIDAD);?></td>
                        <td class="caja"><?php echo($candidato->COSTE_UNITARIO)."€";?></td>
                        <td class="caja"><?php echo($candidato->COSTE_TOTAL)."€";?></td>
                        <td class="caja"><?php echo($candidato->FECHA_PEDIDO);?></td>
                        <td class="caja"><?php echo($candidato->REFERENCIA);?></td>
                        
                        <?php if($candidato->ENTREGADO=="PENDIENTE"):?>  <!-- Redireccionamiento a otra página de aceptación o denegación de la candidatura -->
                            <td class="caja">
                                <div class="caja" style="width:95px; text-align:center; padding-top: 3px; color:white; background-color:rgb(125,132,17); font-size:86%; float:left"><?php echo($candidato->ENTREGADO);?></div>
                                <a href="gestionVentas.php?id=<?php echo($candidato->ID);?>&validez=1"><input type="submit" class="cajaPendidente" style="text-align:center;  color:white; background-color:rgb(13,101,37); width:101.5px; float:left; position:relative; font-size:86%" value="ENTREGAR!" title="Accionar para ENVIAR el PEDIDO al cliente"></a>
                                <a href="gestionVentas.php?id=<?php echo($candidato->ID);?>&validez=0"><input type="submit" class="cajaPendidente" style="text-align:center;  color:white; background-color:rgb(121,15,15); width:101.5px; float:left; position:relative; font-size:86%" value="CANCELAR!" title="Accionar para CANCELAR el PEDIDO del cliente"></a>
                            </td>
                        <?php endif; ?>
                        <?php if($candidato->ENTREGADO=="ENTREGADO"):?>
                            <td class="caja" style="text-align:center; color:white; background-color:rgb(13,101,37); font-size:90%; padding-top: 3px"><?php echo("PEDIDO ".$candidato->ENTREGADO);?></td>
                        <?php endif; ?>
                        <?php if($candidato->ENTREGADO=="CANCELADO"):?>
                            <td class="caja" style="text-align:center; color:white; background-color:rgb(121,15,15); font-size:90%; padding-top: 3px"><?php echo("PEDIDO ".$candidato->ENTREGADO);?></td>
                        <?php endif; ?>
                    </tr>
                <?php
                    endforeach;
                ?>
                </table>
            </div>
        </div>
        <img id="imagenPortada" src="../../008_ObjetivosEmpresa/0085_ControldeVentas/images/REUNIONES.jpg" alt="Imagen Reuniones">
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
    <script>letreroConfirmado(<?php echo($_SESSION["semaforo"])?>);</script>
    <?php $_SESSION["semaforo"]=0; //Reiniciar variable ?> 
    <script>
        AddAlert(<?php echo $_SESSION["logeando"]?>,2); 
        //Para el comienzo de la deteccion de la inactividad en la pagina web pero no afecta sin usuario logeado de cualquier tipo
        //Distancia 2 porque es dar dos saltos hasta el directorio raíz
    </script>
</body>
</html>