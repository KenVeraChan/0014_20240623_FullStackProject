<?php
require "../../../005_Login/conexionPHP.php";
$conexionClientes=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaClientes();
$BD_tablaLogin=ConexionPHP::getBD_TablaIDClientes();
$BD_tablaBanco=ConexionPHP::getBD_DatosBancarios();

//CARGA NATURAL TRAS CARGAR LA MISMA PAGINA WEB
$usuario=$_SESSION["usuario"];
$conectar=$conexionClientes->query("SELECT USUARIO,(SELECT NUMERO FROM $BD_tablaBanco WHERE NOMBRE=IDENTIDAD.USUARIO) AS CUENTA,TELEFONO,DIRECCION,CORREO FROM $BD_tablaLogin AS IDENTIDAD WHERE USUARIO='$usuario'");
$datosPersonales=$conectar->fetchAll(PDO::FETCH_OBJ);
    foreach($datosPersonales as $puntero)
    {
        $_SESSION["nombreCompra"]=$puntero->USUARIO;
        $_SESSION["numeroCompra"]=$puntero->CUENTA;
        $_SESSION["telefonoCompra"]=$puntero->TELEFONO;
        $_SESSION["direccionCompra"]=$puntero->DIRECCION;
        $_SESSION["correoCompra"]=$puntero->CORREO;
    }
$conectar->closeCursor();   //Para habilitar las siguientes busquedas

if(isset($_POST["cargar"]))
{ 
    session_start();   //Se pone aqui para no interferir con la primera carga de la pagina web
    //Primero se hace un sondeo de la cantidad de referencias que se han detectado de compras
    $usuario=$_SESSION["usuario"];
    $conectar=$conexionClientes->query("SELECT CONCEPTO,DEPARTAMENTO,CANTIDAD,COSTE_UNITARIO,COSTE_TOTAL,FECHA_PEDIDO,REFERENCIA,ENTREGADO FROM $BD_tabla WHERE NOMBRE='$usuario' ORDER BY REFERENCIA ASC");
    $datosPersonales=$conectar->fetchAll(PDO::FETCH_OBJ);
    //Segundo se descargan las compras realizadas por el usuario mencionado
    $encontrado=$conectar->rowCount();
    $conectar->closeCursor();
    if($encontrado>0)
    {
        $i=0; //puntero de relleno de la descarga de las compras
        //Tercero se hace una descarga de todas las fechas de pedidos realizadas para la generación del registro
        $conectarRef=$conexionClientes->query("SELECT REFERENCIA FROM $BD_tabla WHERE NOMBRE='$usuario' GROUP BY REFERENCIA ORDER BY REFERENCIA ASC");
        $datosRefer=$conectarRef->fetchAll(PDO::FETCH_OBJ);
        $conectarRef->closeCursor();
        foreach($datosRefer as $datosR)
        {
            $_SESSION["referenciaBorrador"][$i]=$datosR->REFERENCIA;
            $i++; //Para guardar el siguiente elemento
        }
        //Se procede a filtar la matriz extraida de la BBDD para que solo se queden las REFERENCIAS de compras únicas
        $_SESSION["referenciaR"]=array_unique( $_SESSION["referenciaBorrador"]);
        //Cuarto LOS PRODUCTOS BAJO UNA MISMA REFERENCIA
        $i=0;  //Reiniciando variable puntero
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
    session_start();   //Se pone aqui para no interferir con la primera carga de la pagina web
    //EN CASO DE TENER QUE VOLVER
    $_SESSION["activadorPersonal"]=0; //NO SE ACTIVA NINGUNA INFORMACIÓN NI LETRERO
    header("location:../../../../007_Menus/0074_MenuOpCLIENTES/OpCLIENTES.php");
}

//Para la gestión de cada compra en conabilidad por departamentos y coste desde cada uno de ellos
class tipoDepartamento
{
    private static $productos=0;
    private static $costeProductos=0;
    private static $servicios=0;
    private static $costeServicios=0;
    private static $proyectos=0;
    private static $costeProyectos=0;
    function __construct()
    {
        //No hace nada
    }
    public function getVentaRealizada($ventaRealizada,$costeVentaRealizada):void
    {
        if(strcmp($ventaRealizada,"PRODUCTOS")==0)  //Contabilidad de PRODUCTOS comprados
        {
            Self::$productos++;
            Self::$costeProductos+=+$costeVentaRealizada;  //Se incrementa la cantidad del presente departamento en donde se ha hecho la venta
        }
        if(strcmp($ventaRealizada,"SERVICIOS")==0)  //Contabilidad de PRODUCTOS comprados
        {
            Self::$servicios++;
            Self::$costeServicios+=+$costeVentaRealizada;  //Se incrementa la cantidad del presente departamento en donde se ha hecho la venta
        }
        if(strcmp($ventaRealizada,"PROYECTOS")==0)  //Contabilidad de PRODUCTOS comprados
        {
            Self::$proyectos++;
            Self::$costeProyectos+=+$costeVentaRealizada;  //Se incrementa la cantidad del presente departamento en donde se ha hecho la venta
        }
    }
    public function contadorProductos()
    {
        return Self::$productos;
    }
    public function contadorServicios()
    {
        return Self::$servicios;
    }
    public function contadorProyectos()
    {
        return Self::$proyectos;
    }
    public function costeTotalProductos()
    {
        return Self::$costeProductos;
    }
    public function costeTotalServicios()
    {
        return Self::$costeServicios;
    }
    public function costeTotalProyectos()
    {
        return Self::$costeProyectos;
    }
    public function costesCompletos()
    {
        return Self::$costeProductos+Self::$costeServicios+self::$costeProyectos;
    }
    public function costesCompletosConIVA()
    {
        return (Self::$costeProductos+Self::$costeServicios+self::$costeProyectos)*1.21;
    }
    public function borrarResultados()
    {
        Self::$productos=0;
        Self::$servicios=0;
        Self::$proyectos=0;
        Self::$costeProductos=0;
        Self::$costeServicios=0;
        Self::$costeProyectos=0;
    }
}
?>