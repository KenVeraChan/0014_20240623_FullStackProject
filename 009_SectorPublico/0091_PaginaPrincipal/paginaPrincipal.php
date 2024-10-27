<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        require "consultasSlider.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal Corporación Sfer4D</title>
    <link rel="stylesheet" href="../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.css">
    <script src="../../009_SectorPublico/0091_PaginaPrincipal/scriptsMenu.js"></script>
</head>
<body onload="cargarPagina()">
        <div class="letreroOK" style=
            "position:absolute;
                width:100%; 
                height: 30px; 
                text-align: center;
                color: rgb(255, 0, 0);
                margin-top:-40px;
                background-color: rgba(0, 0, 19, 0.89);
                box-shadow: none">
        </div>
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../009_SectorPublico/0091_PaginaPrincipal/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>      
        <?php if(isset($_SESSION["usuario"])) {?>
            <div id="areaSesion">
                <table style="width:100%">
                    <tr>
                        <div id="bienvenido"><strong><?php echo"Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
                        <a href="../../005_Login/salidaPagina.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
                    </tr>
                </table>
            </div>   
        <?php }?>
        <?php if(!isset($_SESSION["usuario"])) {?>
            <div id="areaSesion">
                <table style="width:100%">
                    <tr>
                        <div id="bienvenido" style="margin-top:15px"><strong>Bienvenido: Cliente Invitado</strong></div>                    
                        <div id="cerrarSesion"></div>
                    </tr>
                </table>
            </div>   
        <?php }?>
        <div class="VaciobotonesPrincipal">
            <a href="../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php" class="areaPrivada"><img src="../../009_SectorPublico/0091_PaginaPrincipal/images/CANDADO.png" title="Area Privada" alt="Area Privada" width="40px" height="40px"></a>
            <a href="../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php" class="areaPrivada"><img src="../../009_SectorPublico/0091_PaginaPrincipal/images/COMPRAS.png" title="Ver Carrito de Compra" alt="Ver Carrito de Compra" width="40px" height="40px"></a>
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
    <div class="consulta" style="background-image: url(../../009_SectorPublico/0091_PaginaPrincipal/images/DIGITALIZACION.jpg); background-size: 100% 100%;">
    <table id="seccionSlider">
      <form action="consultasSlider.php" method="GET">
        <tr id="bandaSlider">
            <td class="bandasPasaSlider"><input type="submit" class="pasaIzquierda" name="pasaIzquierda" value=""></td>
            <?php
                $i=$_SESSION["PUNTERO"]; 
            ?>  <!-- CARRUSEL DE SLIDER DE 20 IMAGENES COMO MÁXIMO ESTABLECIDO (se puede aumentar en consultasSlider -->
            <td class="imagenCargada" style="background-image: url('../../009_SectorPublico/0091_PaginaPrincipal/sliderImages/<?php echo $_SESSION["NOMBRESLIDER"][$i];?>');"></td>
            <td class="bandasPasaSlider"><input type="submit" class="pasaDerecha" name="pasaDerecha" value=""></td>
        </tr>
        </form>
    </table>
    <?php for($j=0;$j<4;$j++){ ?>     
        <table class="seccionPrincipal">   <!-- PRIMERA BANDA DE NOVEDADES EN PAGINA WEB -->
            <?php for($i=1;$i<5;$i++){ ?>
                <td class="noticia">    
                    <table class="tablaInterna">
                        <tr class="fila">   <!-- COMO SON CUATRO PANELES SE USARÁ $j PARA CADA UNO E $i PARA LAS CELDAS DEL INTERIOR DE CADA PANEL-->
                            <td><img class="imgBloques" src="newsImages/<?php $fila=$i+4*$j; echo extraccionNovedad($fila);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div class="textoTitulo" style="margin-left:2%"></div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo"></p></td>
                        </tr>
                    </table>
                </td>
            <?php } ?>
        </table>
    <?php } ?>
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
        if(<?php echo $_SESSION["privado"]?>==1)
        {
            //En el caso de que no esten bien escritas el USUARIO o la CONTRASENIA
            letreroConfirmadaEntrada(1);
        }
        function letreroConfirmadaEntrada(seleccion)
        {        
            var letrero= document.getElementsByClassName("letreroOK")[0];
            if(seleccion==1)
            {
                letrero.innerHTML="AREA PRIVADA NO PARA CLIENTES"; 
            }
            letrero.style.paddingTop="10px";
            letrero.style.boxShadow= "rgb(150,150,150) 5px 5px 20px 10px";
            letrero.style.transitionDuration = "1s";
            letrero.style.marginTop="0px";

            document.addEventListener("mousemove",function(){
            let temporizador=setTimeout(function(){
                var letrero= document.getElementsByClassName("letreroOK")[0];
                letrero.style.transitionDuration = "1s";
                letrero.style.marginTop="-50px";
            },3500);
            })
            clearTimeout(temporizador);
        }
    </script>
    <?php $_SESSION["privado"]=0; //Para el BORRADO IMPERIOSO DEL BUFFER?>
</body>
</html>