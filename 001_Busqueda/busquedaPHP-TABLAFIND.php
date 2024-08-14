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
    <title>Búsqueda de Empleados</title>
    <link rel="stylesheet" href="busquedaCSS-TABLAFIND.css">
    <script src="busquedaJS-TABLAFIND.js"></script>
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
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)" onclick="location.href='../001_Busqueda/busquedaPHP.php'">BUSCAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)" onclick="location.href='../002_Inserccion/inserccionPHP.php'"> RECLUTAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)" onclick="location.href='../003_Actualizacion/actualizacionPHP.php'"> CONFIGURAR CANDIDATO</button>
                </td>
            </tr>
            <tr class="cajaBotonera">    
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)" onclick="location.href='../004_Eliminacion/eliminacionPHP.php'"> DESESTIMAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)" onclick="location.href='../000_ConsultaContactos/ConsultaContactos.php'"> CONTRATACION OFICIAL</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)"> VOLVER</button>
                </td>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header> 
    <div class="consulta" style="background-image: url(../000_ConsultaContactos/images/DIGITALIZACION.jpg); background-repeat: no-repeat; background-size:cover">
        <?php
            echo "<br>";
            echo "<div id='capsula'>";
            echo "<table class='tablaContenidos' style='margin-top: 60px; 
                                width:80%; 
                                margin-left: 10%;'>";
            echo "<tr style='background-color:rgba(0, 0, 19, 0.89);
                             font-size: medium;
                             color: yellow'>
                    <td><strong>ID</strong></td>
                    <td><strong>NOMBRE</strong></td>
                    <td><strong>APELLIDOS</strong></td>
                    <td><strong>DIRECCIÓN</strong></td>
                    <td><strong>POBLACIÓN</strong></td>
                    <td><strong>PROFESIÓN</strong></td>
                    <td><strong>AHORROS</strong></td>
                  </tr>";
            //Se cuentan las filas antes de comenzar a exponer la tabla
                $matriz=$_SESSION["matrizEmpleados"];
                function contarFilas($matriz){
                
                $cantidad = 0;
                
                foreach($matriz as $elemento){
                    $cantidad ++;
                }
                
                return $cantidad;
                }
                $fila=contarFilas( $matriz);
            //Se va rellenando la tabla espontáneamente segun los registros encontrados en la BBDD
            for ($i=0;$i<$fila;$i++)
            {
                echo "<tr>";
                for($j=0;$j<7;$j++)
                {
                    if(isset($_SESSION["matrizEmpleados"][$i][$j]))
                    {
                        echo "<td class='uno' style='background-color:rgba(0, 0, 19, 0.89);
                                                     font-size: medium;
                                                     color: rgba(230, 230, 11, 0.719);'
                                              onmouseenter='prueba()';
                                              '>".$_SESSION["matrizEmpleados"][$i][$j]."</td>";
                    }
                }
                echo "</tr>";
                $j=0; //Reinicio de la variable siguiente fila
            }
        echo "</table></div>" 
        ?>
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