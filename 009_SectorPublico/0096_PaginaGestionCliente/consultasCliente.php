<?php
session_start();
//error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
require "../../005_Login/conexionPHP.php";
$conexionProductos=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();
$BD_tablaCarrito=ConexionPHP::getBD_TablaCarrito();

// ----- SECTOR DE PAGINA PRODUCTOS COMPLETA ------ //

if(isset($_GET["comprar"]))
{
//PRIMERO SE CONSULTA EN LA TABLA OFICIAL DE PRODUCTOS EL ID SOLICITADO (con = consulta)
//TABLA DE PRODUCTOS OFICIAL
$idCarrito=$_GET["comprar"];
$cantidadCarrito=$_GET["cantidad"];
$consCarrito=$conexionProductos->query("SELECT * FROM $BD_tabla WHERE ID='$idCarrito'");
$resCarrito=$consCarrito->fetchAll(PDO::FETCH_OBJ);
    //DESCARGA DATOS DE LA CONSULTA
    foreach($resCarrito as $cargaCarrito)
    {
        if(isset($cargaCarrito->ID))
        {
            $_SESSION["IDCARRITO"]=$cargaCarrito->ID;
            $_SESSION["NOMBRECARRITO"]=substr($cargaCarrito->NOMBRE,0,-4);
            $_SESSION["DESTINOCARRITO"]=$cargaCarrito->DESTINO;
            $_SESSION["COSTECARRITO"]=$cargaCarrito->COSTE;
        }
    }
$consCarrito->closeCursor(); //Cierra la conexion y la consulta

//SEGUNDO SE SE CONSULTA EN LA BBDD DEL CARRITO SI YA SE HABIA AÑADIDO EL PRODUCTO SELECCIONADO (com = comprueba)
//TABLA DEL CARRITO TEMPORAL
$idCarrito=$_SESSION["IDCARRITO"];
$nombreCarrito=$_SESSION["NOMBRECARRITO"];
$destinoCarrito=$_SESSION["DESTINOCARRITO"];
$costeCarrito=$_SESSION["COSTECARRITO"];

    if($_GET["cantidad"]!="")
    {
        // DA IGUAL SI EL PRODUCTO SE AÑADE POR PRIMEA VEZ (PORQUE NO ESTABA ANTES) SE AÑADE AL CARRITO IGUALMENTE Y LUEGO SE HACE EL CONTAJE FINAL
        $costeCarritoTotal=$costeCarrito*$cantidadCarrito;
        $comCarrito=$conexionProductos->query("INSERT INTO $BD_tablaCarrito(ID,NOMBRE,DEPARTAMENTO,CANTIDAD,COSTE_UNITARIO,COSTE_TOTAL)VALUES('$idCarrito','$nombreCarrito','$destinoCarrito','$cantidadCarrito','$costeCarrito','$costeCarritoTotal')");
        $comCarrito->closeCursor();
        $_SESSION["senalCarrito"]=1;  //Activa la señal de que si fue especificada la cantidad comprada
    }
    if($_GET["cantidad"]=="")
    {
        //No hace ninguna ejecución mas con ninguna consulta
        $_SESSION["senalCarrito"]=2;  //Activa la señal de que no se ha especificado la cantidad comprada
    }
        //REGRESA A LA PAGINA DE PRODUCTOS
        if(strcmp($destinoCarrito,"PRODUCTOS")==0)
        {
            header("location:../../009_SectorPublico/0093_PaginaProductos/paginaProductos.php");
        }
        //REGRESA A LA PAGINA DE SERVICIOS
        if(strcmp($destinoCarrito,"SERVICIOS")==0)
        {
            header("location:../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php");
        }
        //REGRESA A LA PAGINA DE PROYECTOS
        if(strcmp($destinoCarrito,"PROYECTOS")==0)
        {
            header("location:../../009_SectorPublico/0095_PaginaProyectos/paginaProyectos.php");
        }
}
if(isset($_GET["descargar"]))
{
//PRIMERO SE CONSULTA EN LA TABLA OFICIAL DEL CARRITO DE LA COMPRA DEL CLIENTE ANONIMO (PRODUCTOS, SERVICIOS, PROYECTOS)
//TABLA DEL CARRITO OFICIAL

$consCarrito=$conexionProductos->query("SELECT * FROM $BD_tablaCarrito");
$carritoCompras=$consCarrito->fetchAll(PDO::FETCH_OBJ);
$numeroCompras=$consCarrito->rowCount();

    if($numeroCompras==0)
    {
        $_SESSION["senalCarrito"]=1;  //Señal de que NO se han encontrado datos descargados del carrito de la compra del cliente
        $consCarrito->closeCursor(); //Cierra la conexion y la consulta
        header("location:../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php");
    }
    if($numeroCompras>0)
    {
        $i=0;   //Puntero de recolecta de datos de la BBDD del servidor
        //DESCARGA DATOS DE LA CONSULTA
        foreach($carritoCompras as $cargas)
        {
            if(isset($cargas->ID) && isset($cargas->NOMBRE))
            {
            $_SESSION["IDC"][$i]=$cargas->ID;
            $_SESSION["NOMBREC"][$i]=$cargas->NOMBRE;
            $_SESSION["DEPARTAMENTOC"][$i]=$cargas->DEPARTAMENTO;
            $_SESSION["CANTIDADC"][$i]=$cargas->CANTIDAD;
            $_SESSION["COSTEUNITC"][$i]=$cargas->COSTE_UNITARIO;
            $_SESSION["COSTETOTC"][$i]=$cargas->COSTE_TOTAL;
            $i++;  //Para el siguiente conjunto de datos guardado
            }
        }
        $consCarrito->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["senalCarrito"]=2;  //Señal de que SI se han encontrado datos descargados del carrito de la compra del cliente
        header("location:../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php");
    }
}
// ------- SECTOR DE PAGINA COMPRAS CLIENTE COMPLETA -------- //
//SE CARGARAN TODOS LOS DATOS DE CADA UNO DE LOS TRES DEPARTAMENTOS EN LOS QUE SE HA HECHO COMPRA (PRODUCTOS, SERVICIOS, PROYECTOS)
// Y SE ORDENDARÁN EN UNA TABLA JUNTANDO COMPRAS QUE TENGAN ID IGUALES PARA SIMPLFICAR LA PARTE DE LA FACTURA
?>