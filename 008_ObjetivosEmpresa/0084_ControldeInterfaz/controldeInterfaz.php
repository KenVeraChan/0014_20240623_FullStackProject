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
    set_error_handler(function(int $errno, string $errstr) {
        if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
            return false;
        } else {
            return true;
        }
    }, E_WARNING);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tratamiento proyectos</title>
    <link rel="stylesheet" href="controldeInterfaz.css">
    <script src="../../008_ObjetivosEmpresa/0084_ControldeInterfaz/controldeInterfaz.js"></script>
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
        <div id="iconoAdorno"><img src="../../008_ObjetivosEmpresa/0084_ControldeInterfaz/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
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
        <div id="tituloGeneral"><strong>IMÁGENES PARA LA INTERFAZ DE LAS PÁGINAS WEB</strong></div>
        <div class="tableroDiagrama" style="position:absolute">
            <table id="formularioInterno">
                <form class="tablaAcciones" action="../../008_ObjetivosEmpresa/0084_ControldeInterfaz/gestionInterfaz.php" method="post" enctype="multipart/form-data">
                    <label class="celda">ID PROYECTO:<input type="text" class="celdas" name="idImagen"></label> <!--ID-->                        
                    <p class="separacion"></p>
                    <label class="celda">NOMBRE IMAGEN:<input type="text" class="celdas" name="nombreProyecto"></label>                         
                    <p class="separacion"></p>
                    <label class="celda">TAMAÑO IMAGEN:<input type="text" class="celdas" name="nombreProyecto"></label>
                    <p class="separacion"></p>
                    <label class="celda">TIPO IMAGEN:<input type="text" class="celdas" name="nombreProyecto"></label>  
                    <p class="separacion"></p>
                    <label class="celda">DESTINO:
                        <select type="text" class="desplegable" name="destinoImagen">
                            <option></option>
                            <option>SLIDER</option>
                            <option>PRODUCTOS</option>
                            <option>SERVICIOS</option>
                        </select>    
                    </label>
                    <label class="celda">
                    <input type="submit" value="INSERTA" name="INSERTA" class="boton">
                    <input type="submit" value="CARGA" name="CARGA" class="boton">
                    <input type="submit" value="VOLVER" name="VOLVER" class="boton">
                    </label>
                    <p class="separacion"></p>
                    <p class="separacion"></p>
                    <input type="file" id="imagen" name="imagen">
                    <p class="separacion"></p>
                    <p class="separacion"></p>
                    <?php
                        if($_SESSION["senalImagen"]==1):
                    ?>
                        <label class="celda">CARGA IMAGEN:<img class="espacioIimagen" src="../0084_ControldeInterfaz/UploadImages/<?php echo $_SESSION["nombreImagen"];?>" name="cargaImagenes" alt="Imagen cargada del servidor BBDD"></label>
                    <?php
                        endif;
                    ?>                   
                    <p class="separacion"></p>                  
                </form>
            </table>
        </div>
        <img id="imagenPortada" src="../../008_ObjetivosEmpresa/0084_ControldeInterfaz/images/REUNIONES.jpg" alt="Imagen Reuniones">
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