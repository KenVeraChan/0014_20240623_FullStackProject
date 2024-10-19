<?php
session_start();   //Uso de la variable GLOBAL
include_once "consultasHistoria.php";
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
        <div class="VaciobotonesPrincipal">
            <a href="../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php" class="areaPrivada"><img src="../../009_SectorPublico/0092_PaginaHistoria/images/CANDADO.png" title="Area Privada" alt="Area Privada" width="40px" height="40px"></a>
            <a href="../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php" class="areaPrivada"><img src="../../009_SectorPublico/0092_PaginaHistoria/images/COMPRAS.png" title="Ver Carrito de Compra" alt="Ver Carrito de Compra" width="40px" height="40px"></a>
        </div>        
        <table id="tabla">
            <tr class="cajaBotonera">
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(1);?>'">INICIO</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(2);?>'">HISTORIA</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(3);?>'">PRODUCTOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(4);?>'">SERVICIOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(5);?>'">PROYECTOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(6);?>'">CLIENTES</div>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>  
    <div class="consulta" style="background-image: url(../../009_SectorPublico/0092_PaginaHistoria/images/HISTORIAEMPRESA.jpg); background-size: 100% 100%;">
        <section id="seccionHistoria">
            <div id="titular">MENU DE FECHAS HISTÓRICAS</div> 
                <ul class="menu">
                    <li><a href="#" class="anios">DÉCADA DE 1970</a>
                        <ul class="decada">  
                            <?php $i=0; $puntero=0; 
                                for($i=0;$i<count($_SESSION["DECADA"]);$i++)
                                  {
                                    if($_SESSION["DECADA"][$i]==1970)
                                        {
                            ?>
                                        <li><a href="consultasHistoria.php?id=<?php echo($puntero);?>" class="pulsador"><?php echo($_SESSION["FECHA"][$i]);?></a></li>   
                            <?php
                                        } $puntero++; //Se hace esto para seguir añadiendo más eventos que sucedieron en ésta década de los 1970
                                  }?>
                        </ul>
                    </li>
                    <li><a href="#" class="anios">DÉCADA DE 1980</a>
                        <ul class="decada">  
                                <?php $i=0; $puntero=0; 
                                    for($i=0;$i<count($_SESSION["DECADA"]);$i++)
                                    {
                                        if($_SESSION["DECADA"][$i]==1980)
                                            {
                                ?>
                                            <li><a href="consultasHistoria.php?id=<?php echo($puntero);?>" class="pulsador"><?php echo($_SESSION["FECHA"][$i]);?></a></li>   
                                <?php
                                            } $puntero++; //Se hace esto para seguir añadiendo más eventos que sucedieron en ésta década de los 1970
                                    }?>
                        </ul>
                    </li>
                    <li><a href="#" class="anios">DÉCADA DE 1990</a>
                        <ul class="decada">  
                                <?php $i=0; $puntero=0; 
                                    for($i=0;$i<count($_SESSION["DECADA"]);$i++)
                                    {
                                        if($_SESSION["DECADA"][$i]==1990)
                                            {
                                ?>
                                            <li><a href="consultasHistoria.php?id=<?php echo($puntero);?>" class="pulsador"><?php echo($_SESSION["FECHA"][$i]);?></a></li>   
                                <?php
                                            } $puntero++; //Se hace esto para seguir añadiendo más eventos que sucedieron en ésta década de los 1970
                                    }?>
                        </ul>
                    </li>
                    <li><a href="#" class="anios">DÉCADA DE 2000</a>
                        <ul class="decada">  
                                <?php $i=0; $puntero=0; 
                                    for($i=0;$i<count($_SESSION["DECADA"]);$i++)
                                    {
                                        if($_SESSION["DECADA"][$i]==2000)
                                            {
                                ?>
                                            <li><a href="consultasHistoria.php?id=<?php echo($puntero);?>" class="pulsador"><?php echo($_SESSION["FECHA"][$i]);?></a></li>   
                                <?php
                                            } $puntero++; //Se hace esto para seguir añadiendo más eventos que sucedieron en ésta década de los 1970
                                    }?>
                        </ul>
                    </li>
                    <li><a href="#" class="anios">DÉCADA DE 2010</a>
                        <ul class="decada">  
                                <?php $i=0; $puntero=0; 
                                    for($i=0;$i<count($_SESSION["DECADA"]);$i++)
                                    {
                                        if($_SESSION["DECADA"][$i]==2010)
                                            {
                                ?>
                                            <li><a href="consultasHistoria.php?id=<?php echo($puntero);?>" class="pulsador"><?php echo($_SESSION["FECHA"][$i]);?></a></li>   
                                <?php
                                            } $puntero++; //Se hace esto para seguir añadiendo más eventos que sucedieron en ésta década de los 1970
                                    }?>
                        </ul>
                    </li>
                    <li><a href="#" class="anios">DÉCADA DE 2020</a>
                        <ul class="decada">  
                                <?php $i=0; $puntero=0; 
                                    for($i=0;$i<count($_SESSION["DECADA"]);$i++)
                                    {
                                        if($_SESSION["DECADA"][$i]==2020)
                                            {
                                ?>
                                            <li><a href="consultasHistoria.php?id=<?php echo($puntero);?>" class="pulsador"><?php echo($_SESSION["FECHA"][$i]);?></a></li>   
                                <?php
                                            } $puntero++; //Se hace esto para seguir añadiendo más eventos que sucedieron en ésta década de los 1970
                                    }?>
                        </ul>
                    </li>
                </ul> 
            <div id="argumentos">
                <div id="fecha">
                    <div id="tiempo"><?php echo $_SESSION["fechado"];?></div>
                </div>
                <div id="contenido">
                    <div id="trama"><?php echo $_SESSION["acontecimiento"];?></div>
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