<?php
session_start();
//error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
require "../../005_Login/conexionPHP.php";
$conexionProductos=ConexionPHP::getConexionCLIENTES();

$BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();   //Para la descarga de las imágenes de las compras en el carrito
$BD_tablaCarrito=ConexionPHP::getBD_TablaCarrito();     //Para la descarga de lo que hay en el carrito sin comprar
$BD_tablaDatosBancarios=ConexionPHP::getBD_DatosBancarios();  //Para la descarga de los datos bancarios
$BD_tablaLoginUsuario=ConexionPHP::getBD_TablaIDClientes();  //Para la descarga de datos personales
$BD_tablaPedidos=ConexionPHP::getBD_TablaClientes();   //Para la introduccion de las compras de un cliente

// ----- SECTOR DE PAGINA PRODUCTOS COMPLETA ------ //
// ----- TRAS HABER DADO A COMPRAR EN CUALQUIERA DE LAS PÁGINAS ANTERIORES: PRODUCTOS, SERVICIOS, PROYECTOS ------//

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
        $_SESSION["senalImagen"]=1;  //Activa la señal de que si fue especificada la cantidad comprada
    }
    if($_GET["cantidad"]=="" || $_GET["cantidad"]==0)
    {
        //No hace ninguna ejecución mas con ninguna consulta
        $_SESSION["senalImagen"]=2;  //Activa la señal de que no se ha especificado la cantidad comprada
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

// ----- BOTONES DE LA PROPIA PAGINA DE COMPRAS CLIENTE ------- //
if(isset($_GET["descargar"]))
{
    //ANTES DE NADA SE DESTRUYEN LAS VARIABLES QUE PUEDAN EXISTIR POR COMPLETO
        unset($_SESSION["IDC"]);
        unset($_SESSION["NOMBREC"]);
        unset($_SESSION["IMAGENC"]);
        unset($_SESSION["DEPARTAMENTOC"]);
        unset($_SESSION["CANTIDADC"]);
        unset($_SESSION["COSTEUNITC"]);
        unset($_SESSION["COSTETOTC"]);

    if($_GET["cantidad"]=="")   //NO SE HA MODIFICADO LA CANTIDAD ADICIONAL MODIFICADA EN LA CESTA DE LA COMPRA DE UN ELEMENTO INTRODUCIDO
    {
        //PRIMERO SE CONSULTA EN LA TABLA OFICIAL DEL CARRITO DE LA COMPRA DEL CLIENTE ANONIMO (PRODUCTOS, SERVICIOS, PROYECTOS)
        //TABLA DEL CARRITO OFICIAL
        $consCarrito=$conexionProductos->query("SELECT ID,NOMBRE,DEPARTAMENTO,SUM(CANTIDAD) AS CANTIDAD,COSTE_UNITARIO,ROUND(SUM(COSTE_TOTAL),2) AS COSTE_TOTAL FROM $BD_tablaCarrito GROUP BY NOMBRE");
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
                    if(strcmp( $cargas->DEPARTAMENTO,"PRODUCTOS")==0)
                    {
                        $_SESSION["IMAGENC"][$i]="../..".ConexionPHP::IR_RUTA_departamento(2).$_SESSION["NOMBREC"][$i].".png";
                    }
                    if(strcmp( $cargas->DEPARTAMENTO,"SERVICIOS")==0)
                    {
                        $_SESSION["IMAGENC"][$i]="../..".ConexionPHP::IR_RUTA_departamento(3).$_SESSION["NOMBREC"][$i].".png";
                    }
                    if(strcmp( $cargas->DEPARTAMENTO,"PROYECTOS")==0)
                    {
                        $_SESSION["IMAGENC"][$i]="../..".ConexionPHP::IR_RUTA_departamento(4).$_SESSION["NOMBREC"][$i].".png";
                    }
                    $i++;  //Para el siguiente conjunto de datos guardado
                }
            }
            $consCarrito->closeCursor(); //Cierra la conexion y la consulta
            $_SESSION["senalCarrito"]=2;  //Señal de que SI se han encontrado datos descargados del carrito de la compra del cliente
            header("location:../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php");
        }
    }
    if($_GET["cantidad"]==0)
    {

    }
    if($_GET["cantidad"]>0)
    {

        header("location:../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php");
    }
}
// ------- SECTOR DE PAGINA COMPRAS CLIENTE COMPLETA -------- //
//SE CARGARAN TODOS LOS DATOS DE CADA UNO DE LOS TRES DEPARTAMENTOS EN LOS QUE SE HA HECHO COMPRA (PRODUCTOS, SERVICIOS, PROYECTOS)
// Y SE ORDENDARÁN EN UNA TABLA JUNTANDO COMPRAS QUE TENGAN ID IGUALES PARA SIMPLFICAR LA PARTE DE LA FACTURA

if(isset($_GET["realizarCompra"]))
{
    if(isset($_SESSION["usuario"]))
    {
        //PRIMERO SE DESCARGA LA INFORMACIÓN DEL USUARIO: NUMERO DE TARJETA BANCARIA USUARIO
        $usuarioCompra=$_SESSION["usuario"];  //NOMBRE
        $consLogin=$conexionProductos->query("SELECT NUMERO FROM $BD_tablaDatosBancarios WHERE NOMBRE='$usuarioCompra'");
        $datoBancario=$consLogin->fetchAll(PDO::FETCH_OBJ);
        $datoContado=$consLogin->rowCount();

        if($datoContado==0)
        {
            $consLogin->closeCursor(); //Cierra la conexion y la consulta
            $_SESSION["senalCarrito"]=3;  //Señal de que NO SE HA REGISTRADO NINGUNA TARJETA DE PAGO DE COMPRAS
            header("location:../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php");
        }
        else
        {
            foreach($datoBancario as $dato)
            {
                $numeroBancario=$dato->NUMERO;  //NUMERO
            }
            $consLogin->closeCursor(); //Cierra la conexion y la consulta
            //SEGUNDO SE DESCARGA LA INFORMACIÓN DEL USUARIO: TELEFONO,DIRECCION,CORREO
            $consLogin=$conexionProductos->query("SELECT TELEFONO,DIRECCION,CORREO FROM $BD_tablaLoginUsuario WHERE USUARIO='$usuarioCompra'");
            $datosPersonales=$consLogin->fetchAll(PDO::FETCH_OBJ);
            $datoPersonalesContado=$consLogin->rowCount();
            if($datoPersonalesContado==0)
            {
                $consLogin->closeCursor(); //Cierra la conexion y la consulta
                $_SESSION["senalCarrito"]=4;  //Señal de que NO SE HA REGISTRADO NINGUNA TARJETA DE PAGO DE COMPRAS
                header("location:../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php");  
            }
            else
            {
                foreach($datosPersonales as $datoPersonal)
                {
                    $telefono=$datoPersonal->TELEFONO;  //NUMERO DE TELEFONO
                    $direccion=$datoPersonal->DIRECCION; //DIRECCION
                    $correo=$datoPersonal->CORREO;  //CORREO
                }
                $consLogin->closeCursor(); //Cierra la conexion y la consulta
                //TERCERO SE RELLENAN COHESIONANDOSE DATOS PERSONALES CON LA INFORMACIÓN DEL CARRITO DE LA COMPRA    
                //GUARDAR EN LA TABLA DE CLIENTES PEDIDOS LO QUE SE TUVO EN ESTE CARRITO
                //GESTION DE: FECHA, REFERENCIA Y PEDIDO
                $fechaHoy=date("Y-m-d");
                
                    //TRATAMIENTO DE EXTRACCIÓN DE LAS INICIALES DEL USUARIO: NOMBRE Y APELLIDOS
                    $re = "/\b(\w)[^\s]*\s*/m";
                    $subst = '$1';
                    $result = preg_replace($re, $subst, $usuarioCompra);

                    //TRATAMIENTO DE EXTRACCIÓN DE LOS ÚLTIMOS CUATRO NÚMEROS DEL TELÉFONO DEL USUARIO
                    $tel = substr($telefono, -4);

                    //ELIMINACION DE GUIONES DE LA FECHA GENERADA Y JUNTAR TODOS LOS NÚMEROS
                    $fechaHoyFinal=str_replace("-","",$fechaHoy);
                
                    //SE OBTIENE LA REFERENCIA FINAL DEL PRODUCTO COMPRADO
                    $referenciaFinal=$result.$tel."-".$fechaHoyFinal;
                    $situacionCompra="PENDIENTE";

                for($i=0;$i<count($_SESSION["IDC"]);$i++)
                {
                    $NOMBRE=$_SESSION["NOMBREC"][$i];
                    $DEPARTAMENTO=$_SESSION["DEPARTAMENTOC"][$i];
                    $CANTIDAD=$_SESSION["CANTIDADC"][$i];
                    $COSTEUN=$_SESSION["COSTEUNITC"][$i];
                    $COSTETOT=$_SESSION["COSTETOTC"][$i];

                $consComprando=$conexionProductos->query("INSERT INTO $BD_tablaPedidos(NOMBRE,NUMERO,TELEFONO,DIRECCION,CORREO,CONCEPTO,DEPARTAMENTO,CANTIDAD,COSTE_UNITARIO,COSTE_TOTAL,FECHA_PEDIDO,REFERENCIA,ENTREGADO)VALUES('$usuarioCompra','$numeroBancario','$telefono','$direccion','$correo','$NOMBRE','$DEPARTAMENTO','$CANTIDAD','$COSTEUN','$COSTETOT','$fechaHoy','$referenciaFinal',' $situacionCompra')");
                    //FALTA DETERMINAR VALORES DE LA CONSULTA
                }
                $consLogin->closeCursor(); //Cierra la conexion y la consulta
                $_SESSION["senalCarrito"]=5;  //Señal de que se ha realizado la compra correctamente y guardada en la BBDD
                header("location:../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php");
            }
        }
    }
    else
    {
        $_SESSION["detectadaEntrada"]=1;   //El usuario se va a registrar para hacer la compra
        header("location:../../005_Login/0053_LoginCLIENTES/loginCLIENTES.php"); 
    }
}
if(isset($_GET["borrarCarrito"]))
{  
    $consLogin=$conexionProductos->query("TRUNCATE TABLE $BD_tablaCarrito");
    $consLogin->closeCursor(); //Cierra la conexion y la consulta
    $_SESSION["senalCarrito"]=6;  //Señal de que se ha eliminado el carrito de la compra de la BBDD
    header("location:../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php");
}
?>