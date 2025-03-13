<?php
session_start();   //Uso de la variable GLOBAL
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
include "consultasMostradorProductos.php";  //CARGA EL MOSTRADOR DE PRODUCTOS PRINCIPALMENTE
    require "../../005_Login/cierreSesionesCookie.php";   //Gestion de cierres de sesion tras consumirse la COOKIE
    $rutaPaginaProductos="location:../../005_Login/";   //Se pone la ruta desde la página Productos
    cargaWebCookie($rutaPaginaProductos);   //Se ejecuta la función de carga página según cookie desde la página Productos
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal Corporación Sfer4D</title>
    <link rel="shortcut icon" href="../../009_SectorPublico/iconoSectorPublico.ico">   <!-- ICONO DE LA PAGINA PRODUCTOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- ESTILOS CSS PARA TRAER DE LA URL LOS ICONOS DE LAS REDES SOCIALES -->
    <link rel="stylesheet" href="../../009_SectorPublico/0093_PaginaProductos/paginaProductos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!-- CARGA LA JQUERY PARA EL JS CIERRE SESSION-->
    <script src="../../005_Login/scriptCierreSesion.js"></script>  <!-- carga del fichero desde LOGIN -->
    <script src="../../009_SectorPublico/0093_PaginaProductos/scriptsProductos.js"></script>
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
        <div id="iconoAdorno"><img src="../../009_SectorPublico/0093_PaginaProductos/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>      
        <?php if(isset($_SESSION["usuario"])) {?>
            <div id="areaSesion">
                <table style="width:100%">
                    <tr>
                        <div id="bienvenido"><strong><?php echo"Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
                        <a href="../../005_Login/salidaPagina.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
                    </tr>
                </table>
            </div>   
        <?php }?>
        <?php if(!isset($_SESSION["usuario"])) {?>
            <div id="areaSesion">
                <table style="width:100%">
                    <tr>
                        <div id="bienvenido" style="margin-top:15px"><strong>Bienvenido: Cliente Invitado</strong></div>                    
                        <div id="cerrarSesion"></div>
                    </tr>
                </table>
            </div>   
        <?php }?>
        <div class="VaciobotonesPrincipal">
            <a href="../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php" class="areaPrivada"><img src="../../009_SectorPublico/0093_PaginaProductos/images/CANDADO.png" title="Area Privada" alt="Area Privada" width="40px" height="40px"></a>
            <a href="../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php" class="areaPrivada"><img src="../../009_SectorPublico/0093_PaginaProductos/images/COMPRAS.png" title="Ver Carrito de Compra" alt="Ver Carrito de Compra" width="40px" height="40px"></a>
        </div>
        <table id="tabla">
            <tr class="cajaBotonera">
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(1);?>'">INICIO</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(2);?>'">HISTORIA</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(3);?>'">PRODUCTOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(4);?>'">SERVICIOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(5);?>'">PROYECTOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(6);?>'">CLIENTES</div>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>  
    <div class="consulta" style="background-image: url(../../009_SectorPublico/0093_PaginaProductos/images/PRODUCTOS.jpg); background-size: 100% 100%;">    
    <form action="../../009_SectorPublico/0093_PaginaProductos/consultasProductos.php" method="GET">
        <table class="seccionPrincipal">   <!-- PRIMERA BANDA COMO MOSTRADOR DE VENTAS -->
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="productCategory/<?php echo extraccionCategoriaProductos(1);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">CONSTRUCCION</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo" style="visibility:hidden"><?php echo extraeDetallesProductos("CONSTRUCCION")?></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="CONSTRUCCION" value="CATALOGO"></td>
                        </tr>
                    </table>
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="productCategory/<?php echo extraccionCategoriaProductos(2);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">INDUSTRIA</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo" style="visibility:hidden"><?php echo extraeDetallesProductos("INDUSTRIA")?></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="INDUSTRIA" value="CATALOGO"></td>
                        </tr>
                    </table>    
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="productCategory/<?php echo extraccionCategoriaProductos(3);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">BIOINGENIERÍA</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo" style="visibility:hidden"><?php echo extraeDetallesProductos("BIOINGENIERIA")?></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="BIOINGENIERIA" value="CATALOGO"></td>
                        </tr>
                    </table> 
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="productCategory/<?php echo extraccionCategoriaProductos(4);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">AEROESPACIAL</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo" style="visibility:hidden"><?php echo extraeDetallesProductos("AEROESPACIAL")?></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="AEROESPACIAL" value="CATALOGO"></td>
                        </tr>
                    </table>  
                </td>
        </table>
    </form>
    <?php  if($_SESSION["concesion"]==1){ ?>    <!-- EN EL CASO DE QUE SE HAYA ACCIONADO CUALQUIER BOTON DEL MOSTRADOR-->
            <table class="seccionDET">   <!-- SEGUNDA BANDA DE DETALLE DE LAS VENTAS ELEGIDAS -->        
                <td class="noticiaDET">
                    <table class="tablaInternaDET">
                        <tr class="filaDET">
                            <td><img class="imgBloquesDET" src="productCategory/<?php echo($_SESSION["SECTORPROD"][0]);?>.png"></td>
                        </tr>
                        <tr class="filaDET">
                            <td><div style="margin-left:2%"><?php echo($_SESSION["SECTORPROD"][0]);?></div></td>
                        </tr>
                        <?php $i=0; for($i=0;$i<$_SESSION["MAX"];$i++)
                                    {
                                        if(!empty($_SESSION["NOMBREPROD"][$i]))  //Comprueba si la variable de la celda del ARRAY NO está vacío
                                        {
                                        ?>
                        <tr class="filaDET">
                            <td>
                                <p class="contenedorEnlace">
                                    <a href="../../009_SectorPublico/0093_PaginaProductos/consultasProductos.php?ID=<?php echo $_SESSION["IDPROD"][$i];?>" class="botonAc">
                                        <?php echo $_SESSION["NOMBREPROD"][$i];?>
                                    </a>
                                </p>    
                            </td>
                        </tr>
                                <?php }
                                }; ?>
                    </table>
                </td>
                <td class="noticiaDET">
                    <form action="../../009_SectorPublico/0096_PaginaGestionCliente/consultasCliente.php" method="GET">
                        <table class="tablaInternaDET">
                            <tr class="filaDET">
                                <td>
                                    <br><img class="imgBloquesDES" src="<?php echo $_SESSION["DESTINOPROD"].$_SESSION["NOMBRE_PROD"];?>" alt="Imagen producto">
                                </td>
                            </tr>
                            <tr class="filaDET">
                                <td><div name="idPEDIDO" style="margin-left:2%"><br><br><strong>ID:<br></strong><?php echo $_SESSION["ID_PROD"];?><br></div></td>
                            </tr>
                            <tr class="filaDET">
                                <td><div name="nombrePEDIDO" style="margin-left:2%"><br><strong>NOMBRE:<br></strong><?php echo substr($_SESSION["NOMBRE_PROD"],0,-4);?><br><br></div></td>
                            </tr>
                            <tr class="filaDET">
                                <td><div name="stockPEDIDO" style="margin-left:2%"><strong>STOCK DISPONIBLE:<br></strong><?php echo $_SESSION["STOCK_PROD"];?><br><br></div></td>
                            </tr>
                            <tr class="filaDET">
                                <td><div name="costePEDIDO" style="margin-left:2%"><strong>COSTE UNIDAD:<br></strong><?php echo $_SESSION["COSTE_PROD"];?><br><br></div></td>
                            </tr>
                            <tr class="filaDET">
                                <td><div name="detallePEDIDO" style="margin-left:2%"><strong>DETALLES PRODUCTO:<br></strong><?php echo $_SESSION["DETALLES_PROD"];?><br><br></div></td>
                            </tr>
                            <tr class="filaDET">
                                <td>
                                    <br><br><input type="submit" class="comprar" name="comprar" value="<?php echo $_SESSION["ID_PROD"];?>" title="Accionar para añadir a la cesta">
                                </td>
                            </tr>
                            <tr class="filaDET">
                                <td>
                                    <div style="margin-left:2%"><strong class="cajaCantidad">CANTIDAD</strong></div>
                                    <input type="number" class="despliegue" min="0" max="<?php echo $_SESSION["STOCK_PROD"];?>" name="cantidad">
                                </td>
                            </tr>
                        </table>
                    </form>   
                </td>
            </table>
    <?php } ?>
    <?php  if($_SESSION["concesion"]==0){ ?>    <!-- EN EL CASO DE QUE NO SE HAYA ACCIONADO CUALQUIER BOTON DEL MOSTRADOR-->
        <!-- NO MUESTRA NADA AL NO ENCONTRARSE NADA -->
    <?php } ?>
    </div>
    <div class="piePagina">
        <footer id="piePrincipal">
            <div id="redesSociales">  <!-- TRAYENDO LOS ICONOS DE LAS REDES SOCIALES Y DÁNDOLES DECOARION -->
                <i class="fa fa-apple" id="apple"></i>
                <i class="fa fa-twitter-square" id="twitter"></i>
                <i class="fa fa-github-square" id="github"></i>
                <i class="fa fa-facebook-square" id="facebook"></i> 
                <i class="fa fa-youtube-square" id="youtube"></i> 
                <i class="fa fa-linkedin-square" id="linkedin"></i> 
                <i class="fa fa-whatsapp" id="whatsapp"></i> 
                <i class="fa fa-instagram" id="instagram"></i> 
                <i class="fa fa-map-marker" id="mapsg"></i>
            </div>
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
    <?php session_start(); if($_SESSION["concesion"]==1)
    {
      echo  "<script type='text/javascript'>
            document.addEventListener('DOMContentLoaded',function(event){
                let temporizador=setTimeout(function(){
                    window.scrollTo(0,650);
                },0);
            });
            clearTimeout(temporizador);
            </script>"; 
            $_SESSION["concesion"]=0;   //Se inhabilita la opción de bajar hasta el nuevo accionamiento 
    } 
    ?>
    <script>AddAlert(<?php echo $_SESSION["logeando"]?>,2); //Para el comienzo de la deteccion de la inactividad en la pagina web pero no afecta sin usuario logeado de cualquier tipo</script>
</body>
</html>