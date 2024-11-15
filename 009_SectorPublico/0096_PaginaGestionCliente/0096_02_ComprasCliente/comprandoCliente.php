<?php
//INICIA LA SESION DE ENTRADA
session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                    //También permite rescatar la información almancenada en la variable superglobal $_SESSION
require_once "../../../009_SectorPublico/0096_PaginaGestionCliente/0096_02_ComprasCliente/comprandoCliente.php";
//Para cargar los datos personales del cliente en la cabecera de la pagina web
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area de Compras Realizadas Cliente</title>
    <link rel="stylesheet" href="comprandoCliente.css">
    <script src="scriptsComprandoCliente.js"></script>
</head>
<body onload="cargarPagina()">
        <div class="letreroOK" style=
               "position:absolute;
                width:100%; 
                height: 40px; 
                text-align: center;
                color: white;
                margin-top:-100px;
                background-color: rgba(0, 0, 19, 0.89);
                box-shadow: none">
        </div>
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_02_ComprasCliente/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
        <div id="areaSesion">
        <table style="width:100%">
            <tr>
                <div id="bienvenido"><strong><?php echo "Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
                <a href="../../../005_Login/salidaPagina.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
            </tr>
        </table>
    </div>         
    <div class="VaciobotonesPrincipal"></div>
    <table class="seccionPrincipal">   <!-- PRIMERA BANDA COMO MOSTRADOR DE VENTAS -->
        <tr class="filaCompra" style="height:10px">
            <td class="celdaCompra" colspan="2">AREA DE COMPRAS DEL CLIENTE</td>
            <td class="celdaCompra" colspan="5"> 
                <?php cambiaFranjaHoraria(); //Carga la franja horaria del día en la que se ha consultado la página web ?>
            </td>
        </tr>
    </table>
    </header>
                    
        <?php if(date("G")>=7 && date("G")<13){  //POR LA MAÑANA: CARGA FOTO DE POR LA MAÑANA?>
        <div class="cajaPortadora" style="background-image: url('../../../009_SectorPublico/0096_PaginaGestionCliente/0096_02_ComprasCliente/images/COMPRASDEDIA.png')">
        <?php } ?>
        <?php if(date("G")>=13 && date("G")<21){  //POR LA TARDE: CARGA FOTO DE POR LA TARDE?>
        <div class="cajaPortadora" style="background-image: url('../../../009_SectorPublico/0096_PaginaGestionCliente/0096_02_ComprasCliente/images/COMPRASDETARDE.png')">
        <?php } ?>
        <?php if(date("G")>=21 || date("G")<7){  //POR LA NOCHE: CARGA FOTO DE POR LA NOCHE?>
        <div class="cajaPortadora" style="background-image: url('../../../009_SectorPublico/0096_PaginaGestionCliente/0096_02_ComprasCliente/images/COMPRASDENOCHE.png')">
        <?php } ?>
            <form action="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_02_ComprasCliente/consultasComprandoCliente.php" method="POST">
                <div class="cuadro">
                    <table id="tabla">
                        <tr class="cajaBotonera">  <!-- ZONA DE DATOS PERSONALES PARA MOSTRAR COMPRAS REALIZADAS -->
                            <td>
                                <label class="filaformulario">NOMBRE</label>
                            </td>
                            <td>
                                <label class="filaCliente"><?php if(isset($_SESSION["nombreCompra"])){echo $_SESSION["nombreCompra"];}else{echo"-------";}?></label>
                            </td>
                        </tr>
                        <tr class="cajaBotonera">  <!-- ZONA DE DATOS PERSONALES PARA MOSTRAR COMPRAS REALIZADAS -->
                            <td>
                                <label class="filaformulario">CUENTA</label>
                            </td>
                            <td>
                                <label class="filaCliente"><?php if(isset($_SESSION["numeroCompra"])){echo $_SESSION["numeroCompra"];}else{echo"-------";}?></label>
                            </td>
                        </tr>
                        <tr class="cajaBotonera">  <!-- ZONA DE DATOS PERSONALES PARA MOSTRAR COMPRAS REALIZADAS -->
                            <td>
                                <label class="filaformulario">TELEFONO</label>
                            </td>
                            <td>
                                <label class="filaCliente"><?php if(isset($_SESSION["telefonoCompra"])){echo $_SESSION["telefonoCompra"];}else{echo"-------";}?></label>
                            </td>
                        </tr>
                        <tr class="cajaBotonera">  <!-- ZONA DE DATOS PERSONALES PARA MOSTRAR COMPRAS REALIZADAS -->
                            <td>
                                <label class="filaformulario">DIRECCION</label>
                            </td>
                            <td>
                                <label class="filaCliente"><?php if(isset($_SESSION["direccionCompra"])){echo $_SESSION["direccionCompra"];}else{echo"-------";}?></label>
                            </td>
                        </tr>
                        <tr class="cajaBotonera">  <!-- ZONA DE DATOS PERSONALES PARA MOSTRAR COMPRAS REALIZADAS -->
                            <td>
                                <label class="filaformulario">CORREO</label>
                            </td>
                            <td>
                                <label class="filaCliente"><?php if(isset($_SESSION["correoCompra"])){echo $_SESSION["correoCompra"];}else{echo"-------";}?></label>
                            </td>
                        </tr>  
                    </table>
                    <?php if(isset($_SESSION["despliegue"])){ //CARGA EL COMPENDIO DE COMPRAS?>
                        <div class="elegirMenu">   <!-- NÚMERO DE COMPRAS EJECUTADAS DEL USUARIO -->
                            <div class="menuBoton">
                                <span class="textoBoton">COMPRA 1</span>
                            </div>
                            <ul class="options">
                                <span class="opcionesTexto">
                                    <table>
                                        <tr>
                                            <td>CONCEPTO DE LA COMPRA</td>
                                            <td>DEPARTAMENTO DE COMPRAS</td>
                                            <td>CANTIDAD ADQUIRIDA</td>
                                            <td>COSTE UNITARIO</td>
                                            <td>COSTE TOTAL</td>
                                            <td>FECHA DEL PEDIDO</td>
                                            <td>ESTADO DE ENTREGA</td>
                                        </tr>
                                    </table>
                                </span>
                            </ul>
                        </div>
                        <div class="elegirMenu">   <!-- NÚMERO DE COMPRAS EJECUTADAS DEL USUARIO -->
                            <div class="menuBoton">
                                <span class="textoBoton">COMPRA 2</span>
                            </div>
                            <ul class="options">
                                <span class="opcionesTexto">
                                    <table>
                                        <tr>
                                            <td>CONCEPTO DE LA COMPRA</td>
                                            <td>DEPARTAMENTO DE COMPRAS</td>
                                            <td>CANTIDAD ADQUIRIDA</td>
                                            <td>COSTE UNITARIO</td>
                                            <td>COSTE TOTAL</td>
                                            <td>FECHA DEL PEDIDO</td>
                                            <td>ESTADO DE ENTREGA</td>
                                        </tr>
                                    </table>
                                </span>
                            </ul>
                        </div>
                        <div class="elegirMenu">   <!-- NÚMERO DE COMPRAS EJECUTADAS DEL USUARIO -->
                            <div class="menuBoton">
                                <span class="textoBoton">COMPRA 3</span>
                            </div>
                            <ul class="options">
                                <span class="opcionesTexto">
                                    <table>
                                        <tr>
                                            <td>CONCEPTO DE LA COMPRA</td>
                                            <td>DEPARTAMENTO DE COMPRAS</td>
                                            <td>CANTIDAD ADQUIRIDA</td>
                                            <td>COSTE UNITARIO</td>
                                            <td>COSTE TOTAL</td>
                                            <td>FECHA DEL PEDIDO</td>
                                            <td>ESTADO DE ENTREGA</td>
                                        </tr>
                                    </table>
                                </span>
                            </ul>
                        </div>
                        <div class="elegirMenu">   <!-- NÚMERO DE COMPRAS EJECUTADAS DEL USUARIO -->
                            <div class="menuBoton">
                                <span class="textoBoton">COMPRA 4</span>
                            </div>
                            <ul class="options">
                                <span class="opcionesTexto">
                                    <table>
                                        <tr>
                                            <td>CONCEPTO DE LA COMPRA</td>
                                            <td>DEPARTAMENTO DE COMPRAS</td>
                                            <td>CANTIDAD ADQUIRIDA</td>
                                            <td>COSTE UNITARIO</td>
                                            <td>COSTE TOTAL</td>
                                            <td>FECHA DEL PEDIDO</td>
                                            <td>ESTADO DE ENTREGA</td>
                                        </tr>
                                    </table>
                                </span>
                            </ul>
                        </div>
                        <div class="elegirMenu">   <!-- NÚMERO DE COMPRAS EJECUTADAS DEL USUARIO -->
                            <div class="menuBoton">
                                <span class="textoBoton">COMPRA 5</span>
                            </div>
                            <ul class="options">
                                <span class="opcionesTexto">
                                    <table>
                                        <tr>
                                            <td>CONCEPTO DE LA COMPRA</td>
                                            <td>DEPARTAMENTO DE COMPRAS</td>
                                            <td>CANTIDAD ADQUIRIDA</td>
                                            <td>COSTE UNITARIO</td>
                                            <td>COSTE TOTAL</td>
                                            <td>FECHA DEL PEDIDO</td>
                                            <td>ESTADO DE ENTREGA</td>
                                        </tr>
                                    </table>
                                </span>
                            </ul>
                        </div>
                        <div class="elegirMenu">   <!-- NÚMERO DE COMPRAS EJECUTADAS DEL USUARIO -->
                            <div class="menuBoton">
                                <span class="textoBoton">COMPRA 6</span>
                            </div>
                            <ul class="options">
                                <span class="opcionesTexto">
                                    <table>
                                        <tr>
                                            <td>CONCEPTO DE LA COMPRA</td>
                                            <td>DEPARTAMENTO DE COMPRAS</td>
                                            <td>CANTIDAD ADQUIRIDA</td>
                                            <td>COSTE UNITARIO</td>
                                            <td>COSTE TOTAL</td>
                                            <td>FECHA DEL PEDIDO</td>
                                            <td>ESTADO DE ENTREGA</td>
                                        </tr>
                                    </table>
                                </span>
                            </ul>
                        </div>
                        <div class="elegirMenu">   <!-- NÚMERO DE COMPRAS EJECUTADAS DEL USUARIO -->
                            <div class="menuBoton">
                                <span class="textoBoton">COMPRA 7</span>
                            </div>
                            <ul class="options">
                                <span class="opcionesTexto">
                                    <table>
                                        <tr>
                                            <td>CONCEPTO DE LA COMPRA</td>
                                            <td>DEPARTAMENTO DE COMPRAS</td>
                                            <td>CANTIDAD ADQUIRIDA</td>
                                            <td>COSTE UNITARIO</td>
                                            <td>COSTE TOTAL</td>
                                            <td>FECHA DEL PEDIDO</td>
                                            <td>ESTADO DE ENTREGA</td>
                                        </tr>
                                    </table>
                                </span>
                            </ul>
                        </div>
                        <script>cargaModelo(7);</script>
                    <?php } ?>


                    <div class="accionamientos">
                            <input type="submit" class="boton" name="cargar" value="CARGAR COMPRAS">
                            <input type="submit" class="boton" name="volver" value="VOLVER">
                    </div>       
                </div>
            </form>
        </div>
        <div class="VaciobotonesPrincipal"></div>
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
    <script>letreroConfirmado(<?php echo $_SESSION["activadorPersonal"]; ?>);</script>
	<?php 
        function cambiaFranjaHoraria()
        {
            if(date("G")>=7 && date("G")<13)  //Por la mañana
            {
                echo "Buenos Días, ".date("D d-M-Y H:i:s");
            }
            if(date("G")>=13 && date("G")<21)  //Por la tarde
            {
                echo "Buenas Tardes, ".date("D d-M-Y H:i:s");
            }
            if(date("G")>=21 || date("G")<7)  //Por la noche
            {
                echo "Buenas Noches, ".date("D d-M-Y H:i:s");
            }
        }
        $_SESSION["letreroCompras"]=0; //Reiniciar variable
        unset($_SESSION["despliegue"]);  //Destrue la variable para que no se quede la lista de compra cargada
        $_SESSION["activadorPersonal"]=0; //Reinicio de la variable del letrero
    ?> 
</body>
</html>