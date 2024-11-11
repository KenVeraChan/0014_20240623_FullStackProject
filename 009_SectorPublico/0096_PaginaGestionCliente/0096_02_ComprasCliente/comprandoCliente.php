<?php
//INICIA LA SESION DE ENTRADA
session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                    //También permite rescatar la información almancenada en la variable superglobal $_SESSION
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area de Compras Realizadas Cliente</title>
    <link rel="stylesheet" href="comprandoCliente.css">
    <script src="scriptComprandoCliente.js"></script>
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
            <form action="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_02_ComprasCliente/consultasComprandoCliente.php" method="POST" enctype="multipart/form-data">
                <div class="cuadro">
                    <table id="tabla">
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">NOMBRE:</label>
                                <input type="text" class="filaNombre" name="nombre">
                            </td>
                        </tr>
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">CONTRASENIA:</label>
                                <input type="password" minlength="9" maxlength="30" class="filaNombre" name="contrasenia">  <!-- Solo se pueden añadir 9 digitos comprendidos entre 0 y 9 -->
                            </td>
                        </tr>
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">CONFIRMAR CONTRASENIA:</label>
                                <input type="password" minlength="9" maxlength="30" class="filaNombre" name="contraseniaagain">  <!-- Solo se pueden añadir 9 digitos comprendidos entre 0 y 9 -->
                            </td>
                        </tr>
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">TELÉFONO:</label>
                                <input type="tel" minlength="9" maxlength="9" class="filaNombre" name="telefono">  <!-- Solo se pueden añadir 9 digitos comprendidos entre 0 y 9 -->
                            </td>
                        </tr>
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">DIRECCIÓN:</label>
                                <input type="text" class="filaNombre" name="direccion">
                            </td>
                        </tr>
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">ENTIDAD:</label>
                                <select type="text" class="filaNombre" name="entidad">
                                    <option></option>
                                    <option>PARTICULAR</option>
                                    <option>EMPRESA</option>
                                    <option>ASOCIADO</option>
                                    <option>CASUAL</option>
                                    <option>AUTÓNOMO</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">CORREO:</label>
                                <input type="email" class="filaNombre" name="correo" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">  <!--Con el pattern obliga a que sea un correo legible -->
                            </td>
                        </tr>             
                    </table>
                    <div class="accionamientos">
                            <input type="submit" class="boton" name="registrar" value="DARSE DE ALTA">
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
        $_SESSION["activadorPersonal"]=0; //Reiniciar variable
        $_SESSION["detectadaEntrada"]=0;  //Reiniciar la variable para que no cargue siempre la misma
    ?> 
</body>
</html>