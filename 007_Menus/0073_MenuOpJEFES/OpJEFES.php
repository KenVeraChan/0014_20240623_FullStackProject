<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
    
    //También permite rescatar la información almancenada en la variable superglobal $_SESSION
    //AL ESTAR YA REGISTRADO COMO JEFE DENTRO DEL MENU DE JEFE SE ACTIVA EL LOGEO DE JEFE PARA LUEGO DETECTARLO EN LA SALIDA PAGINA
    $_SESSION["loginJEFES"]=1;  //Se corrobora que el sector de JEFES es donde se intenta ENTRAR en el LOGIN
    $_SESSION["loginRRHH"]=0;   //Se identifica que NO ha sido un individuo del sector de RRHH
    $_SESSION["loginCLIENTES"]=0;   //Se identifica que NO ha sido un individuo del sector de CLIENTES
    if(!isset($_SESSION["usuario"]))
    {
        //Si es falso que no se ha registrado nada en la sesion
        header("Location:../../005_Login/0052_LoginJEFES/loginJEFES.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Operaciones de RRHH</title>
    <link rel="stylesheet" href="OpJEFES.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!-- CARGA LA JQUERY PARA EL JS CIERRE SESSION-->
    <script src="../../005_Login/scriptCierreSesion.js"></script>  <!-- carga del fichero desde LOGIN -->
    <script src="OpJEFES.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../007_Menus/0071_MenuOpRRHH/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
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
        <div class="cajaPortadora">
            <table id="tabla">
                <tr class="cajaBotonera">
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href='../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/controlVentasInterfaz.php'">CONTROL DE STOCK</button></td>  <!-- AREA DE REPOSICIÓN DE UNIDADES Y ACTUALIZACIÓN DE DETALLES DE CADA UNIDAD-->
                </tr>
                <tr class="cajaBotonera">
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href='../../008_ObjetivosEmpresa/0082_CreacionObjetivos/CreacionTareas.php'">CONTROL TAREAS Y CANDIDATURAS DEPARTAMENTALES</button></td>
                </tr>   
                <tr class="cajaBotonera">
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href='../../008_ObjetivosEmpresa/0083_ControlProyectos/controlProyectos.php'">CONTROL DE PROYECTOS</button></td>
                </tr>  
                <tr class="cajaBotonera">
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href='../../008_ObjetivosEmpresa/0084_ControldeInterfaz/controldeInterfaz.php'">CONTROL DE LA INTERFAZ</button></td>  <!-- SLIDER IMAGENES DEL SECTOR PÚBLICO Y LAS IMAGENES DE PRODUCTOS Y SERVICIOS -->
                </tr>    
                <tr class="cajaBotonera">
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href='../../008_ObjetivosEmpresa/0085_ControldeVentas/controlVentas.php'">CONTROL DE VENTAS</button></td>  <!-- AREA DE REPOSICIÓN DE UNIDADES Y ACTUALIZACIÓN DE DETALLES DE CADA UNIDAD-->
                </tr>
                <tr class="cajaBotonera">
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href='../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php'">VOLVER A LA PÁGINA PRINCIPAL</button></td>  <!-- AREA DE REPOSICIÓN DE UNIDADES Y ACTUALIZACIÓN DE DETALLES DE CADA UNIDAD-->
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
    <script>
        AddAlert(<?php echo $_SESSION["logeando"]?>,2); 
        //Para el comienzo de la deteccion de la inactividad en la pagina web pero no afecta sin usuario logeado de cualquier tipo
        //Distancia 2 porque es dar dos saltos hasta el directorio raíz
    </script>
</body>
</html>