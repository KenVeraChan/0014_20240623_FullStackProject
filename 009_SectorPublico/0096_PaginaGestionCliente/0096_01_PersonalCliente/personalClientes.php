<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        if(!isset($_SESSION["usuario"]))
        {
            //Si es falso que no se ha registrado nada en la sesion
            header("Location:../../005_Login/0053_LoginCLIENTES/loginCLIENTES.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Personal Cliente</title>
    <link rel="stylesheet" href="personalClientes.css">
    <script src="scriptsPersonalCliente.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
    <div id="areaSesion">
        <table style="width:100%">
            <tr>
                <div id="bienvenido"><strong><?php echo"Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
                <a href="../../005_Login/salidaPagina.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
            </tr>
        </table>
    </div>        
    <div class="VaciobotonesPrincipal"></div>
    <table class="seccionPrincipal">   <!-- PRIMERA BANDA COMO MOSTRADOR DE VENTAS -->
        <tr class="filaCompra" style="height:10px">
            <td class="celdaCompra" colspan="2">AREA DEL CLIENTE</td>
            <td class="celdaCompra" colspan="5"> 
                <?php 
                    if(date("G")>=7 && date("G")<13)  //Por la mañana
                    {
                        echo "Buenos DÍAS, ".date("D d-M-Y H:i:s");
                    }
                    if(date("G")>=13 && date("G")<21)  //Por la tarde
                    {
                        echo "Buenas TARDES, ".date("D d-M-Y H:i:s");
                    }
                    if(date("G")>=21 || date("G")<7)  //Por la noche
                    {
                        echo "Buenas NOCHES, ".date("D d-M-Y H:i:s");
                    }
                ?>
            </td>
        </tr>
    </table>
    </header>
                    
        <?php if(date("G")>=7 && date("G")<13){  //POR LA MAÑANA: CARGA FOTO DE POR LA MAÑANA?>
        <div class="cajaPortadora" style="background-image: url('../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/images/CLIENTESDIA.png')">
            <div class="cuadro">
                <table id="tabla">
                    <tr class="cajaBotonera">
                        <td>
                            <div class="filaNombre"><img class="fotoPerfil" src="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/images/juan.jpg"></div>
                        </td>
                    </tr>
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">NOMBRE:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr>
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">TELÉFONO:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr>
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">DIRECCIÓN:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr>
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">ENTIDAD:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr>
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">TARJETA DE CRÉDITO:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr>
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">CORREO:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr> 
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">NÚMERO DE COMPRAS:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr>               
                </table>
                <div class="accionamientos">
                        <input type="submit" class="boton" name="cargar" value="CARGAR">
                        <input type="submit" class="boton" name="actualizar" value="ACTUALIZAR">
                        <input type="submit" class="boton" name="volver" value="VOLVER">
                </div>       
            </div>
        </div>
        <?php } ?>
        <?php if(date("G")>=13 && date("G")<21){  //POR LA TARDE: CARGA FOTO DE POR LA TARDE?>
        <div class="cajaPortadora" style="background-image: url('../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/images/CLIENTESTARDE.png')">
        <div class="cuadro">
                <table id="tabla">
                    <tr class="cajaBotonera">
                        <td>
                            <div class="filaNombre"><img class="fotoPerfil" src="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/images/juan.jpg"></div>
                        </td>
                    </tr>
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">NOMBRE:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr>
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">TELÉFONO:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr>
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">DIRECCIÓN:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr>
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">ENTIDAD:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr>
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">TARJETA DE CRÉDITO:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr>
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">CORREO:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr> 
                    <tr class="cajaBotonera">
                        <td>
                            <label class="filaformulario">NÚMERO DE COMPRAS:</label>
                            <input type="text" class="filaNombre">
                        </td>
                    </tr>               
                </table>
                <div class="accionamientos">
                        <input type="submit" class="boton" name="cargar" value="CARGAR">
                        <input type="submit" class="boton" name="actualizar" value="ACTUALIZAR">
                        <input type="submit" class="boton" name="volver" value="VOLVER">
                </div>       
            </div>
        </div>
        <?php } ?>
        <?php if(date("G")>=21 || date("G")<7){  //POR LA NOCHE: CARGA FOTO DE POR LA NOCHE?>
        <div class="cajaPortadora" style="background-image: url('../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/images/CLIENTESNOCHE.png')">
            <table id="tabla">
                <tr class="cajaBotonera">
                    <td></td>
                </tr>
                <tr class="cajaBotonera">
                    <td></td>
                </tr>    
                <tr class="cajaBotonera">
                    <td></td>
                </tr>               
            </table>
        </div>
        <?php } ?>
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
</body>
</html>