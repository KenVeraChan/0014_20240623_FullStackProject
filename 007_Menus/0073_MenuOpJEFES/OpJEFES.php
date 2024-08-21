<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        if(!isset($_SESSION["usuario"]))
        {
            //Si es falso que no se ha registrado nada en la sesion
            header("Location:../../005_Login/0051_LoginRRHH/loginRRHH.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Operaciones de RRHH</title>
    <link rel="stylesheet" href="OpJEFES.css">
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
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href=''">PEDIDOS CLIENTES</button></td>
                </tr>
                <tr class="cajaBotonera">
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href='../../008_ObjetivosEmpresa/0082_CreacionObjetivos/CreacionTareas.php'">CONTROL TAREAS</button></td>
                </tr>                
                <tr class="cajaBotonera">    
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href=''">------</button></td>
                </tr>
                <tr class="cajaBotonera">    
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href=''">------</button></td>
                </tr>
                <tr class="cajaBotonera">   
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href=''">------</button></td>
                </tr>   
                <tr class="cajaBotonera">   
                    <td><button class="bloque_opciones" style="color: white" onclick="location.href=''">------</button></td>
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
</body>
</html>