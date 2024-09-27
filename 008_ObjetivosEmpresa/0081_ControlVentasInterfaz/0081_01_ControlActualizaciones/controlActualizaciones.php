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
    <title>Tratamiento proyectos</title>
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
                        <td class="celdaInterfaz">SECTOR</td>
                        <td class="celdaInterfaz">STOCK</td>
                        <td class="celdaInterfaz">COSTE</td>
                        <td class="celdaInterfaz">DETALLES</td>
                        <td class="celdaInterfaz">ACTUALIZAR</td>    
                    </tr>
                    <?php for($i=0;$i<$_SESSION["LIMITE"];$i++){?>
                        <tr class="filaInterfaz">
                            <td class="celdaInterfaz"><?php echo $_SESSION["idDown"][$i];?></td>
                            <td class="celdaInterfaz"><?php echo $_SESSION["nombreDown"][$i];?></td>
                            <td class="celdaInterfaz"><?php echo $_SESSION["destinoDown"][$i];?></td>
                            <td class="celdaInterfaz">ANTERIOR: <br><?php echo $_SESSION["sectorDown"][$i];?><br>ACTUAL:
                                <select type="text" class="desplegable" name="SECTOR">
                                    <option></option>
                                    <option>SLIDER</option>
                                    <option>PRODUCTOS</option>
                                    <option>SERVICIOS</option>
                                    <option>PROYECTOS</option>
                                    <option>NOVEDADES</option>
                                    <option>CATEGORIA PRODUCTOS</option>
                                    <option>CATEGORIA SERVICIOS</option>
                                    <option>CATEGORIA PROYECTOS</option>
                                </select>
                            </td>
                            <td class="celdaInterfaz">ANTERIOR: <br><?php echo $_SESSION["stockDown"][$i];?><br>ACTUAL:
                            <input type="number" class="despliegue" min="0" max="99999" name="STOCK">
                            </td>
                            <td class="celdaInterfaz">ANTERIOR: <br><?php echo $_SESSION["costeDown"][$i];?><br>ACTUAL:
                            <input type="number" class="despliegue" min="0" max="99999" step="0.25" name="COSTE">
                            </td>
                            <td class="celdaInterfaz"><?php echo $_SESSION["detallesDown"][$i];?></td>
                            <td class="celdaInterfaz"><input type="submit" name="<?php echo $_SESSION["idDown"][$i];?>" value="<?php echo $_SESSION["idDown"][$i];?>" class="boton"></td>
                        </tr>
                    <?php } ?>    
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