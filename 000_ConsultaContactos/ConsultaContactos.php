<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        if(!isset($_SESSION["usuario"]))
        {
            //Si es falso que no se ha registrado nada en la sesion
            header("Location:../005_Login/login.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Contactos</title>
    <link rel="stylesheet" href="estilosConsultaConctactos.css">
    <script src="cargaPaginas.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoEmpresa"></div>
        <table id="tabla">
            <tr><td class="VaciobotonesPrincipal"></td></tr>
            <tr id="cajaBotonera">
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)" onclick="location.href='../001_Busqueda/busquedaPHP.php'">BÚSQUEDA PARTICULAR</button>
                </td>

                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)" onclick="location.href='../002_Inserccion/inserccionPHP.php'"> INSERCCIÓN PARTICULAR</button>
                </td>
                
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)" onclick="location.href='../003_Actualizacion/actualizacionPHP.php'"> ACTUALIZACIÓN PARTICULAR</button>
                </td>
                
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)" onclick="location.href='../004_Eliminacion/eliminacionPHP.php'"> ELIMINACIÓN PARTICULAR</button>
                </td>
                
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)" onclick="muestraTablaPaginada()"> CARGA VISTA GENERAL</button>
                </td>
                
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)"> VOLVER</button>
                </td>
            </tr>
            <tr><td class="VaciobotonesPrincipal"></td></tr>
        </table>
    </header>

    <div id="areaSesion">
    <table style="width:100%">
        <tr>
            <td class="accion"></td>
            <td class="accion"> 
                <div id="bienvenido"><strong><?php echo"Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
            </td>
            <td class="accion">
                <a href="../005_Login/salidaPagina.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
            </td>
            <td class="accion"></td>
        </tr>
    </table>
    </div>
    <div class="consulta">
            <img id="imagenPortada" src="../000_ConsultaContactos/images/SERVIDOR.jpg" alt="Imagen servidor">
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
                ----- Asociado -----
                <strong>BioGenTech Corp</strong>
            </div>
            <div class="pie">
                ----- Competidor -----
                <strong>Techeimer Corp</strong>
            </div>
            <div class="pie">
                ----- Inversor -----
                <strong>Medigraria Corp</strong>
            </div>
        </footer>
    </div>
</body>
</html>