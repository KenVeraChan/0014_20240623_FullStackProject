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
    <title>Eliminación de Empleados</title>
    <link rel="stylesheet" href="eliminacionCSS.css">
    <script src="eliminacionJS.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../004_Eliminacion/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
    <div id="areaSesion">
        <table style="width:100%">
            <tr>
                    <div id="bienvenido"><strong><?php echo"Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
                    <a href="../005_Login/0051_LoginRRHH/loginRRHH.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
            </tr>
        </table>
    </div>        
        <div class="VaciobotonesPrincipal"></div>
        <table id="tabla">
            <tr class="cajaBotonera">
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(155, 0, 0)" onclick="location.href='../001_Busqueda/busquedaPHP.php'">BUSCAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(155, 0, 0)" onclick="location.href='../002_Inserccion/inserccionPHP.php'"> RECLUTAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(155, 0, 0)" onclick="location.href='../003_Actualizacion/actualizacionPHP.php'"> CONFIGURAR CANDIDATO</button>
                </td>
            </tr>
            <tr class="cajaBotonera">    
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(155, 0, 0)" onclick="location.href='../004_Eliminacion/eliminacionPHP.php'"> DESESTIMAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(155, 0, 0)" onclick="location.href='../000_ConsultaContactos/ConsultaContactos.php'"> MOSTRAR BBDD</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(155, 0, 0)" onclick="location.href='../006_Paginacion/0061_PaginacionTareas/tareasPendientes.php'">TAREAS PENDIENTES</button>
                </td>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
        <div class="letreroOK" style=
               "position:absolute;
                width:100%; 
                height: 30px; 
                text-align: center;
                color: rgb(155, 0, 0);
                margin-top:-40px;
                background-color: rgba(0, 0, 19, 0.89);
                box-shadow: none">
        </div>
    </header>
    <div class="consulta">
    <!-- ELIMINACIONES TABLA 4 -->
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
           <label class="celda">SALAR. ANT.:<input type="text" class="celdas" name="aho"></label> <!--AHORROS-->
           <p class="separacion"></p>
           <input type="submit" value="ELIMINAR" name="eliminacion" class="boton"> <!--AHORROS-->
           <input type="submit" value="CARGA" name="carga_eliminacion" class="boton"><!--AHORROS-->
           <input type="submit" value="BORRA" name="borrado_eliminacion" class="boton"> <!--AHORROS-->
        </form>
        <img id="imagenPortada" src="../004_Eliminacion/images/SERVIDOR.jpg" alt="Imagen servidor">
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
    window.addEventListener('load',()=>
    {
    var botonForm= document.getElementsByClassName("boton");
        if(<?php echo($_SESSION["semaforo"])?>==1)
        {
            rellenar();    //Carga los datos en el formulario del candidato solicitado
            botonForm[0].disabled=false;  //DESACTIVADO PORQUE TODAVIA NO SE PUEDE EJECUTAR
        }
        if(<?php echo($_SESSION["semaforo"])?>==2)
        {
            limpiar();    //Limpia el formulario sin mas
            botonForm[0].disabled=true;  //DESACTIVADO PORQUE TODAVIA NO SE PUEDE EJECUTAR
        }
        if(<?php echo($_SESSION["semaforo"])?>==3)
        {
            limpiar();    //Limpia el formulario tras haber BORRADO AL CANDIDATO
            botonForm[0].disabled=true;  //DESACTIVADO PORQUE TODAVIA NO SE PUEDE EJECUTAR
            letreroConfirmadoEliminado();  //Sale el letrero de que ha sido Eliminado
        }
        function rellenar()
        {
        document.getElementsByClassName("celdas")[0].value = "<?php echo($_SESSION["id"]);?>";
        document.getElementsByClassName("celdas")[1].value = "<?php echo($_SESSION["nombre"]);?>";
        document.getElementsByClassName("celdas")[2].value = "<?php echo($_SESSION["apellidos"]);?>";
        document.getElementsByClassName("celdas")[3].value = "<?php echo($_SESSION["direccion"]);?>";
        document.getElementsByClassName("desplegable")[0].value = "<?php echo($_SESSION["poblacion"]);?>";
        document.getElementsByClassName("desplegable")[1].value = "<?php echo($_SESSION["profesion"]);?>";
        document.getElementsByClassName("celdas")[4].value = "<?php echo($_SESSION["ahorros"]);?>";
        }
        function limpiar()
        {
            //CELDAS QUE SE COLOREAN PARA INDICAR QUE SON LAS MOSTRADAS
        document.getElementsByClassName("celdas")[0].value = "";
        document.getElementsByClassName("celdas")[1].value = "";
        document.getElementsByClassName("celdas")[2].value = "";
        document.getElementsByClassName("celdas")[3].value = "";
        document.getElementsByClassName("desplegable")[0].value = "";
        document.getElementsByClassName("desplegable")[1].value = "";
        document.getElementsByClassName("celdas")[4].value = "";
        }
        function letreroConfirmadoEliminado()
        {
            var letrero= document.getElementsByClassName("letreroOK")[0];
                letrero.innerHTML="Candidato eliminado de la BBDD";
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
    });
    </script>
    <?php $_SESSION["semaforo"]=0; //Para el BORRADO IMPERIOSO DEL BUFFER ?>
</body>
</html>