<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        if(!isset($_SESSION["usuario"]))
        {
            //Si es falso que no se ha registrado nada en la sesion
            header("Location:../../005_Login/0052_LoginJEFES/loginJEFES.php");
        }
        require "gestionTareas.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creando Tareas</title>
    <link rel="stylesheet" href="creacionTareas.css">
    <script src="creacionTareas.js"></script>
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
        <div id="iconoAdorno"><img src="../../008_ObjetivosEmpresa/0082_CreacionObjetivos/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
        <div id="areaSesion">
            <table style="width:100%">
                <tr>
                        <div id="bienvenido"><strong><?php echo"Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
                        <a href="../../005_Login/salidaPagina.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
                </tr>
            </table>
        </div>        
        <div class="VaciobotonesPrincipal"></div>
        <table id="tabla">
            <tr class="cajaBotonera">
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: white" name="cargaTareas" onclick="cargaCuadroTareas();">CARGAR TAREAS</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: white" name="introTareas" onclick="cargaIntroTareas()"> AÑADIR TAREAS</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: white" name="inspeCandidatos" onclick="cargaCuadroAspirantes();"> EVALUAR CANDIDATOS</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: white" onclick="location.href='../../007_Menus/0073_MenuOpJEFES/OpJEFES.php'">VOLVER</button>
                </td>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>
    <div class="consulta">
        <div class="base">
            <div class="tablaBBDD"> <!-- CARGA DE TAREAS: TABLA 1 DE DESCRIPCIÓN DE TAREAS -->
                <table id="tablaPaginacion">
                    <tr class="cabecera">
                        <td class="cajaT">TAREA</td>
                        <td class="cajaT">DEPARTAMENTO</td>
                        <td class="cajaT">TECNICOS</td>
                        <td class="cajaT">COSTES(-) y BENEFICIO(+)</td>
                        <td class="cajaT">FECHA</td>
                        <td class="cajaT">RESOLUCION</td>
                    </tr>
                <?php
                    cargandoTareas();
                    $registro=$_SESSION["registro"];
                    foreach($registro as $persona):
                ?>
                    <tr class="cabecera">
                        <td class="caja"><?php echo($persona->TAREA);?></td>
                        <td class="caja"><?php echo($persona->DEPARTAMENTO);?></td>
                        <td class="caja"><?php echo($persona->TECNICOS);?></td>
                        <td class="caja"><?php echo($persona->COSTES);?></td>
                        <td class="caja"><?php echo($persona->FECHA);?></td>
                        <td class="caja"><?php echo($persona->RESOLUCION);?></td>
                    </tr>
                <?php
                    endforeach;
                ?>
                </table>
            </div>
            <div class="tablaBBDD2">   <!-- CARGA DE TAREAS: TABLA 2 DE ESTADISTICAS -->
                <table id="tablaEstadisticas">
                    <tr class="cabecera">
                        <td class="cajaE"><strong>DEPARTAMENTOS</strong></td>
                        <td class="cajaS"><strong>Nº TAREAS</strong></td>
                        <td class="cajaS"><strong>INGRESOS</strong></td>
                        <td class="cajaS"><strong>COSTES</strong></td>
                        <td class="cajaS"><strong>BENEFICIOS</strong></td>
                        <td class="cajaS"><strong>GANANCIA %</strong></td>              
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">I+D+I</td>
                        <td class="cajaS"><?php echo $_SESSION["TAREAS"][0];?></td>
                        <td class="cajaS"><?php echo $_SESSION["INGRESOS"][0];?></td>
                        <td class="cajaS"><?php echo $_SESSION["COSTES"][0];?></td>
                        <td class="cajaS"><?php echo $_SESSION["BENEFICIOS"][0];?></td>
                        <td class="cajaS"><?php echo number_format($_SESSION["GANANCIAS"][0],3);?></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">MARKETING</td>
                        <td class="cajaS"><?php echo $_SESSION["TAREAS"][1];?></td>
                        <td class="cajaS"><?php echo $_SESSION["INGRESOS"][1];?></td>
                        <td class="cajaS"><?php echo $_SESSION["COSTES"][1];?></td>
                        <td class="cajaS"><?php echo $_SESSION["BENEFICIOS"][1];?></td>
                        <td class="cajaS"><?php echo number_format($_SESSION["GANANCIAS"][1],3);?></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">PRODUCCION</td>
                        <td class="cajaS"><?php echo $_SESSION["TAREAS"][2];?></td>
                        <td class="cajaS"><?php echo $_SESSION["INGRESOS"][2];?></td>
                        <td class="cajaS"><?php echo $_SESSION["COSTES"][2];?></td>
                        <td class="cajaS"><?php echo $_SESSION["BENEFICIOS"][2];?></td>
                        <td class="cajaS"><?php echo number_format($_SESSION["GANANCIAS"][2],3);?></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">RR.HH.</td>
                        <td class="cajaS"><?php echo $_SESSION["TAREAS"][3];?></td>
                        <td class="cajaS"><?php echo $_SESSION["INGRESOS"][3];?></td>
                        <td class="cajaS"><?php echo $_SESSION["COSTES"][3];?></td>
                        <td class="cajaS"><?php echo $_SESSION["BENEFICIOS"][3];?></td>
                        <td class="cajaS"><?php echo number_format($_SESSION["GANANCIAS"][3],3);?></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">FINANZAS</td>
                        <td class="cajaS"><?php echo $_SESSION["TAREAS"][4];?></td>
                        <td class="cajaS"><?php echo $_SESSION["INGRESOS"][4];?></td>
                        <td class="cajaS"><?php echo $_SESSION["COSTES"][4];?></td>
                        <td class="cajaS"><?php echo $_SESSION["BENEFICIOS"][4];?></td>
                        <td class="cajaS"><?php echo number_format($_SESSION["GANANCIAS"][4],3);?></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">LOGISTICA</td>
                        <td class="cajaS"><?php echo $_SESSION["TAREAS"][5];?></td>
                        <td class="cajaS"><?php echo $_SESSION["INGRESOS"][5];?></td>
                        <td class="cajaS"><?php echo $_SESSION["COSTES"][5];?></td>
                        <td class="cajaS"><?php echo $_SESSION["BENEFICIOS"][5];?></td>
                        <td class="cajaS"><?php echo number_format($_SESSION["GANANCIAS"][5],3);?></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">DIRECTIVO</td>
                        <td class="cajaS"><?php echo $_SESSION["TAREAS"][6];?></td>
                        <td class="cajaS"><?php echo $_SESSION["INGRESOS"][6];?></td>
                        <td class="cajaS"><?php echo $_SESSION["COSTES"][6];?></td>
                        <td class="cajaS"><?php echo $_SESSION["BENEFICIOS"][6];?></td>
                        <td class="cajaS"><?php echo number_format($_SESSION["GANANCIAS"][6],3);?></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">ADMINISTRACION</td>
                        <td class="cajaS"><?php echo $_SESSION["TAREAS"][7];?></td>
                        <td class="cajaS"><?php echo $_SESSION["INGRESOS"][7];?></td>
                        <td class="cajaS"><?php echo $_SESSION["COSTES"][7];?></td>
                        <td class="cajaS"><?php echo $_SESSION["BENEFICIOS"][7];?></td>
                        <td class="cajaS"><?php echo number_format($_SESSION["GANANCIAS"][7],3);?></td>
                    </tr>
                    <tr class="cabecera">
                        <td class="cajaE">COMERCIAL</td>
                        <td class="cajaS"><?php echo $_SESSION["TAREAS"][8];?></td>
                        <td class="cajaS"><?php echo $_SESSION["INGRESOS"][8];?></td>
                        <td class="cajaS"><?php echo $_SESSION["COSTES"][8];?></td>
                        <td class="cajaS"><?php echo $_SESSION["BENEFICIOS"][8];?></td>
                        <td class="cajaS"><?php echo number_format($_SESSION["GANANCIAS"][8],3);?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="base2">
            <div class="tablaBBDD3">   <!-- INTRODUCCION DE TAREAS: TABLA 3 DE FORMULARIO -->
                <table id="tablaIntroTareas">
                    <form class="tablaAcciones" action="../../008_ObjetivosEmpresa/0082_CreacionObjetivos/gestionTareas.php" method="get">
                        <p class="separacion"></p>
                        <label class="celda">NOMBRE TAREA:<input type="text" class="celdas" name="nombreTarea"></label> <!--ID-->
                        <p class="separacion"></p>
                        <label class="celda">DEPARTAMENTO:
                        <select name="departamento" class="desplegable">
                                    <option style="width: 180px;"></option>
                                    <option style="width: 180px;">I+D+I</option>
                                    <option style="width: 180px;">MARKETING</option>
                                    <option style="width: 180px;">PRODUCCION</option>
                                    <option style="width: 180px;">RR.HH.</option>
                                    <option style="width: 180px;">FINANZAS</option>
                                    <option style="width: 180px;">LOGISTICAS</option>
                                    <option style="width: 180px;">DIRECTIVO</option>
                                    <option style="width: 180px;">ADMINISTRACION</option>
                                    <option style="width: 180px;">COMERCIAL</option>
                                </select>
                        </label> <!--DEPARTAMENTO-->                        
                        <p class="separacion"></p>
                        <label class="celda">TECNICOS:<input type="number" class="celdas" name="tecnicos"min="1" max="100"></label>  
                        </label> <!--TECNICOS-->
                        <p class="separacion"></p>
                        <label class="celda">COSTES:<input type="text" class="celdas" name="costes"></label>
                        <p class="separacion"></p>
                        <label class="celda">FECHA:<input type="date" class="desplegable" name="fecha"></label>
                            <p class="separacion"></p>
                        <label class="celda">RESOLUCIÓN:
                            <select name="resolucion" class="desplegable">
                                    <option></option>
                                    <option>APROBADO</option>
                                    <option>CANCELADO</option>
                                    <option>PENDIENTE</option>
                                    <option>READMITIDO</option>
                                </select>
                        </label>
                        <p class="separacion"></p>                  
                        <input type="submit" value="INSERTAR" name="inserccion" class="boton">
                    </form>
                </table>
            </div>    
        </div>
        <div class="base3">
            <div class="tablaBBDD4">  <!-- EVALUACION DE CANDIDATOS: TABLA 4 DE PERSONAL PARA PLANTILLA -->
                <table id="tablaCandidatura">
                    <tr class="cabecera">
                        <td class="cajaT">NOMBRE</td>
                        <td class="cajaT">APELLIDOS</td>
                        <td class="cajaT">DIRECCIÓN</td>
                        <td class="cajaT">POBLACIÓN</td>
                        <td class="cajaT">PROFESIÓN</td>
                        <td class="cajaT">SALARIO ANTERIOR</td>
                        <td class="cajaT">CONTRATACIÓN</td>
                    </tr>
                <?php
                    inspecionCandidatos();
                    $registroCandidatos= $_SESSION["candidatos"];
                    foreach($registroCandidatos as $candidato):
                ?>
                    <tr class="cabecera">
                        <td class="caja"><?php echo($candidato->NOMBRE);?></td>
                        <td class="caja"><?php echo($candidato->APELLIDOS);?></td>
                        <td class="caja"><?php echo($candidato->DIRECCION);?></td>
                        <td class="caja"><?php echo($candidato->POBLACION);?></td>
                        <td class="caja"><?php echo($candidato->PROFESION);?></td>
                        <td class="caja"><?php echo($candidato->SALAR_ANT);?></td>
                        
                        <?php if($candidato->CONTRATACION=="PENDIENTE"):?>  <!-- Redireccionamiento a otra página de aceptación o denegación de la candidatura -->
                        <td class="caja">
                            <div class="caja" style="width:95px; text-align:center; padding-top: 3px; color:white; background-color:rgb(125,132,17); font-size:86%; float:left"><?php echo($candidato->CONTRATACION);?></div>
                            <a href="gestionTareas.php?id=<?php echo($candidato->ID);?>&validez=1"><input type="submit" class="cajaPendidente" style="text-align:center;  color:white; background-color:rgb(13,101,37); width:40px; float:left; position:relative; font-size:86%" value="OK!"></a>
                            <a href="gestionTareas.php?id=<?php echo($candidato->ID);?>&validez=0"><input type="submit" class="cajaPendidente" style="text-align:center;  color:white; background-color:rgb(121,15,15); width:63px; float:left; position:relative; font-size:86%" value="NO OK!"></a>
                        </td>
                            <?php endif; ?>
                        <?php if($candidato->CONTRATACION=="APROBADA"):?>
                        <td class="caja" style="text-align:center; color:white; background-color:rgb(13,101,37); font-size:86%; padding-top: 3px"><?php echo($candidato->CONTRATACION);?></td>
                        <?php endif; ?>
                        <?php if($candidato->CONTRATACION=="DENEGADA"):?>
                        <td class="caja" style="text-align:center; color:white; background-color:rgb(121,15,15); width:200px; font-size:86%; padding-top: 3px"><?php echo($candidato->CONTRATACION);?></td>
                        <?php endif; ?>
                    </tr>
                <?php
                    endforeach;
                ?>
                </table>
            </div>
        </div>
        <img id="imagenPortada" src="../../008_ObjetivosEmpresa/0082_CreacionObjetivos/images/REUNIONES.jpg" alt="Imagen Reuniones">
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