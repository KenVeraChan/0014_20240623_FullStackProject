<?php
        //INICIA LA SESION DE ENTRADA
        session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                          //También permite rescatar la información almancenada en la variable superglobal $_SESSION
        if(!isset($_SESSION["usuario"]))
        {
            //Si es falso que no se ha registrado nada en la sesion
            header("Location:../005_Login/login.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Contactos</title>
    <link rel="stylesheet" href="estilosCabecera.css">
    <script src="cargaPaginas.js"></script>
</head>
<body onload="cargarPagina()">
       <?php
            echo("<div style=' 
                            float: right;
                            position: relative;
                            background-color: transparent;
                            text-align: center;
                            color: black;
                            width: 300px;
                            height: 25px;
                            padding-top: 10px;
                            '>Hola BIENVENIDO/A: ".$_SESSION["usuario"]."</div>
                <a style=' 
                            float: right;
                            background-color: transparent;
                            text-align: center;
                            font-size: 90%;
                            color: black;
                            width: 120px;
                            height: 25px;
                            text-decoration: none;
                            padding-top: 12px;
                            '
                  href='salidaPagina.php'><strong>CERRAR SESION</strong></a> ");
       ?>
    <div class="cabecera"><h2><strong>Candidatos a la plantilla Sfer4D Corporation</strong></h2></div> 
    <div><input type="submit" class="bloque_opciones" value="OPCIONES" onclick="llamada()""></div>
    <div><input type="submit" class="bloque_opciones" value="BÚSQUEDA" onclick="location.href='../001_Busqueda/busquedaPHP.php'"></div>
    <div><input type="submit" class="bloque_opciones" value="INSERCCIÓN" onclick="location.href='../002_Inserccion/inserccionPHP.php'"></div>
    <div><input type="submit" class="bloque_opciones" value="ACTUALIZACIÓN" onclick="location.href='../003_Actualizacion/actualizacionPHP.php'"></div>  
    <div><input type="submit" class="bloque_opciones" value="ELIMINACIÓN" onclick="location.href='../004_Eliminacion/eliminacionPHP.php'"></div>   
    <div class="consulta">
        <!-- SIN CONTENIDO AUN -->
    </div>
</body>
</html>