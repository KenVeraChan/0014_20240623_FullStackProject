<?php
    //INICIA LA SESION DE ENTRADA
    session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                        //También permite rescatar la información almancenada en la variable superglobal $_SESSION
    if(!isset($_SESSION["usuario"]))
    {
        //Si es falso que no se ha registrado nada en la sesion
        header("Location:../005_Login/login.php");
    }
    //JSON: JavaScript Object Notation
    $LECTURA=json_decode($_SESSION["L"],true); //Para descarga como una matriz asociativa
    $ESCRITURA=json_decode($_SESSION["E"],true); //Para descarga como una matriz asociativa
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Empleados</title>
    <link rel="stylesheet" href="actualizacionCSS-TABLAUPDATE.css">
    <script src="actualizacionJS-TABLAUPDATE.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../007_MenuPrincipal/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
    <div id="areaSesion">
        <table style="width:100%">
            <tr>
                    <div id="bienvenido"><strong><?php echo"Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
                    <a href="../005_Login/salidaPagina.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
            </tr>
        </table>
    </div>        
        <div class="VaciobotonesPrincipal"></div>
        <table id="tabla">
            <tr class="cajaBotonera">
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(0, 228, 228)" onclick="location.href='../001_Busqueda/busquedaPHP.php'">BUSCAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(0, 228, 228)" onclick="location.href='../002_Inserccion/inserccionPHP.php'"> RECLUTAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(0, 228, 228)" onclick="location.href='../003_Actualizacion/actualizacionPHP.php'"> CONFIGURAR CANDIDATO</button>
                </td>
            </tr>
            <tr class="cajaBotonera">    
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(0, 228, 228)" onclick="location.href='../004_Eliminacion/eliminacionPHP.php'"> DESESTIMAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(0, 228, 228)" onclick="muestraTablaPaginada()"> CONTRATACION OFICIAL</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(0, 228, 228)"> VOLVER</button>
                </td>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>  
    <div class="consulta" style="background-image: url(../000_ConsultaContactos/images/DIGITALIZACION.jpg); background-repeat: no-repeat; background-size:cover">
        <?php
            echo "<br>";
            echo "<div id='capsula'>";
            echo "<table class='tablaContenidos'>";
            echo "<tr class='filaActual' style='background-color:rgba(0, 0, 19, 0.89);
                             font-size: medium;
                             color: rgb(0,230,230)'>
                    <td class='huno'><strong>ID</strong></td>
                    <td class='huno'><strong>NOMBRE</strong></td>
                    <td class='huno'><strong>APELLIDOS</strong></td>
                    <td class='huno'><strong>DIRECCIÓN</strong></td>
                    <td class='huno'><strong>POBLACIÓN</strong></td>
                    <td class='huno'><strong>PROFESIÓN</strong></td>
                    <td class='huno'><strong>AHORROS</strong></td>
                  </tr>";
            //Se va rellenando la tabla espontáneamente segun los registros encontrados en la BBDD
            echo "<tr class='filaActual' style='background-color:rgba(0, 0, 19, 0.89)'>
                    <td class='uno' onmouseenter='prueba()'>".$LECTURA["RegID"]."</td>
                    <td class='uno' onmouseenter='prueba()'>".$LECTURA["RegNombre"]."</td>
                    <td class='uno' onmouseenter='prueba()'>".$LECTURA["RegApellidos"]."</td>
                    <td class='uno' onmouseenter='prueba()'>".$LECTURA["RegDireccion"]."</td>
                    <td class='uno' onmouseenter='prueba()'>".$LECTURA["RegPoblacion"]."</td>
                    <td class='uno' onmouseenter='prueba()'>".$LECTURA["RegProfesion"]."</td>
                    <td class='uno' onmouseenter='prueba()'>".$LECTURA["RegAhorros"]."</td>
                  </tr>";
            echo "<tr class='filaActual' style='background-color:rgba(0, 0, 19, 0.89)'>
                    <td class='uno' onmouseenter='prueba()'>".$LECTURA["RegID"]."</td>
                    <td class='uno' onmouseenter='prueba()'>".$ESCRITURA["RegNombre"]."</td>
                    <td class='uno' onmouseenter='prueba()'>".$ESCRITURA["RegApellidos"]."</td>
                    <td class='uno' onmouseenter='prueba()'>".$ESCRITURA["RegDireccion"]."</td>
                    <td class='uno' onmouseenter='prueba()'>".$ESCRITURA["RegPoblacion"]."</td>
                    <td class='uno' onmouseenter='prueba()'>".$ESCRITURA["RegProfesion"]."</td>
                    <td class='uno' onmouseenter='prueba()'>".$ESCRITURA["RegAhorros"]."</td>
                    </tr>";
        echo "</table></div>" 
        ?>
        <form action="../003_Actualizacion/actualizacionPHP-Actualizado.php" method="GET">
            <input type="submit" class="botones" name="modificar" value="MODIFICAR">
        </form>
    </div>
    <script>
        function tablaColor()
        {
            var cambia=document.getElementsByClassName("consulta")
            cambia[0].addEventListener("mouseenter",function(){
                cambia[0].style.transitionDuration = "0.5s";
                cambia[0].style.backgroundColor="yellow";
            })
            cambia[0].addEventListener("mouseleave",function(){
                cambia[0].style.transitionDuration = "0.5s";
                cambia[0].style.backgroundColor="white";
            })        
        }
    </script>
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