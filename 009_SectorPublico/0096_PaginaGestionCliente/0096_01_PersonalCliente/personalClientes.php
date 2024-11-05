<?php
//INICIA LA SESION DE ENTRADA
session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                    //También permite rescatar la información almancenada en la variable superglobal $_SESSION
if(!isset($_SESSION["usuario"]))
{
    //Si es falso que no se ha registrado nada en la sesion
    header("Location:../../../005_Login/0053_LoginCLIENTES/loginCLIENTES.php");
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
        <div id="iconoAdorno"><img src="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
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
            <td class="celdaCompra" colspan="2">AREA DEL CLIENTE</td>
            <td class="celdaCompra" colspan="5"> 
                <?php cambiaFranjaHoraria(); //Carga la franja horaria del día en la que se ha consultado la página web ?>
            </td>
        </tr>
    </table>
    </header>
                    
        <?php if(date("G")>=7 && date("G")<13){  //POR LA MAÑANA: CARGA FOTO DE POR LA MAÑANA?>
        <div class="cajaPortadora" style="background-image: url('../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/images/CLIENTESDIA.png')">
        <?php } ?>
        <?php if(date("G")>=13 && date("G")<21){  //POR LA TARDE: CARGA FOTO DE POR LA TARDE?>
        <div class="cajaPortadora" style="background-image: url('../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/images/CLIENTESTARDE.png')">
        <?php } ?>
        <?php if(date("G")>=21 || date("G")<7){  //POR LA NOCHE: CARGA FOTO DE POR LA NOCHE?>
        <div class="cajaPortadora" style="background-image: url('../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/images/CLIENTESNOCHE.png')">
        <?php } ?>
            <form action="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/consultasPersonalCliente.php" method="POST" enctype="multipart/form-data">
                <div class="cuadro">
                    <table id="tabla">
                        <tr class="cajaBotonera">
                            <td>
                                <div class="filaNombre"><img class="fotoPerfil" src="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/images/imagenesCliente/<?php if(isset($_SESSION["fotoPersonal"])){echo $_SESSION["fotoPersonal"];}else{echo "PERFIL.png";}?>"></div>
                            </td>
                        </tr>
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">NOMBRE:</label>
                                <input type="text" class="filaNombre" value="<?php if(isset($_SESSION["nombrePersonal"])){echo $_SESSION["nombrePersonal"];}else{echo $_SESSION["usuario"];}?>" name="nombre">
                            </td>
                        </tr>
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">TELÉFONO:</label>
                                <input type="tel" minlength="9" maxlength="9" class="filaNombre" value="<?php if(isset($_SESSION["telefonoPersonal"])){echo $_SESSION["telefonoPersonal"];}else{echo "";}?>" name="telefono">  <!-- Solo se pueden añadir 9 digitos comprendidos entre 0 y 9 -->
                            </td>
                        </tr>
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">DIRECCIÓN:</label>
                                <input type="text" class="filaNombre" value="<?php if(isset($_SESSION["direccionPersonal"])){echo $_SESSION["direccionPersonal"];}else{echo "";}?>" name="direccion">
                            </td>
                        </tr>
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">ENTIDAD:</label>
                                <select type="text" class="filaNombre" name="entidad">
                                    <option><?php if(isset($_SESSION["entidadPersonal"])){echo $_SESSION["entidadPersonal"];}else{echo "";}?></option>
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
                                <label class="filaformulario">TARJETA DE CRÉDITO:</label>
                                <input type="submit" class="filaNombre" name="creditcard" value="ACCEDE A TU TARJETA DE COMPRAS" title="Modificar datos de su tarjeta asociada a Sfer4D Corporation">
                            </td>
                        </tr>
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">CORREO:</label>
                                <input type="email" class="filaNombre" value="<?php if(isset($_SESSION["correoPersonal"])){echo $_SESSION["correoPersonal"];}else{echo "";}?>" name="correo" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">  <!--Con el pattern obliga a que sea un correo legible -->
                            </td>
                        </tr> 
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">NÚMERO DE COMPRAS:</label>
                                <input type="number" min="0" max="100" class="filaNombre" value="<?php if(isset($_SESSION["numeroCompras"])){echo $_SESSION["numeroCompras"];}else{echo "";}?>" name="numCompras">
                            </td>
                        </tr>
                        <tr class="cajaBotonera">
                            <td>
                                <label class="filaformulario">SUBIR Y CAMBIAR FOTO:</label>
                                <input type="file" class="filaNombreFoto" name="imagenfile" style="
                                        float:left;
                                        margin-top: 30px;
                                        background-color: white;
                                        z-index: 1; 
                                ">
                            </td>
                        </tr>               
                    </table>
                    <div class="accionamientos">
                            <input type="submit" class="boton" name="cargar" value="CARGAR">
                            <input type="submit" class="boton" name="actualizar" value="ACTUALIZAR">
                            <input type="submit" class="boton" name="eliminar" value="DARSE DE BAJA" formaction="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/consultasPersonalCliente.php?usuario=<?php echo $_SESSION["usuario"];?>"]">
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
    ?> 
</body>
</html>