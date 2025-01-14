<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        if(!isset($_SESSION["usuario"]))
        {
            //Si es falso que no se ha registrado nada en la sesion
            header("Location:../../../005_Login/0052_LoginJEFES/loginJEFES.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area de asignación departamental</title>
    <link rel="stylesheet" href="asignandoDepartamentos.css">
    <script src="asignandoDepartamentos.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal"> 
        <table id="tablaBotones">
            <tr class="filaBoton">
                <td>
                    <div id="eleccionesJEFE" onclick="location.href='../../005_Login/0052_LoginJEFES/loginJEFES.php'">JEFES</div>
                </td>
                <td>
                    <div id="eleccionesRRHH" onclick="location.href='../../005_Login/0051_LoginRRHH/loginRRHH.php'">RR.HH.</div>
                </td>
                <td>
                    <div id="eleccionesEMPLEADO" onclick="location.href='../../005_Login/0051_LoginRRHH/loginRRHH.php'">EMPLEADOS</div>
                </td>
            </tr>
        </table>
        <div id="iconoAdorno"><img class="imagenIcono" src="../../../008_ObjetivosEmpresa/0082_CreacionObjetivos/0082_01_AsignacionDepartamental/images/Sfer4D-IconoEmpresa.jpg" alt="iconoEmpresa"></div>     
        <div class="VaciobotonesPrincipal"></div>
        <img id="imagenPortada" src="../../../008_ObjetivosEmpresa/0082_CreacionObjetivos/0082_01_AsignacionDepartamental/images/DEPARTAMENTOS.png" alt="Imagen departamentos">    
    </header>
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