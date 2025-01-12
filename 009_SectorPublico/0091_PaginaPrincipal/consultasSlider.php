<?php
    require "../../005_Login/conexionPHP.php";
    error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
    $conexion=ConexionPHP::getConexionCLIENTES();   //Ahora se necesita la conexión con la BBDD de los clientes
    $BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();
    //FICHERO PRINCIPAL DE INICIO DE EJECUCIÓN BACKEND
    //Se le comunica al servidor a dónde se quieren subir las imagenes, LA RUTA
    $carpeta_destino=$_SERVER["DOCUMENT_ROOT"].'/009_SectorPublico/0091_PaginaPrincipal/sliderImages/';
    $consulta=$conexion->query("SELECT NOMBRE,DESTINO,DETALLES FROM $BD_tabla WHERE DESTINO='SLIDER' OR DESTINO='NOVEDADES'"); //SELECCIONA SLIDER O NOVEDADES UNICAMENTE
    $resultado=$consulta->fetchAll(PDO::FETCH_OBJ);
    $i=0; //Puntero de recorrido del ARRAY SLIDER
    $j=0; //Puntero de recorrido del ARRAY NOVEDADES
    foreach($resultado as $carga)
    {
        if(isset($carga->NOMBRE))
        {
            if(strcmp($carga->DESTINO,"SLIDER")==0)
            {
                $_SESSION["NOMBRESLIDER"][$i]=$carga->NOMBRE;  //Descarga las imágenes del SLIDER PRINCIPAL
                $i++;
            }
            if(strcmp($carga->DESTINO,"NOVEDADES")==0)
            {
                $_SESSION["NOVEDADES"][$j]=$carga->NOMBRE;    //Descarga las imágenes PNG o JPG de las NOVEDADES
                $_SESSION["DETALLESNOVED"][$j]=$carga->DETALLES;   //Descarga los párrafos detalles de las NOVEDADES
                $j++;
            }
        }
    }
    function extraccionNovedad($eleccion,$modalidad)
    {
        if($modalidad==1)
        {
            //Devuelve la imagen correspondiente al puntero señalando a la casilla $eleccion del ARRAY NOVEDADES
            return $_SESSION["NOVEDADES"][$eleccion];
        }
        if($modalidad==2)
        {
            //Devuelve el título correspondiente al puntero señalando a la casilla $eleccion del ARRAY NOVEDADES
            //Pero hay que eliminar el formato de la imagen para que sólo quede el título
            return strtoupper(str_replace(substr($_SESSION["NOVEDADES"][$eleccion],-4,4),'',$_SESSION["NOVEDADES"][$eleccion]));
        }
        if($modalidad==3)
        {
            //Devuelve el párrafo correspondiente al puntero señalando a la casilla $eleccion del ARRAY NOVEDADES
            //Que corresponde con la descripción del contenido de la novedades seleccionada
            return $_SESSION["DETALLESNOVED"][$eleccion];
        }       
    }
?>