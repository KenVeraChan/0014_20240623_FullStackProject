<?php
    require "../../005_Login/conexionPHP.php";
    error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
    $_SESSION["PUNTERO"];
    $conexion=ConexionPHP::getConexionCLIENTES();   //Ahora se necesita la conexión con la BBDD de los clientes
    $BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();
    //FICHERO PRINCIPAL DE INICIO DE EJECUCIÓN BACKEND
    //Se le comunica al servidor a dónde se quieren subir las imagenes, LA RUTA
    $carpeta_destino=$_SERVER["DOCUMENT_ROOT"].'/009_SectorPublico/0091_PaginaPrincipal/sliderImages/';
    $consulta=$conexion->query("SELECT NOMBRE,DESTINO FROM $BD_tabla WHERE DESTINO='SLIDER' OR DESTINO='NOVEDADES'"); //SELECCIONA SLIDER O NOVEDADES UNICAMENTE
    $resultado=$consulta->fetchAll(PDO::FETCH_OBJ);
    $i=0; //Puntero de recorrido del ARRAY SLIDER
    $j=0; //Puntero de recorrido del ARRAY NOVEDADES
    foreach($resultado as $carga)
    {
        if(isset($carga->NOMBRE))
        {
            if(strcmp($carga->DESTINO,"SLIDER")==0)
            {
                $_SESSION["NOMBRESLIDER"][$i]=$carga->NOMBRE;
                $i++;
            }
            if(strcmp($carga->DESTINO,"NOVEDADES")==0)
            {
                $_SESSION["NOVEDADES"][$j]=$carga->NOMBRE;
                $j++;
            }
        }
    }
    if(isset($_GET["pasaIzquierda"]))
    {
        session_start();
        if($_SESSION["PUNTERO"]<1)
        {
            $_SESSION["PUNTERO"]=count($_SESSION["NOMBRESLIDER"])-1;
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
        if($_SESSION["PUNTERO"]>count($_SESSION["NOMBRESLIDER"])-2)
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

    function extraccionNovedad($eleccion)
    {
        switch($eleccion)
        {
            case 1:
                {
                    $valor=array_search("NOVEDADES.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 2:
                {
                    $valor=array_search("NOTICIAS.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 3:
                {
                    $valor=array_search("SERVICIOS.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 4:
                {
                    $valor=array_search("PRODUCTOS.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 5:
                {
                    $valor=array_search("SERVIDORES.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 6:
                {
                    $valor=array_search("DINERO.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 7:
                {
                    $valor=array_search("INVESTIGACION.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 8:
                {
                    $valor=array_search("BASURA.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 9:
                {
                    $valor=array_search("BARCO.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 10:
                {
                    $valor=array_search("ANTENA.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 11:
                {
                    $valor=array_search("PLANETA.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 12:
                {
                    $valor=array_search("NATURALEZA.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 13:
                {
                    $valor=array_search("PIZARRA.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 14:
                {
                    $valor=array_search("HIELO.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 15:
                {
                    $valor=array_search("EDIFICIO.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            case 16:
                {
                    $valor=array_search("ROBOT.png",$_SESSION["NOVEDADES"],true);
                    break;
                }
            default:
                {
                    $valor=0;
                    break;
                }
        }
        return $_SESSION["NOVEDADES"][$valor];
    }
?>