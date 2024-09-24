<?php
    //INICIA LA SESION DE ENTRADA
    session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                        //También permite rescatar la información almancenada en la variable superglobal $_SESSION
    if(!isset($_SESSION["usuario"]))
    {
        //Si es falso que no se ha registrado nada en la sesion
        header("Location:../../005_Login/0052_LoginJEFES/loginJEFES.php");
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
    <link rel="stylesheet" href="controlVentasInterfaz.css">
    <script src="../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/controlVentasInterfaz.js"></script>
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
        <div id="iconoAdorno"><img src="../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
        <div id="areaSesion">
            <table style="width:100%">
                <tr>
                        <div id="bienvenido"><strong><?php echo"Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
                        <a href="../../005_Login/salidaPagina.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
                </tr>
            </table>
        </div>        
        <div class="VaciobotonesPrincipal"></div>
    </header>
    <div class="consulta">
        <div id="tituloGeneral"><strong>GESTIÓN DE PRECIOS DE PRODUCTOS SERVICIOS Y PROYECTOS</strong></div>
        <div class="tableroDiagrama" style="position:absolute">
            <table id="formularioInterno">
                <form class="tablaAcciones" action="../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/gestionVentasInterfaz.php" method="post" enctype="multipart/form-data">
                    <label class="celda">DESTINO DE ALMACENAJE:</label>
                        <select type="text" class="desplegable" name="eleccionSector">
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
                    <label class="celda">
                    <input type="submit" value="CARGA" name="DOWNLOAD" class="boton">
                    <input type="submit" value="VOLVER" name="EXIT" class="boton">
                    </label>
                    <p class="separacion"></p>
                    <p class="separacion"></p>                   
                    <p class="separacion"></p>                  
                </form>
            </table>
        </div>
        <div class="tableroMostrador">
            <table id="tablaMostrador">
                <tr class="filaBBDD">
                    <td class="BBDD">ID</td>
                    <td class="BBDD">NOMBRE</td>
                    <td class="BBDD">TIPO</td>
                    <td class="BBDD">TAMANIO</td>
                    <td class="BBDD">DESTINO</td>
                    <td class="BBDD">SECTOR</td>
                    <td class="BBDD">STOCK</td>
                    <td class="BBDD">COSTE</td>
                    <td class="BBDD">DETALLES</td>
                </tr>
                <?php for($i=0;$i<$_SESSION["LIMITE"];$i++){?>
                    <?php if(strcmp($_SESSION["idDown"][$i],"")!=0){?>
                        <tr class="filaBBDD">
                            <td class="BBDD"><?php echo $_SESSION["idDown"][$i];?></td>
                            <td class="BBDD"><?php echo $_SESSION["nombreDown"][$i];?></td>
                            <td class="BBDD"><?php echo $_SESSION["tipoDown"][$i];?></td>
                            <td class="BBDD"><?php echo $_SESSION["tamanioDown"][$i];?></td>
                            <td class="BBDD"><?php echo $_SESSION["destinoDown"][$i];?></td>
                            <td class="BBDD"><?php echo $_SESSION["sectorDown"][$i];?></td>
                            <td class="BBDD"><?php echo $_SESSION["stockDown"][$i];?></td>
                            <td class="BBDD"><?php echo $_SESSION["costeDown"][$i];?></td>
                            <td class="BBDD"><?php echo $_SESSION["detallesDown"][$i];?></td>
                        </tr>
                    <?php }?>
                <?php } //cierra el FOR del exterior que pone todas las filas con el mismo DESTINO?>
            </table>
        </div>
        <img id="imagenPortada" src="../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/images/REUNIONES.jpg" alt="Imagen Reuniones">
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