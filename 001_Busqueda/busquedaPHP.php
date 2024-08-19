<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        if(!isset($_SESSION["usuario"]))
        {
            //Si es falso que no se ha registrado nada en la sesion
            header("Location:../005_Login/0051_LoginRRHH/loginRRHH.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Empleados</title>
    <link rel="stylesheet" href="busquedaCSS.css">
    <script src="busquedaJS.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../001_Busqueda/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
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
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)" onclick="location.href='../000_ConsultaContactos/ConsultaContactos.php'"> MOSTRAR BBDD</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color:rgba(230, 230, 11, 0.719)" onclick="location.href='../008_ObjetivosEmpresa/tareasPendientes.php'">TAREAS PENDIENTES</button>
                </td>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>
    <div class="consulta">
    <!-- BUSQUEDAS TABLA 1 -->
        <form class="tablaAcciones" action="../005_Login/consultasPreparadas.php" method="get">
           <p class="separacion"></p>
           <label class="celda">ID CONTACTO:<input type="text" class="celdas" name="id"></label> <!--ID-->
           <p class="separacion"></p>
           <label class="celda">NOMBRE:<input type="text" class="celdas" name="nom"></label> <!--NOMBRE-->
           <p class="separacion"></p>
           <label class="celda">APELLIDOS:<input type="text" class="celdas" name="ape"></label> <!--APELLIDOS-->
           <p class="separacion"></p>
           <label class="celda">DIRECCIÓN:<input type="text" class="celdas" name="dir"></label> <!--DIRECCION-->
           <p class="separacion"></p>
           <label class="celda">POBLADO:
                <select name="pob" class="desplegable">
                    <option></option>
                    <option>Barcelona</option>
                    <option>Girona</option>
                    <option>Lleida</option>
                    <option>Madrid</option>
                    <option>Northwith</option>
                    <option>Tarragona</option>
                    <option>Valencia</option>
                    <option>Zaragoza</option>
                </select>
            </label> <!--POBLADO-->
            <p class="separacion"></p>
           <label class="celda">PROFESIÓN:
           <select name="prof" class="desplegable">
                    <option></option>
                    <option>Abogado/a</option>
                    <option>Administrativo/a</option>
                    <option>Arquitecto/a</option>
                    <option>Asesor/a fiscal</option>
                    <option>Camarero/a</option>
                    <option>Comercial</option>
                    <option>Conductor/a</option>
                    <option>Contable</option>
                    <option>Delineante</option>
                    <option>Dependiente</option>
                    <option>Diseñador/a</option>
                    <option>Enfermero/a</option>
                    <option>Estudiante</option>
                    <option>Funcionario/a</option>
                    <option>Ingeniera Software</option>
                    <option>Oficial</option>
                    <option>Profesor/a</option>
                    <option>Recepcionista</option>
                    <option>Representante</option>
                    <option>Taxista</option>
                    <option>NULL</option>
                </select>
           </label> <!--PROFESION-->
           <p class="separacion"></p>
           <label class="celda">SALAR. ANT.:
                <select name="aho" class="desplegable">
                    <option></option>
                    <option>Menos de 1.000</option>
                    <option>De 1.000 a 25.000</option>
                    <option>De 25.000 a 50.000</option>
                    <option>De 50.000 a 75.000</option>
                    <option>De 75.000 a 100.000</option>
                    <option>De 100.000 a 125.000</option>
                    <option>Mas de 125.000</option>
                </select>
           </label> <!--AHORROS-->
           <p class="separacion"></p>
           <label class="celda">ELEGIR:   
                <select name="eleccion" class="desplegable" onchange="opciones()">
                    <option class="opciones">1 - Buscar por ID</option>
                    <option class="opciones">2 - Buscar por NOMBRE</option>
                    <option class="opciones">3 - Buscar por APELLIDOS</option>
                    <option class="opciones">4 - Buscar por POBLADO</option>
                    <option class="opciones">5 - Buscar por PROFESIÓN</option>
                    <option class="opciones">6 - Buscar por AHORROS</option>
                </select>
            </label> <!--ELECCION-->
            <p class="separacion"></p> 
           <input type="submit" value="BUSCAR" name="busqueda" class="boton"> <!--AHORROS-->
        </form>
        <img id="imagenPortada" src="../001_Busqueda/images/SERVIDOR.jpg" alt="Imagen servidor">
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
        document.addEventListener('DOMContentLoaded', desplaza());
    </script>
</body>
</html>