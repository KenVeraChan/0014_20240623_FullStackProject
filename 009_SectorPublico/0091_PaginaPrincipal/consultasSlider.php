<?php
    require "../../005_Login/conexionPHP.php";
    $conexion=ConexionPHP::getConexionCLIENTES();   //Ahora se necesita la conexión con la BBDD de los clientes
    $BD_tabla=ConexionPHP::getBD_TablaSlider();
    //FICHERO PRINCIPAL DE INICIO DE EJECUCIÓN BACKEND
    //Se le comunica al servidor a dónde se quieren subir las imagenes, LA RUTA
    $carpeta_destino=$_SERVER["DOCUMENT_ROOT"].'/009_SectorPublico/0091_PaginaPrincipal/sliderImages/';
    $consulta=$conexion->query("SELECT ID,NOMBRE FROM $BD_tabla WHERE DESTINO='SLIDER'");
    $resultado=$consulta->fetchAll(PDO::FETCH_OBJ);
    $i=0; //Puntero de recorrido del ARRAY
    foreach($resultado as $carga)
    {
        $_SESSION["ID"][$i]=$carga->ID;
        $_SESSION["NOMBRE"][$i]=$carga->NOMBRE;
        $i++;
    }
    if(isset($_GET["pasaIzquierda"]))
    {
        session_start();
        if($_SESSION["PUNTERO"]<0)
        {
            $_SESSION["PUNTERO"]=count($_SESSION["NOMBRE"])-1;
            header("location:../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php");
        }
        else{
            $_SESSION["PUNTERO"]--;
            header("location:../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php");
        }
    }
    if(isset($_GET["pasaDerecha"]))
    {
        session_start();
        if($_SESSION["PUNTERO"]>count($_SESSION["NOMBRE"])-1)
        {
            $_SESSION["PUNTERO"]=0;
            header("location:../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php");
        }
        else
        {
            $_SESSION["PUNTERO"]++;
            header("location:../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php");
        }
    }
?>