<?php
    //INICIA LA SESION DE ENTRADA
    session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                    //También permite rescatar la información almancenada en la variable superglobal $_SESSION
    //AL ESTAR YA REGISTRADO COMO CLIENTE DENTRO DEL MENU DE CLIENTES SE ACTIVA EL LOGEO DE CLIENTE PARA LUEGO DETECTARLO EN LA SALIDA PAGINA
    $_SESSION["loginJEFES"]=0;  //Se corrobora que el sector de JEFES no es donde se intenta ENTRAR en el LOGIN
    $_SESSION["loginRRHH"]=0;   //Se identifica que no ha sido un individuo del sector de RRHH
    $_SESSION["loginCLIENTES"]=1;   //Se identifica que SI ha sido un individuo del sector de CLIENTES
    if(!isset($_SESSION["usuario"]))
    {
        //Si es falso que no se ha registrado nada en la sesion
        header("Location:../../005_Login/0053_LoginCLIENTES/loginCLIENTES.php");
    }
    require "../../005_Login/cierreSesionesCookie.php";   //Gestion de cierres de sesion tras consumirse la COOKIE
    $rutaPaginaOpClientes="location:../../005_Login/";   //Se pone la ruta desde la página Opciones Cliente
    cargaWebCookie($rutaPaginaOpClientes);   //Se ejecuta la función de carga página según cookie desde la página Opciones Cliente
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Operaciones del Cliente</title>
    <link rel="stylesheet" href="OpCLIENTES.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!-- CARGA LA JQUERY PARA EL JS CIERRE SESSION-->
    <script src="../../005_Login/scriptCierreSesion.js"></script>  <!-- carga del fichero desde LOGIN -->
    <script src="OpCLIENTES.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../007_Menus/0074_MenuOpCLIENTES/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
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
                ?>
            </td>
        </tr>
    </table>
    </header>
        <?php if(date("G")>=7 && date("G")<13){  //POR LA MAÑANA: CARGA FOTO DE POR LA MAÑANA?>
        <div class="cajaPortadora" style="background-image: url('../../007_Menus/0074_MenuOpCLIENTES/images/CLIENTESDIA.png')">
        <?php } ?>
        <?php if(date("G")>=13 && date("G")<21){  //POR LA TARDE: CARGA FOTO DE POR LA TARDE?>
        <div class="cajaPortadora" style="background-image: url('../../007_Menus/0074_MenuOpCLIENTES/images/CLIENTESTARDE.png')">
        <?php } ?>
        <?php if(date("G")>=21 || date("G")<7){  //POR LA NOCHE: CARGA FOTO DE POR LA NOCHE?>
        <div class="cajaPortadora" style="background-image: url('../../007_Menus/0074_MenuOpCLIENTES/images/CLIENTESNOCHE.png')">
        <?php } ?>
            <table id="tabla">
                <tr class="cajaBotonera">
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href='../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/personalClientes.php'">AREA DE DATOS PERSONALES</button></td>
                </tr>
                <tr class="cajaBotonera">
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href='../../009_SectorPublico/0096_PaginaGestionCliente/0096_02_ComprasCliente/comprandoCliente.php'">COMPRAS REALIZADAS</button></td>
                </tr>    
                <tr class="cajaBotonera">
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href='../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php'">VOLVER A LA PÁGINA PRINCIPAL</button></td>  
                </tr>               
            </table>
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
    <script>AddAlert(<?php echo $_SESSION["logeando"]?>,2); //Para el comienzo de la deteccion de la inactividad en la pagina web pero no afecta sin usuario logeado de cualquier tipo</script>
</body>
</html>