<?php
    //INICIA LA SESION DE ENTRADA
    session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                        //También permite rescatar la información almancenada en la variable superglobal $_SESSION
    if(!isset($_SESSION["usuario"]))
    {
        //Si es falso que no se ha registrado nada en la sesion
        header("Location:../../../005_Login/0052_LoginJEFES/loginJEFES.php");
    }
    //Ignorar el WARNING de la primera ejecución de esta página web y que no considere WARNING el $_SESSION["senalImagen"]
    error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar datos de una imagen</title>
    <link rel="stylesheet" href="controlActualizaciones.css">
    <script src="controlActualizaciones.js"></script>
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
        <div id="iconoAdorno"><img src="../images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
        <div id="areaSesion">
            <table style="width:100%">
                <tr>
                        <div id="bienvenido"><strong><?php echo"Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
                        <a href="../../../005_Login/salidaPagina.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
                </tr>
            </table>
        </div>        
        <div class="VaciobotonesPrincipal"></div>
    </header>
    <div class="consulta">
        <div id="tituloGeneral"><strong>TABLA BBDD DE IMAGENES DE INTERFAZ COMPLETA</strong></div>
        <div class="tableroDiagrama" style="position:absolute">
            <form action="../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/gestionVentasInterfaz.php" method="GET">
                <table id="representacionBBDD">
                    <tr class="filaInterfaz">
                        <td class="celdaInterfaz">ID</td>
                        <td class="celdaInterfaz">NOMBRE</td>
                        <td class="celdaInterfaz">DESTINO</td>
                            <?php if(strcmp($_SESSION["destinoDown"][0],"PRODUCTOS")==0 || strcmp($_SESSION["destinoDown"][0],"SERVICIOS")==0 || strcmp($_SESSION["destinoDown"][0],"PROYECTOS")==0){ ?>
                                <td class="celdaInterfaz">SECTOR</td>
                                <td class="celdaInterfaz">STOCK</td>
                                <td class="celdaInterfaz">COSTE</td>
                            <?php } ?>
                        <td class="celdaInterfaz" colspan="10">DETALLES</td>
                        <td class="celdaInterfaz">REGRESAR</td>    
                    </tr>
                    <tr class="filaInterfaz">
                        <td class="celdaInterfaz"><?php echo $_SESSION["idDown"][0];?></td>
                        <td class="celdaInterfaz"><?php echo $_SESSION["nombreDown"][0];?></td>
                        <td class="celdaInterfaz"><?php echo $_SESSION["destinoDown"][0];?></td>
                        <?php if(strcmp($_SESSION["destinoDown"][0],"PRODUCTOS")==0 || strcmp($_SESSION["destinoDown"][0],"SERVICIOS")==0 || strcmp($_SESSION["destinoDown"][0],"PROYECTOS")==0){ ?>
                            <?php if(strcmp($_SESSION["destinoDown"][0],"PRODUCTOS")==0){ ?>
                                <td class="celdaInterfaz">ANTERIOR: <br><?php echo $_SESSION["sectorDown"][0];?><br>ACTUAL:
                                    <select type="text" class="despliegue" name="SECTOR">
                                        <option></option>
                                        <option>AEROESPACIAL</option>
                                        <option>BIOINGENIERIA</option>
                                        <option>CONSTRUCCION</option>
                                        <option>INDUSTRIA</option>
                                    </select> 
                                </td>
                            <?php } ?>
                            <?php if(strcmp($_SESSION["destinoDown"][0],"SERVICIOS")==0){ ?>
                                <td class="celdaInterfaz">ANTERIOR: <br><?php echo $_SESSION["sectorDown"][0];?><br>ACTUAL:
                                    <select type="text" class="despliegue" name="SECTOR">
                                        <option></option>
                                        <option>ASTRONOMIA</option>
                                        <option>ECOLOGIA</option>
                                        <option>OCEANOGRAFIA</option>
                                        <option>TELECOMUNICACIONES</option>
                                        <option>MEDICINA</option>
                                        <option>AUTOMATIZACION</option>
                                        <option>INFRAESTRUCTURAS</option>
                                        <option>EDUCACION</option>
                                    </select> 
                                </td>
                            <?php } ?>
                            <?php if(strcmp($_SESSION["destinoDown"][0],"PROYECTOS")==0){ ?>
                                <td class="celdaInterfaz">ANTERIOR: <br><?php echo $_SESSION["sectorDown"][0];?><br>ACTUAL:
                                    <select type="text" class="despliegue" name="SECTOR">
                                        <option></option>
                                        <option>AGRICULTURA</option>
                                        <option>ATMOSFERA</option>
                                        <option>CARRETERAS</option>
                                        <option>COLONIZACION</option>
                                        <option>METEORITO</option>
                                        <option>PROFUNDIDADES</option>
                                        <option>PROGRAMACION</option>
                                        <option>SUBMARINISMO</option>
                                    </select> 
                                </td>
                            <?php } ?>

                            <td class="celdaInterfaz">ANTERIOR: <br><?php echo $_SESSION["stockDown"][0];?><br>ACTUAL:
                                <input type="number" class="despliegue" min="0" max="99999" name="STOCK">
                            </td>
                            <td class="celdaInterfaz">ANTERIOR: <br><?php echo $_SESSION["costeDown"][0];?><br>ACTUAL:
                                <input type="number" class="despliegue" min="0" max="99999" step="0.25" name="COSTE">
                            </td>
                        <?php } ?>
                        <td class="celdaInterfaz">ANTERIOR: <?php echo $_SESSION["detallesDown"][0];?><br>ACTUAL:
                                <input type="text" class="despliegue" name="DETALLES">
                        </td>
                        <td class="celdaInterfaz" colspan="10">
                            <input type="submit" class="boton" value="ACTUALIZAR" name="ACTUALIZAR">  <!-- carga la ACTUALIZACION -->
                            <p class="regresar">
                                <a href="../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/gestionVentasInterfaz.php?DESTINOS=SLIDER"  
                                   class="referencia"
                                   name="DETALLES" 
                                   value="SLIDER"
                                   style="text-decoration:none;
                                          color:rgb(214, 214, 3);">VOLVER
                                </a>  <!-- carga SLIDER al regresar a la pantalla anterior por DEFECTO-->
                            </p>
                        </td>
                    </tr>  
                    <tr class="filaInterfaz">
                        <td class="celdaInterfaz" style="height:20px;" colspan="14">
                                <p style="text-align: center;
                                          padding-top:10px;
                                          height:30px;
                                          background: -webkit-linear-gradient(top, #000011, #000041);">
                                          IMAGEN REGISTRADA
                                </p>
                        </td>
                    </tr> 
                    <tr class="filaInterfaz">
                        <td class="celdaInterfaz" style="height:700px;" colspan="14">
                                <img src="../<?php echo $_SESSION["rutaImagen"].$_SESSION["nombreDown"][0];?>" alt="Imagen del elemento">
                        </td>
                    </tr> 
                </table>
            </form>
        </div>
        <img id="imagenPortada" src="../images/REUNIONES.jpg" alt="Imagen Reuniones">
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
    <script>letreroConfirmado(<?php echo($_SESSION["senalImagen"])?>);</script>
    <?php $_SESSION["senalImagen"]=0; //Reiniciar variable ?> 
</body>
</html>