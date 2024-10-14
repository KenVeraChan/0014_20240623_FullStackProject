<?php
    require "../../005_Login/conexionPHP.php";
    error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
    //error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
    $conexion=ConexionPHP::getConexionCLIENTES();   //Ahora se necesita la conexión con la BBDD de los clientes
    $BD_tabla=ConexionPHP::getBD_TablaHistoria();
    //GENERA LA CONSULTA
    $consultaHistoria=$conexion->query("SELECT * FROM $BD_tabla");
    $resultado=$consultaHistoria->fetchAll(PDO::FETCH_OBJ);
    $i=0; //Puntero de recorrido del ARRAY
    foreach($resultado as $carga)
    {
        if(isset($carga->ID) && isset($carga->FECHA) && isset($carga->DECADA) && isset($carga->SUCESO))
        {
            $_SESSION["ID"][$i]=$carga->ID;
            $_SESSION["FECHA"][$i]=$carga->FECHA;
            $_SESSION["DECADA"][$i]=$carga->DECADA;
            $_SESSION["SUCESO"][$i]=$carga->SUCESO;
            $i++;
        }
    }
    if(isset($_GET["id"]) && $_GET["id"]>=0 && $_GET["id"]<=count($_SESSION["ID"]))
    {
        session_start();
        $_SESSION["fechado"]=$_SESSION["FECHA"][$_GET["id"]];
        $_SESSION["acontecimiento"]=$_SESSION["SUCESO"][$_GET["id"]];
        //REGRESA A LA PAGINA DE HISTORIA EMPRESARIAL
        header("location:../../009_SectorPublico/0092_PaginaHistoria/paginaHistoria.php");
    }
?>