<?php
session_start();
require "../../005_Login/conexionPHP.php";
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
$conexionServicios=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();

//CASO DE QUE EL AREA SEA DE ASTRONOMIA
if(isset($_GET["ASTRONOMIA"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE SERVICIOS
    $consultaVentas=$conexionServicios->query("SELECT * FROM $BD_tabla WHERE DESTINO='SERVICIOS' AND SECTOR='ASTRONOMIA'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDSERV"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBRESERV"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORSERV"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKSERV"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTESERV"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETSERV"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php");
}
//CASO DE QUE EL AREA SEA DE AUTOMATIZACION
if(isset($_GET["AUTOMATIZACION"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE SERVICIOS
    $consultaVentas=$conexionServicios->query("SELECT * FROM $BD_tabla WHERE DESTINO='SERVICIOS' AND SECTOR='AUTOMATIZACION'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDSERV"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBRESERV"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORSERV"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKSERV"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTESERV"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETSERV"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php");
}
//CASO DE QUE EL AREA SEA DE ECOLOGIA
if(isset($_GET["ECOLOGIA"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE SERVICIOS
    $consultaVentas=$conexionServicios->query("SELECT * FROM $BD_tabla WHERE DESTINO='SERVICIOS' AND SECTOR='ECOLOGIA'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDSERV"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBRESERV"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORSERV"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKSERV"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTESERV"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETSERV"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php");
}
//CASO DE QUE EL AREA SEA DE INFRAESTRUCTURAS
if(isset($_GET["INFRAESTRUCTURAS"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE SERVICIOS
    $consultaVentas=$conexionServicios->query("SELECT * FROM $BD_tabla WHERE DESTINO='SERVICIOS' AND SECTOR='INFRAESTRUCTURAS'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDSERV"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBRESERV"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORSERV"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKSERV"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTESERV"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETSERV"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php");
}
//CASO DE QUE EL AREA SEA DE MEDICINA
if(isset($_GET["MEDICINA"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE SERVICIOS
    $consultaVentas=$conexionServicios->query("SELECT * FROM $BD_tabla WHERE DESTINO='SERVICIOS' AND SECTOR='MEDICINA'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDSERV"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBRESERV"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORSERV"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKSERV"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTESERV"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETSERV"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php");
}
//CASO DE QUE EL AREA SEA DE OCEANOGRAFIA
if(isset($_GET["OCEANOGRAFIA"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE SERVICIOS
    $consultaVentas=$conexionServicios->query("SELECT * FROM $BD_tabla WHERE DESTINO='SERVICIOS' AND SECTOR='OCEANOGRAFIA'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDSERV"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBRESERV"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORSERV"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKSERV"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTESERV"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETSERV"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php");
}
//CASO DE QUE EL AREA SEA DE TELECOMUNICACIONES
if(isset($_GET["TELECOMUNICACIONES"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE SERVICIOS
    $consultaVentas=$conexionServicios->query("SELECT * FROM $BD_tabla WHERE DESTINO='SERVICIOS' AND SECTOR='TELECOMUNICACIONES'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDSERV"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBRESERV"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORSERV"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKSERV"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTESERV"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETSERV"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php");
}
//CASO DE QUE EL AREA SEA DE EDUCACION
if(isset($_GET["EDUCACION"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE SERVICIOS
    $consultaVentas=$conexionServicios->query("SELECT * FROM $BD_tabla WHERE DESTINO='SERVICIOS' AND SECTOR='EDUCACION'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDSERV"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBRESERV"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORSERV"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKSERV"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTESERV"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETSERV"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php");
}
if(!empty($_GET["ID"]))
{
    $ID=$_GET["ID"];
    //Se guarda el destino de la carpeta de los productos del servidor
    $carpeta_destino="../../009_SectorPublico/0094_PaginaServicios/servicesImages/";
    $_SESSION["DESTINO"]=$carpeta_destino;
    //Se realiza la consulta correspondiente
    $consultaVentas=$conexionServicios->query("SELECT * FROM $BD_tabla WHERE ID='$ID'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $numeroServicios=$consultaVentas->rowCount();
    foreach($resultadoVentas as $cargaVentas)
    {
        if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
        {
            $_SESSION["ID_SERV"]=$cargaVentas->ID;
            $_SESSION["NOMBRE_SERV"]=$cargaVentas->NOMBRE;
            $_SESSION["SECTOR_SERV"]=$cargaVentas->SECTOR;
            $_SESSION["STOCK_SERV"]=$cargaVentas->STOCK;
            $_SESSION["COSTE_SERV"]=$cargaVentas->COSTE;
            $_SESSION["DETALLES_SERV"]=$cargaVentas->DETALLES;
        }
    }
    if($numeroServicios<1)
    {
        //NO se han encontrado productos con ese ID
        header("location:../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php");
    }
    if($numeroServicios>0)
    {
        //SI se han encontrado productos con ese ID
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        if(strcmp($_SESSION["SECTOR_SERV"],"ASTRONOMIA")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_SERV"],"AUTOMATIZACION")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_SERV"],"ECOLOGIA")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_SERV"],"INFRAESTRUCTURAS")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_SERV"],"MEDICINA")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_SERV"],"OCEANOGRAFIA")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_SERV"],"TELECOMUNICACIONES")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_SERV"],"EDUCACION")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        header("location:../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php");
    }
}
?>