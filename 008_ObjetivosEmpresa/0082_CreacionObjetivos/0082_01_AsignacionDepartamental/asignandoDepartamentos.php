<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        if(!isset($_SESSION["usuario"]))
        {
            //Si es falso que no se ha registrado nada en la sesion
            header("Location:../../../005_Login/0052_LoginJEFES/loginJEFES.php");
        }
        require "../../../005_Login/cierreSesionesCookie.php";   //Gestion de cierres de sesion tras consumirse la COOKIE
        $rutaPaginaOpAsigDepartamento="location:../../../005_Login/";   //Se pone la ruta desde la página asignación departamental
        cargaWebCookie($rutaPaginaOpAsigDepartamento);   //Se ejecuta la función de carga página según cookie desde la página asignación departamental    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area de asignación departamental</title>
    <link rel="stylesheet" href="asignandoDepartamentos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!-- CARGA LA JQUERY PARA EL JS CIERRE SESSION-->
    <script src="../../../005_Login/scriptCierreSesion.js"></script>  <!-- carga del fichero desde LOGIN -->
    <script src="asignandoDepartamentos.js"></script>
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
        <table id="tablaBotones">
            <tr class="filaBoton">
                <td>
                    <div id="eleccionesJEFE" onclick="cargaFormularios(1)">JEFES</div>
                </td>
                <td>
                    <div id="eleccionesRRHH" onclick="cargaFormularios(2)">RR.HH.</div>
                </td>
                <td>
                    <div id="eleccionesEMPLEADO" onclick="cargaFormularios(3)">EMPLEADOS</div>
                </td>
            </tr>
        </table>
        <div id="iconoAdorno"><img class="imagenIcono" src="../../../008_ObjetivosEmpresa/0082_CreacionObjetivos/0082_01_AsignacionDepartamental/images/Sfer4D-IconoEmpresa.jpg" alt="iconoEmpresa"></div>     
        <div class="VaciobotonesPrincipal"></div>
        <img id="imagenPortada" src="../../../008_ObjetivosEmpresa/0082_CreacionObjetivos/0082_01_AsignacionDepartamental/images/DEPARTAMENTOS.png" alt="Imagen departamentos">    
        <div class="consultaJEFES">
            <!-- INSERCCIONES TABLA 1: JEFES -->
            <form class="tablaAcciones" action="../../../008_ObjetivosEmpresa/0082_CreacionObjetivos/gestionTareas.php" method="POST">
                <p class="separacion"></p>
                    <label class="celdaJEFES">DEPARTAMENTO ASIGNADO:
                        <select name="rolJEFES" class="desplegableJEFES">
                            <option></option>
                            <option>EJECUTIVO</option>
                            <option>OPERACIONES</option>
                            <option>FINANCIERO</option>
                            <option>I+D+I</option>
                            <option>MARKETING</option>
                            <option>CONSULTOR</option>
                            <option>PRODUCCION</option>
                            <option>DATOS</option>
                        </select>
                    </label>
                <p class="separacion"></p>
                <label class="celdaJEFES">CONTRASEÑA ASIGNADA:<input type="text" class="celdasJEFES" name="contraseniaAsignada" required minlength="4" maxlength="28"></label> <!--CONTRASENIA ASIGNADA-->
                <p class="separacion"></p>
                <input type="submit" class="confirmaJEFES" name="confirmaJEFES" value="" title="Accionar para registrar el rol de jefe"> <!--CONTRASENIA ASIGNADA-->
                <p class="separacion"></p>
            </form>
        </div>
        <div class="consultaRRHH">
            <!-- INSERCCIONES TABLA 2: RRHH -->
            <form class="tablaAcciones" action="../../../008_ObjetivosEmpresa/0082_CreacionObjetivos/gestionTareas.php" method="POST">
                <p class="separacion"></p>
                    <label class="celdaRRHH">DEPARTAMENTO:
                        <select name="rolRRHH" class="desplegableRRHH">
                            <option></option>
                            <option>RRHH</option>
                            <option>RELACIONES PUBLICAS</option>
                            <option>DIRECTOR</option>
                        </select>
                    </label>
                <p class="separacion"></p>
                <label class="celdaRRHH">CONTRASEÑA ASIGNADA:<input type="text" class="celdasRRHH" name="contraseniaAsignada" required minlength="4" maxlength="28"></label> <!--CONTRASENIA ASIGNADA-->
                <p class="separacion"></p>
                <input type="submit" class="confirmaRRHH" name="confirmaRRHH" value="" title="Accionar para registrar el rol de jefe"> <!--CONTRASENIA ASIGNADA-->
                <p class="separacion"></p>
            </form>
        </div>
        <div class="consultaEMPLEADOS">
            <!-- INSERCCIONES TABLA 3: EMPLEADOS -->
            <form class="tablaAcciones" action="../../../008_ObjetivosEmpresa/0082_CreacionObjetivos/gestionTareas.php" method="POST">
                <p class="separacion"></p>
                    <label class="celdaEMPLEADOS">CONTRATO ESTABLECIDO:
                        <select name="rolEMPLEADOS" class="desplegableEMPLEADOS">
                            <option></option>
                            <option>TIEMPO COMPLETO</option>
                            <option>INDEFINIDO</option>
                            <option>OBRA Y OFICIO</option>
                            <option>SUSTITUCIÓN</option>
                            <option>ESTACIONAL</option>
                            <option>VOLUNTARIO</option>
                            <option>ARRENDADOS</option>
                            <option>PRACTICANTE</option>
                        </select>
                    </label>
                <p class="separacion"></p>
                <label class="celdaEMPLEADOS">CONTRASEÑA ASIGNADA:<input type="text" class="celdasEMPLEADOS" name="contraseniaAsignada" required minlength="4" maxlength="28"></label> <!--CONTRASENIA ASIGNADA-->
                <p class="separacion"></p>
                <input type="submit" class="confirmaEMPLEADOS" name="confirmaEMPLEADOS" value="" title="Accionar para registrar el rol de jefe"> <!--CONTRASENIA ASIGNADA-->
                <p class="separacion"></p>
            </form>
        </div>
    </header>
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
    <script>letreroConfirmado(<?php echo($_SESSION["semaforo"])?>);</script>
    <?php $_SESSION["semaforo"]=0; //Reiniciar variable ?> 
    <script>
        AddAlert(<?php echo $_SESSION["logeando"]?>,3); 
        //Para el comienzo de la deteccion de la inactividad en la pagina web pero no afecta sin usuario logeado de cualquier tipo
        //Distancia 3 porque es dar tres saltos hasta el directorio raíz
    </script>
</body>
</html>