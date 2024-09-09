<?php
session_start();   //Uso de la variable GLOBAL
require "consultasHistoria.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Historia de la Corporación Sfer4D</title>
    <link rel="stylesheet" href="../../009_SectorPublico/0092_PaginaHistoria/paginaHistoria.css">
    <script src="../../009_SectorPublico/0092_PaginaHistoria/scriptsHistoria.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../009_SectorPublico/0092_PaginaHistoria/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>      
        <div class="VaciobotonesPrincipal"></div>
        <table id="tabla">
            <tr class="cajaBotonera">
                    <div class="bloque_opciones" style="color: yellow" onclick="location.href='../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php'">INICIO</div>
                    <div class="bloque_opciones" style="color: yellow" onclick="location.href='../../009_SectorPublico/0092_PaginaHistoria/paginaHistoria.php'">HISTORIA</div>
                    <div class="bloque_opciones" style="color: yellow" onclick="location.href='../../009_SectorPublico/0093_PaginaProductos/paginaProductos.php'">PRODUCTOS</div>
                    <div class="bloque_opciones" style="color: yellow" onclick="location.href='../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php'">SERVICIOS</div>
                    <div class="bloque_opciones" style="color: yellow" onclick="location.href='../../004_Eliminacion/eliminacionPHP.php'">PROYECTOS</div>
                    <div class="bloque_opciones" style="color: yellow" onclick="location.href='../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php'">PRIVADO</div>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>  
    <div class="consulta" style="background-image: url(../../009_SectorPublico/0092_PaginaHistoria/images/HISTORIAEMPRESA.jpg); background-size: 100% 100%;">
        <section id="seccionHistoria">
            <div id="titular">MENU DE FECHAS HISTÓRICAS</div> 
            <nav class="navegacion">
                <ul class="menu">
                    <li><a href="#" class="anios">DÉCADA DE 1970</a>
                        <ul class="decada">  
                            <li><a href="#" class="pulsador" onclick="identificador(0)">Marzo 1972</a></li>         <!--Fundación local de Sfer4D en Voldinthon-->   
                            <li><a href="#" class="pulsador" onclick="identificador(1)">Diciembre 1972</a></li>     <!--proyecto GREENOVATIO-->
                            <li><a href="#" class="pulsador" onclick="identificador(2)">Octubre 1974</a></li>       <!--Estandares Vis4C para competir internacionalmente-->
                            <li><a href="#" class="pulsador" onclick="identificador(3)">Enero 1975</a></li>         <!--Reconocimiento mundial de Sfer4D-->
                            <li><a href="#" class="pulsador" onclick="identificador(4)">Junio 1975</a></li>         <!--Casi caída de beneficios por muchas inversiones-->
                            <li><a href="#" class="pulsador" onclick="identificador(5)">Septiembre 1975</a></li>    <!--Nueva sede en Shunay-->
                        </ul>
                    </li>
                    <li><a href="#" class="anios">DÉCADA DE 1980</a>
                        <ul class="decada">
                            <li><a href="#" class="pulsador" onclick="identificador(6)">Agosto 1980</a></li>        <!--Contratos vinculantes con BioGenTech-->
                            <li><a href="#" class="pulsador" onclick="identificador(7)">Septiembre 1980</a></li>    <!--Ampliación subterranea profunda de la sede en Shunay-->
                            <li><a href="#" class="pulsador" onclick="identificador(8)">Octubre 1980</a></li>       <!--Primera inteligencia artificial del mundo únicamente para uso empresarial propia-->
                            <li><a href="#" class="pulsador" onclick="identificador(9)">Diciembre 1980</a></li>     <!--Diseño de dispositivos para los mapeos tridimensionales holográficos destinados a la construcción-->
                            <li><a href="#" class="pulsador" onclick="identificador(10)">Febrero 1981</a></li>       <!--Sfer4D interviene en el campo de la ingeniería de caminos para estructuras férreas abandonadas en SkyGital-->
                            <li><a href="#" class="pulsador" onclick="identificador(11)">Octubre 1981</a></li>       <!--Sfer4D diseña su primer procesador atmosférico para habitar las zonas térmicamente hostiles: polos y desiertos-->
                            <li><a href="#" class="pulsador" onclick="identificador(12)">Diciembre 1981</a></li>     <!--Atentado en Sfer4D, los terroristas quisieron hacer creer a la opinión pública que los responsables fueron sus competidores Techeimer-->
                            <li><a href="#" class="pulsador" onclick="identificador(13)">Enero 1982</a></li>         <!--Sfer4D pirde acciones en el mercado internacional por el rechazo tras el atentado del que se creyó que fueron ellos mismos-->
                            <li><a href="#" class="pulsador" onclick="identificador(14)">Marzo 1982</a></li>         <!--Sfer4D queda inmpune de los cargos públicos por el atentado en su sede tras comprobarse el robo de mercancía y pruebas de terceros-->
                            <li><a href="#" class="pulsador" onclick="identificador(15)">Noviembre 1982</a></li>     <!--Sfer4D recupera su honor empresarial tras comprobarse que no fue la corporación quien intentó bombardear la nación de Sky-Gital-->
                            <li><a href="#" class="pulsador" onclick="identificador(16)">Octubre 1983</a></li>       <!--La nación de Shunay concede una financiación a Sfer4D por su implicación internacional de sus productos y por la lealtad con la empresa-->
                            <li><a href="#" class="pulsador" onclick="identificador(17)">Diciembre 1983</a></li>     <!--Sfer4D invierte parte de su economía en un proyecto navideño para prolongar la inocencia de todos los más pequeños en las fechas señaladas-->
                            <li><a href="#" class="pulsador" onclick="identificador(18)">Abril 1984</a></li>         <!--Sfer4D interviene en la tercera fase del proyecto Greenovatio: generacion en masa de alimentos primarios desde las areas de bajas temperaturas-->         
                        </ul>
                    </li>
                    <li><a href="#" class="anios">DÉCADA DE 1990</a>
                        <ul class="decada">
                            <li><a href="#" class="pulsador" onclick="identificador(19)">Julio 1998</a></li>         <!--Sfer4D se implica en el desarrollo de la industria del androide para reducir los riesgos para la salud de la manipulación de ácidos biomoleculares diseñados en la planta -12-->
                            <li><a href="#" class="pulsador" onclick="identificador(20)">Diciembre 1998</a></li>     <!--Sfer4D alcanza su mayor auge en la nanotecnología destinado para usos sanitarios-->     
                        </ul>
                    </li>
                    <li><a href="#" class="anios">DÉCADA DE 2000</a>
                        <ul class="decada">
                            <li><a href="#" class="pulsador" onclick="identificador(21)">Diciembre 2000</a></li>     <!--Sfer4D consigue diseñar un fluido con nanotecnología para disolver células inactivas en el cuerpo humano-->
                            <li><a href="#" class="pulsador" onclick="identificador(22)">Febrero 2001</a></li>       <!--Sfer4D mejora el dispositivo mapeador tridimensional con una alcanzabilidad de 2000 m de espacio ocupado-->
                        </ul>
                    </li>
                </ul>
            </nav>  
            <div id="argumentos">
                <div id="fecha">
                    <div id="tiempo"></div>
                </div>
                <div id="contenido">
                    <div id="trama"></div>
                </div>
            </div>            
        </section>
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
</body>
</html>