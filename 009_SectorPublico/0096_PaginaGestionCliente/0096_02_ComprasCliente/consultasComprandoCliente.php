<?php
//error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
session_start();
require "../../../005_Login/conexionPHP.php";
$conexionClientes=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaClientes();

//CARGA NATURAL TRAS CARGAR LA MISMA PAGINA WEB
$usuario="Juan Perez"; //$_SESSION["usuario"];
$conectar=$conexionClientes->query("SELECT NOMBRE,NUMERO,TELEFONO,DIRECCION,CORREO FROM $BD_tabla WHERE NOMBRE='$usuario'");
$datosPersonales=$conectar->fetchAll(PDO::FETCH_OBJ);
    foreach($datosPersonales as $puntero)
    {
        $_SESSION["nombreCompra"]=$puntero->NOMBRE;
        $_SESSION["numeroCompra"]=$puntero->NUMERO;
        $_SESSION["telefonoCompra"]=$puntero->TELEFONO;
        $_SESSION["direccionCompra"]=$puntero->DIRECCION;
        $_SESSION["correoCompra"]=$puntero->CORREO;
    }
$conectar->closeCursor();   //Para habilitar las siguientes busquedas

if(isset($_POST["cargar"]))
{ 
    //Primero se hace un sondeo de la cantidad de referencias que se han detectado de compras
    $usuario="Juan Perez"; //$_SESSION["usuario"];
    $conectar=$conexionClientes->query("SELECT CONCEPTO,DEPARTAMENTO,CANTIDAD,COSTE_UNITARIO,COSTE_TOTAL,FECHA_PEDIDO,REFERENCIA,ENTREGADO FROM $BD_tabla WHERE NOMBRE='$usuario'");
    $datosPersonales=$conectar->fetchAll(PDO::FETCH_OBJ);
    $conectar->closeCursor();

    //Segundo se descargan las compras realizadas por el usuario mencionado
    $encontrado=$conectar->rowCount();
    $i=0; //puntero de relleno de la descarga de las compras
    if($encontrado>0)
    {
        //Tercero se hace una descarga de todas las fechas de pedidos realizadas para la generación del registro
        $conectarRef=$conexionClientes->query("SELECT REFERENCIA FROM $BD_tabla WHERE NOMBRE='$usuario'");
        $datosRefer=$conectarRef->fetchAll(PDO::FETCH_OBJ);
        $conectarRef->closeCursor();
        foreach($datosRefer as $datosR)
        {
            $_SESSION["referenciaR"][$i]=$datosR->REFERENCIA;
            $i++; //Para guardar el siguiente elemento
        }
        //Cuarto LOS PRODUCTOS BAJO UNA MISMA REFERENCIA
        foreach($datosPersonales as $datosFilas)
        {
            $_SESSION["conceptoC"][$i]=$datosFilas->CONCEPTO;
            $_SESSION["departamentoC"][$i]=$datosFilas->DEPARTAMENTO;
            $_SESSION["cantidadC"][$i]=$datosFilas->CANTIDAD;
            $_SESSION["costeUC"][$i]=$datosFilas->COSTE_UNITARIO;
            $_SESSION["costeTC"][$i]=$datosFilas->COSTE_TOTAL;
            $_SESSION["fechaPedidoC"][$i]=$datosFilas->FECHA_PEDIDO;
            $_SESSION["referenciaC"][$i]=$datosFilas->REFERENCIA;
            $_SESSION["entregadoC"][$i]=$datosFilas->ENTREGADO;
            $i++;
        }
        $_SESSION["despliegue"]=1;   //Mostrar la cantidad de compras que se han realizado
        $_SESSION["activadorPersonal"]=1; //Compras registradas exitosamente
        header("Location:../../../009_SectorPublico/0096_PaginaGestionCliente/0096_02_ComprasCliente/comprandoCliente.php");
    }
    else
    {
        $_SESSION["activadorPersonal"]=2; //No hay compras registradas en la BBDD
        header("Location:../../../009_SectorPublico/0096_PaginaGestionCliente/0096_02_ComprasCliente/comprandoCliente.php");
    }
}
if(isset($_POST["volver"]))
{
    //EN CASO DE TENER QUE VOLVER
    $_SESSION["activadorPersonal"]=0; //NO SE ACTIVA NINGUNA INFORMACIÓN NI LETRERO
    header("location:../../../../007_Menus/0074_MenuOpCLIENTES/OpCLIENTES.php");
}
?>