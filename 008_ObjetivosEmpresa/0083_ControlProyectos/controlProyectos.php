<?php
    //INICIA LA SESION DE ENTRADA
    session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                        //También permite rescatar la información almancenada en la variable superglobal $_SESSION
    if(!isset($_SESSION["usuario"]))
    {
        //Si es falso que no se ha registrado nada en la sesion
        header("Location:../../005_Login/0052_LoginJEFES/loginJEFES.php");
    }
    require "gestionProyectos.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creando Tareas</title>
    <link rel="stylesheet" href="controlProyectos.css">
    <script src="controlProyectos.js"></script>
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
        <div id="iconoAdorno"><img src="../../008_ObjetivosEmpresa/0083_ControlProyectos/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
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
    <div class="consulta">
        <div class="tableroDiagrama" style="position:absolute">
            <table id="lineaTiempo">
                <tr>
                    <td style="width:40px; height:10px; background-color:red">TAREAS</td>
                    <?php for($i=0;$i<31;$i++): ?>
                        <td style="margin-left:0px; width:30px; height:10px; background-color:aqua"><strong><?php echo(date('d-m-Y',strtotime('+'.$i.'day',strtotime($_SESSION["fechaInicio"]))));?></strong></td>
                    <?php endfor; ?>
                </tr>
                <tr>
                    <td>T1<?php echo(date('d-m-Y',strtotime($_SESSION["fechaFin"])));?></td>
                </tr>
                <tr>
                    <td>T2</td>
                </tr>
            </table>
        </div>
        <img id="imagenPortada" src="../../008_ObjetivosEmpresa/0083_ControlProyectos/images/REUNIONES.jpg" alt="Imagen Reuniones">
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
                Asociado: <strong>BioGenTech Corp</strong><br>
                Competidor: <strong>Techeimer Corp</strong><br>
                Inversor: <strong>Medigraria Corporation</strong><br>
                Registro 2024: <strong>Registro C4321</strong>
            </div>
        </footer>
    </div>
    <script>
        if(<?php echo($_SESSION["semaforo"])?>==1)
        {
            letreroConfirmado(1);
        }
        if(<?php echo($_SESSION["semaforo"])?>==2)
        {
            letreroConfirmado(2);
        }
        if(<?php echo($_SESSION["semaforo"])?>==3)
        {
            letreroConfirmado(3);
        }
    </script>
    <?php $_SESSION["semaforo"]=0; //Reiniciar variable ?> 
</body>
</html>