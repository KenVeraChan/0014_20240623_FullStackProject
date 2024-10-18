<?php
session_start();
require "../../005_Login/conexionPHP.php";
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
$conexionProyectos=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();

//CASO DE QUE EL AREA SEA DE AGRICULTURA
if(isset($_GET["AGRICULTURA"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PROYECTOS
    $consultaVentas=$conexionProyectos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PROYECTOS' AND SECTOR='AGRICULTURA'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDPROY"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBREPROY"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORPROY"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKPROY"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTEPROY"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETPROY"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0095_PaginaProyectos/paginaProyectos.php");
}
//CASO DE QUE EL AREA SEA DE ATMOSFERA
if(isset($_GET["ATMOSFERA"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PROYECTOS
    $consultaVentas=$conexionProyectos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PROYECTOS' AND SECTOR='ATMOSFERA'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDPROY"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBREPROY"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORPROY"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKPROY"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTEPROY"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETPROY"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0095_PaginaProyectos/paginaProyectos.php");
}
//CASO DE QUE EL AREA SEA DE CARRETERAS
if(isset($_GET["CARRETERAS"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PROYECTOS
    $consultaVentas=$conexionProyectos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PROYECTOS' AND SECTOR='CARRETERAS'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDPROY"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBREPROY"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORPROY"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKPROY"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTEPROY"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETPROY"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0095_PaginaProyectos/paginaProyectos.php");
}
//CASO DE QUE EL AREA SEA DE COLONIZACION
if(isset($_GET["COLONIZACION"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PROYECTOS
    $consultaVentas=$conexionProyectos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PROYECTOS' AND SECTOR='COLONIZACION'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDPROY"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBREPROY"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORPROY"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKPROY"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTEPROY"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETPROY"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0095_PaginaProyectos/paginaProyectos.php");
}
//CASO DE QUE EL AREA SEA DE METEORITO
if(isset($_GET["METEORITO"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PROYECTOS
    $consultaVentas=$conexionProyectos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PROYECTOS' AND SECTOR='METEORITO'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDPROY"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBREPROY"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORPROY"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKPROY"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTEPROY"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETPROY"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0095_PaginaProyectos/paginaProyectos.php");
}
//CASO DE QUE EL AREA SEA DE PROFUNDIDADES
if(isset($_GET["PROFUNDIDADES"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PROYECTOS
    $consultaVentas=$conexionProyectos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PROYECTOS' AND SECTOR='PROFUNDIDADES'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDPROY"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBREPROY"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORPROY"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKPROY"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTEPROY"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETPROY"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0095_PaginaProyectos/paginaProyectos.php");
}
//CASO DE QUE EL AREA SEA DE PROGRAMACION
if(isset($_GET["PROGRAMACION"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PROYECTOS
    $consultaVentas=$conexionProyectos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PROYECTOS' AND SECTOR='PROGRAMACION'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDPROY"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBREPROY"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORPROY"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKPROY"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTEPROY"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETPROY"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0095_PaginaProyectos/paginaProyectos.php");
}
//CASO DE QUE EL AREA SEA DE SUBMARINISMO
if(isset($_GET["SUBMARINISMO"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PROYECTOS
    $consultaVentas=$conexionProyectos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PROYECTOS' AND SECTOR='SUBMARINISMO'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDPROY"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBREPROY"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORPROY"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKPROY"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTEPROY"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETPROY"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0095_PaginaProyectos/paginaProyectos.php");
}

if(!empty($_GET["ID"]))
{
    $ID=$_GET["ID"];
    //Se guarda el destino de la carpeta de los productos del servidor
    $carpeta_destino="../../009_SectorPublico/0095_PaginaProyectos/projectsImages/";
    $_SESSION["DESTINOPROY"]=$carpeta_destino;
    //Se realiza la consulta correspondiente
    $consultaVentas=$conexionProyectos->query("SELECT * FROM $BD_tabla WHERE ID='$ID'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $numeroProyectos=$consultaVentas->rowCount();
    foreach($resultadoVentas as $cargaVentas)
    {
        if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
        {
            $_SESSION["ID_PROY"]=$cargaVentas->ID;
            $_SESSION["NOMBRE_PROY"]=$cargaVentas->NOMBRE;
            $_SESSION["SECTOR_PROY"]=$cargaVentas->SECTOR;
            $_SESSION["STOCK_PROY"]=$cargaVentas->STOCK;
            $_SESSION["COSTE_PROY"]=$cargaVentas->COSTE;
            $_SESSION["DETALLES_PROY"]=$cargaVentas->DETALLES;
        }
    }
    if($numeroProyectos<1)
    {
        //NO se han encontrado productos con ese ID
        $_SESSION["concesion"]=0;
        header("location:../../009_SectorPublico/0095_PaginaProyectos/paginaProyectos.php");
    }
    if($numeroProyectos>0)
    {
        //SI se han encontrado productos con ese ID
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        if(strcmp($_SESSION["SECTOR_PROY"],"AGRICULTURA")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_PROY"],"ATMOSFERA")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_PROY"],"CARRETERAS")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_PROY"],"COLONIZACION")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_PROY"],"METEORITO")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_PROY"],"PROFUNDIDADES")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_PROY"],"PROGRAMACION")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_PROY"],"SUBMARINISMO")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        header("location:../../009_SectorPublico/0095_PaginaProyectos/paginaProyectos.php");
    }
}
?>