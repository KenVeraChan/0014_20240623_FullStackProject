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
    <title>Tratamiento proyectos</title>
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
        <div id="tituloGeneral"><strong>DIAGRAMA DE GANNT DE LOS PROYECTOS EMPRESARIALES</strong></div>
        <div class="tableroDiagrama" style="position:absolute">
            <table id="lineaTiempo">
                <tr> <!-- CABECERA DE LA TABLA IMPROVISADA -->
                    <td class="tablaCabecera">TAREAS</td>
                    <?php for($i=0;$i<$_SESSION["fechaIntervalo"]+1;$i++): ?>
                        <td class="tablaCabecera"><strong><?php echo(str_replace("-","/",date('d-m-Y',strtotime('+'.$i.'day',strtotime($_SESSION["fechaInicio"])))));?></strong></td>
                    <?php endfor; //str_replace(): reemplaza guiones por barras oblicuas de una cadena
                                  //date():        convierte una cadena de fecha en un formato específico de dd-mm-yyyy
                                  //strtotime():   convierte una cadena string sacada de una consulta MySQL en un formato date (fecha) legible
                    ?>
                </tr> <!-- TODAS LAS FILAS DE LA TABLA IMPROVISADA -->
                <?php $z=0; $i=0; foreach($_SESSION["registro"] as $filaGannt){?>
                <tr> 
                <td class="filasTareas"><?php echo($filaGannt->PROYECTO);?></td>
                    <?php for($i=0;$i<=$_SESSION["fechaIntervalo"];$i++){ ?>
                        <?php //Este IF comprueba si la $_SESSION["fechaInicio"] incrementada coincide con el inicio de la tarea, en cuyo caso inscribe día con tarea ocupada
                            if(strcmp(strtotime('+'.$i.'day',strtotime($_SESSION["fechaInicio"])),strtotime($_SESSION["registro"][$z]->INICIO))==0 && $z<$_SESSION["filas"])
                                { ?>
                                    <?php for($j=0;$j<($_SESSION["registro"][$z]->DURACION);$j++)
                                          { //Mete en los días de la duración de la tarea, el sombreado de ocupación por tarea en ejecución ?>
                                        <td class="filasConOcup"><?php echo "Día ".($j+1)?></td> 
                                    <?php $i++;} ?>
                        <?php   } // Cierre del if interno?>
                        <?php if($i<=$_SESSION["fechaIntervalo"]){ //Para controlar la añadidura de días sin tareas dentro?>
                        <td class="filasSinOcup">----</td>
                        <?php } ?>
                    <?php } $z++; //Cierre del for interno?>
                </tr>
                <?php } //Cierre del foreach externo ?>
            </table>
        </div>
        <div class="tableroDiagrama" style="position:absolute">
            <table id="formularioInterno">
                <form class="tablaAcciones" action="../../008_ObjetivosEmpresa/0083_ControlProyectos/gestionProyectos.php" method="get">
                    <p class="separacion"></p>
                    <label class="celda">ID PROYECTO:<input type="text" class="celdas" name="idProyecto"></label> <!--ID-->                        
                    <p class="separacion"></p>
                    <label class="celda">NOMBRE PROYECTO:<input type="text" class="celdas" name="nombreProyecto"></label>                         
                    <p class="separacion"></p>
                    <label class="celda">FECHA INICIO:<input type="date" class="celdas" name="fechaProyecto"></label>
                    <p class="separacion"></p>
                    <label class="celda">DURACIÓN:<input type="number" class="celdas" name="duracionProyecto" min="1" max="20"></label>  
                    <p class="separacion"></p>
                    <label class="celda">COSTES:<input type="number" class="celdas" name="costesProyecto"min="-10000" max="10000"></label>
                    <p class="separacion"></p>                  
                    <label class="celda">
                    <input type="submit" value="INSERTA" name="INSERTA" class="boton">
                    <input type="submit" value="ACTUALIZA" name="ACTUALIZA" class="boton">
                    <input type="submit" value="CARGA" name="CARGA" class="boton">
                    <input type="submit" value="ELIMINA" name="ELIMINA" class="boton">
                    <input type="submit" value="VOLVER" name="VOLVER" class="boton">
                    </label>
                </form>
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
        if(<?php echo($_SESSION["semaphore"])?>==1)
        {
            //ACCION DE INSERCCION DEL PROYECTO EN LA BBDD
            letreroConfirmado(1);
        }
        if(<?php echo($_SESSION["semaphore"])?>==2)
        {
            //ACCION DE ACTUALIZAR EL PROYECTO EN LA BBDD
            letreroConfirmado(2);
        }
        if(<?php echo($_SESSION["semaphore"])?>==3)
        {
            //ACCION DE CARGAR UN PROYECTO EN EL FORMULARIO PARA VISUALIZARLO
            rellenar();
            letreroConfirmado(3);
        }
        if(<?php echo($_SESSION["semaphore"])?>==4)
        {
            //ACCION DE CARGAR UN PROYECTO EN EL FORMULARIO PARA VISUALIZARLO
            limpiar();
            letreroConfirmado(4);
        }
        if(<?php echo($_SESSION["semaphore"])?>==5)
        {
            //ACCION DE CARGAR UN PROYECTO EN EL FORMULARIO PARA VISUALIZARLO
            limpiar();
            letreroConfirmado(5);
        }
        if(<?php echo($_SESSION["semaphore"])?>==6)
        {
            //ACCION DE CARGAR UN PROYECTO EN EL FORMULARIO PARA VISUALIZARLO
            limpiar();
            letreroConfirmado(6);
        }
    //PARA LA CARGA DE LOS DATOS EN EL FORMULARIO
    function rellenar()
    {
        document.getElementsByClassName("celdas")[0].value = "<?php echo($_SESSION["idProyecto"]);?>";
        document.getElementsByClassName("celdas")[1].value = "<?php echo($_SESSION["nombreProyecto"]);?>";
        document.getElementsByClassName("celdas")[2].value = "<?php echo($_SESSION["inicioProyecto"]);?>";
        document.getElementsByClassName("celdas")[3].value = "<?php echo($_SESSION["duracionProyecto"]);?>";
        document.getElementsByClassName("celdas")[4].value = "<?php echo($_SESSION["costeProyecto"]);?>";
    }
    //PARA LA LIMPIEZA DE LOS DATOS CARGADOS EN EL FORMULARIO
    function limpiar()
    {
        document.getElementsByClassName("celdas")[0].value = "";
        document.getElementsByClassName("celdas")[1].value = "";
        document.getElementsByClassName("celdas")[2].value = "";
        document.getElementsByClassName("celdas")[3].value = "";
        document.getElementsByClassName("celdas")[4].value = "";
    }
    </script>
    <?php $_SESSION["semaphore"]=0; //Reiniciar variable ?> 
</body>
</html>