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
    <title>Tareas Para Confirmar</title>
    <link rel="stylesheet" href="actualizarTareasPend.css">
    <script src="actualizarTareasPend.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../0081_ConfirmacionObjetivos/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>
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
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../../001_Busqueda/busquedaPHP.php'">BUSCAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../../002_Inserccion/inserccionPHP.php'"> RECLUTAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../../003_Actualizacion/actualizacionPHP.php'">CONFIGURAR CANDIDATO</button>
                </td>
            </tr>
            <tr class="cajaBotonera">    
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../../004_Eliminacion/eliminacionPHP.php'"> DESESTIMAR CANDIDATO</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../../000_ConsultaContactos/ConsultaContactos.php'">MENU Y BBDD</button>
                </td>
                <td class="LlenobotonesPrincipal">
                    <button class="bloque_opciones" style="color: rgb(204, 0, 255)" onclick="location.href='../../008_ObjetivosEmpresa/tareasPendientes.php'">TAREAS PENDIENTES</button>
                </td>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
        <div class="letreroOK" style=
               "position:absolute;
                width:100%; 
                height: 30px; 
                text-align: center;
                color: rgb(161, 119, 189);
                margin-top:-40px;
                background-color: rgba(0, 0, 19, 0.89);
                box-shadow: none;
                z-index:1">
        </div>
    </header>
    <div class="consulta">
            <?php $_SESSION["semaforo"]=2; include "../../008_ObjetivosEmpresa/controlPend.php"; ?>
        <div class="tablaBBDD">
            <div id="tablaPaginacion">
                <table id="tabla">
                        <tr class="cabecera">
                            <td class="cajaT"></td>
                            <td class="cajaT">ID</td>
                            <td class="cajaT">TAREA</td>
                            <td class="cajaT">DEPARTAMENTO</td>
                            <td class="cajaT">TECNICOS</td>
                            <td class="cajaT">COSTES</td>
                            <td class="cajaT">FECHA</td>
                            <td class="cajaT">RESOLUCION</td>
                        </tr>
                        <?php 
                            foreach($registro as $persona):
                        ?>
                        <tr class="cabecera">
                            <td class="caja">EN BBDD: </td>
                            <td class="caja"><?php $uno=$persona->ID; echo($persona->ID);?></td>
                            <td class="caja"><?php $dos=$persona->TAREA; echo($persona->TAREA);?></td>
                            <td class="caja"><?php $tres=$persona->DEPARTAMENTO; echo($persona->DEPARTAMENTO);?></td>
                            <td class="caja"><?php $cuatro=$persona->TECNICOS; echo($persona->TECNICOS);?></td>
                            <td class="caja"><?php $cinco=$persona->COSTES; echo($persona->COSTES);?></td>
                            <td class="caja"><?php $seis=$persona->FECHA; echo($persona->FECHA);?></td>
                            <td class="caja"><?php $siete=$persona->RESOLUCION; echo($persona->RESOLUCION);?></td>
                        </tr>
                </table>
                    <?php
                        endforeach;
                    ?>
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <table id="tabla2">
                        <tr>
                            <td class="caja">ACTUAL: </td>
                            <td class="caja"><?php echo($id)?></td>
                            <td class="caja"><input type="text" name="tarea" style="width:190px; text-align:center" value="<?php echo($dos)?>"></td>
                            <td class="caja"><input type="text" name="departamento" style="width:150px; text-align:center" value="<?php echo($tres)?>"></td>
                            <td class="caja"><input type="text" name="tecnicos" style="width:80px; text-align:center" value="<?php echo($cuatro)?>"></td>
                            <td class="caja"><input type="text" name="costes" style="width:80px; text-align:center" value="<?php echo($cinco)?>"></td>
                            <td class="caja"><input type="date" name="fecha" style="width:110px; text-align:center" value="<?php echo($seis)?>"></td>
                            <td class="caja"><input type="text" name="resolucion" style="width:160px; text-align:center" value="<?php echo($siete)?>"></td>
                        </tr>
                        <tr style="height:40px">
                        </tr>
                        <tr>
                            <td class="cajaB">
                                    <input type="submit"  class="botonera" name="actualizar" value="Actualizar">
                            </td>
                        </tr>
                    </table>
                    </form>
            </div>
        </div>
      <img id="imagenPortada" src="../0081_ConfirmacionObjetivos/images/DIGITALIZACION.jpg" alt="Imagen servidor">
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
    <?php 
        if(isset($_POST["actualizar"]))
        {
            $_SESSION["semaforo"]=3; include "../../008_ObjetivosEmpresa/controlPend.php"; 
        }
        else{
            $_SESSION["semaforo"]=0; //Limpieza de BUFFER imperiosa
        }       
    ?>
    <script>
        if(<?php echo($_SESSION["semaforo"])?>==3)
        {
            letreroConfirmadoOK();
        }
        function letreroConfirmadoOK()
            {
                var letrero= document.getElementsByClassName("letreroOK")[0];
                    letrero.innerHTML="Tarea Guardada y Registrada Ahora en la BBDD";
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
</body>
</html>
