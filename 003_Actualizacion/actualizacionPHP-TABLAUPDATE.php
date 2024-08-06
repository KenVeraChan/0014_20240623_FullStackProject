<?php
    //INICIA LA SESION DE ENTRADA
    session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                        //También permite rescatar la información almancenada en la variable superglobal $_SESSION
    if(!isset($_SESSION["usuario"]))
    {
        //Si es falso que no se ha registrado nada en la sesion
        header("Location:../005_Login/login.php");
    }
    //JSON: JavaScript Object Notation
    $LECTURA=json_decode($_SESSION["L"],true); //Para descarga como una matriz asociativa
    $ESCRITURA=json_decode($_SESSION["E"],true); //Para descarga como una matriz asociativa
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Empleados</title>
    <link rel="stylesheet" href="actualizacionCSS-TABLAUPDATE.css">
    <script src="actualizacionJS-TABLAUPDATE.js"></script>
</head>
<body onload="tablaBusqueda()">
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
            href='../005_Login/salidaPagina.php'><strong>CERRAR SESION</strong></a> ");
?>
    <div class="cabecera"><h2><strong>Actualización de un Empleado de la Empresa</strong></h2></div> 
    <div><input type="submit" class="bloque_opciones" value="OPCIONES" onclick="llamada()"></div>
    <div><input type="submit" class="bloque_opciones" value="BÚSQUEDA" onclick="location.href='../001_Busqueda/busquedaPHP.php'"></div>
    <div><input type="submit" class="bloque_opciones" value="INSERCCIÓN" onclick="location.href='../002_Inserccion/inserccionPHP.php'"></div>
    <div><input type="submit" class="bloque_opciones" value="ACTUALIZACIÓN" onclick="location.href='../003_Actualizacion/actualizacionPHP.php'"></div>  
    <div><input type="submit" class="bloque_opciones" value="ELIMINACIÓN" onclick="location.href='../004_Eliminacion/eliminacionPHP.php'"></div>   
    <div class="consulta">
        <?php
            echo "<br>";
            echo "<table style='margin-top: 60px; width:80%; margin-left: 10%'>";
            echo "<tr style='background-color:rgb(239,255,90)'>
                    <td><strong>ID</strong></td>
                    <td><strong>NOMBRE</strong></td>
                    <td><strong>APELLIDOS</strong></td>
                    <td><strong>DIRECCIÓN</strong></td>
                    <td><strong>POBLACIÓN</strong></td>
                    <td><strong>PROFESIÓN</strong></td>
                    <td><strong>AHORROS</strong></td>
                  </tr>";
            //Se va rellenando la tabla espontáneamente segun los registros encontrados en la BBDD
            echo "<tr style='background-color:rgb(239,255,90)'>
                    <td><strong>".$LECTURA["RegID"]."</strong></td>
                    <td><strong>".$LECTURA["RegNombre"]."</strong></td>
                    <td><strong>".$LECTURA["RegApellidos"]."</strong></td>
                    <td><strong>".$LECTURA["RegDireccion"]."</strong></td>
                    <td><strong>".$LECTURA["RegPoblacion"]."</strong></td>
                    <td><strong>".$LECTURA["RegProfesion"]."</strong></td>
                    <td><strong>".$LECTURA["RegAhorros"]."</strong></td>
                  </tr>";
            echo "<tr style='background-color:rgb(239,255,90)'>
                    <td><strong>".$LECTURA["RegID"]."</strong></td>
                    <td><strong>".$ESCRITURA["RegNombre"]."</strong></td>
                    <td><strong>".$ESCRITURA["RegApellidos"]."</strong></td>
                    <td><strong>".$ESCRITURA["RegDireccion"]."</strong></td>
                    <td><strong>".$ESCRITURA["RegPoblacion"]."</strong></td>
                    <td><strong>".$ESCRITURA["RegProfesion"]."</strong></td>
                    <td><strong>".$ESCRITURA["RegAhorros"]."</strong></td>
                    </tr>";
        echo "</table>" 
        ?>
        <form action="../003_Actualizacion/actualizacionPHP-Actualizado.php" method="GET">
            <input type="submit" name="modificar" value="MODIFICAR" style="width:100px; height:20px; margin-top:30px; margin-left:72%">
        </form>
    </div>
    <script>
        function tablaColor()
        {
            var cambia=document.getElementsByClassName("consulta")
            cambia[0].addEventListener("mouseenter",function(){
                cambia[0].style.transitionDuration = "0.5s";
                cambia[0].style.backgroundColor="yellow";
            })
            cambia[0].addEventListener("mouseleave",function(){
                cambia[0].style.transitionDuration = "0.5s";
                cambia[0].style.backgroundColor="white";
            })        
        }
    </script>
</body>
</html>