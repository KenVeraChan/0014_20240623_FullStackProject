<?php
    //INICIA LA SESION DE ENTRADA
    session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                        //También permite rescatar la información almancenada en la variable superglobal $_SESSION
    if(!isset($_SESSION["usuario"]))
    {
        //Si es falso que no se ha registrado nada en la sesion
        header("Location:../../005_Login/0052_LoginJEFES/loginJEFES.php");
    }
    //Ignorar el WARNING de la primera ejecución de esta página web y que no considere WARNING el $_SESSION["senalImagen"]
    error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tratamiento proyectos</title>
    <link rel="stylesheet" href="controlVentasInterfaz.css">
    <script src="../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/controlVentasInterfaz.js"></script>
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
        <div id="iconoAdorno"><img src="../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
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
        <div id="tituloGeneral"><strong>GESTIÓN DE PRECIOS DE PRODUCTOS SERVICIOS Y PROYECTOS</strong></div>
        <div class="tableroDiagrama" style="position:absolute">
            <table id="formularioInterno">
                <form class="tablaAcciones" action="../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/gestionVentasInterfaz.php" method="post" enctype="multipart/form-data">
                    <label class="celda">DESTINO DE ALMACENAJE:</label>
                        <select type="text" class="desplegable" name="destinoImagen">
                        <option></option>
                            <option>SLIDER</option>
                            <option>PRODUCTOS</option>
                            <option>SERVICIOS</option>
                            <option>PROYECTOS</option>
                            <option>NOVEDADES</option>
                            <option>CATEGORIA PRODUCTOS</option>
                            <option>CATEGORIA SERVICIOS</option>
                            <option>CATEGORIA PROYECTOS</option>
                        </select>    
                    <label class="celda">
                    <input type="submit" value="CARGA" name="CARGA" class="boton">
                    <input type="submit" value="VOLVER" name="VOLVER" class="boton">
                    </label>
                    <p class="separacion"></p>
                    <p class="separacion"></p>                   
                    <p class="separacion"></p>                  
                </form>
            </table>
        </div>
        <img id="imagenPortada" src="../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/images/REUNIONES.jpg" alt="Imagen Reuniones">
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
        if(<?php echo($_SESSION["senalImagen"])?>==1)
        {
            //Imagen cargada desde la carpeta del servidor
            rellenar();
            letreroConfirmado(1);
        }
        if(<?php echo($_SESSION["senalImagen"])?>==2)
        {
            //Imagen subida al servidor de la BBDD
            letreroConfirmado(2);
        }
        if(<?php echo($_SESSION["senalImagen"])?>==3)
        {
            //NO SE HA ESPECIFICADO EL DESTINO APLICABLE DE LA IMAGEN SUBIDA A LA CARPETA DEL SERVIDOR
            letreroConfirmado(3);
        }
        if(<?php echo($_SESSION["senalImagen"])?>==4)
        {
            //ERROR: EL FORMATO DE LA IMAGEN QUE SE PRETENDÍA SUBIR NO ES DE TIPO: JPG,JPEG,PNG,GIF
            letreroConfirmado(4);
        }
        if(<?php echo($_SESSION["senalImagen"])?>==5)
        {
            //ERROR: EL TAMAÑO DE LA IMAGEN EXCEDE LO PERMITIDO DE 3MB
            letreroConfirmado(5);
        }
        if(<?php echo($_SESSION["senalImagen"])?>==6)
        {
            //NO SE HA ESPECIFICADO EL DESTINO APLICABLE DE LA IMAGEN SUBIDA A LA CARPETA DEL SERVIDOR
            letreroConfirmado(6);
        }
        if(<?php echo($_SESSION["senalImagen"])?>==7)
        {
            //Imagen eliminada de la BBDD y de la carpeta del servidor en donde se almacenó
            letreroConfirmado(7);
        }
    //PARA LA CARGA DE LOS DATOS EN EL FORMULARIO
    function rellenar()
    {
        document.getElementsByClassName("celdas")[0].value = "<?php echo($_SESSION["idImagen"]);?>";
        document.getElementsByClassName("celdas")[1].value = "<?php echo($_SESSION["nombreImagen"]);?>";
        document.getElementsByClassName("celdas")[2].value = "<?php echo($_SESSION["tamanioImagen"]);?>";
        document.getElementsByClassName("celdas")[3].value = "<?php echo($_SESSION["tipoImagen"]);?>";
        document.getElementsByClassName("desplegable")[0].value = "<?php echo($_SESSION["destinoImagen"]);?>";
    }
    </script>
    <?php $_SESSION["senalImagen"]=0; //Reiniciar variable ?> 
</body>
</html>