<?php
class ConexionPHP
{
    //METODO 1: EMPLEANDO EN TODO ESTE FICHERO --> PDO PARA LA CONEXION
    private static $BD_servidor="localhost";
    private static $BD_usuario="root";
    private static $BD_contrasenia="";
    private static $BD_nombreJEFES_RRHH="bbdd001_jefes_rrhh"; //BBDD de los JEFES y de RRHH
    private static $BD_nombreEMPLEADOS="bbdd002_empleados"; //BBDD de los EMPLEADOS
    private static $BD_nombreCLIENTES="bbdd003_clientes"; //BBDD de los CLIENTES
    private static $BD_tablaEmpleados="contactos_empresa"; //TABLA Empleados
    private static $BD_tablaJefes="login"; //TABLA Jefes Y RRHH
    private static $BD_tablaIDClientes="loginclientes"; //TABLA Clientes
    private static $BD_tablaJefesTareas="gestionpeticiones"; //TABLA Jefes Y RRHH
    private static $BD_tablaJefesGannt="diagrama_gannt"; //TABLA Jefes Gannt
    private static $BD_tablaClientes="clientes"; //TABLA Pedidos Clientes
    private static $BD_tablaInterfazImagenes="imagenesinterfazweb"; //TABLA IMAGENES: SLIDER, PRODUCTOS, SERVICIOS Y PROYECTOS
    private static $BD_tablaCarrito="clientescarrito"; //TABLA IMAGENES: SLIDER, PRODUCTOS, SERVICIOS Y PROYECTOS
    private static $BD_tablaHistoria="historias";  //TABLA HISTORIAS de los acontecimientos históricos empresariales sector público
    private static $BD_charset="utf8";
    private static $IR_inicio="../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php";
    private static $IR_historia="../../009_SectorPublico/0092_PaginaHistoria/paginaHistoria.php";
    private static $IR_productos="../../009_SectorPublico/0093_PaginaProductos/paginaProductos.php";
    private static $IR_servicios="../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php";
    private static $IR_proyectos="../../009_SectorPublico/0095_PaginaProyectos/paginaProyectos.php";
    private static $IR_clientes="../../005_Login/0053_LoginCLIENTES/loginCLIENTES.php";
    private static $IR_RUTA_SLIDER="/009_SectorPublico/0091_PaginaPrincipal/sliderImages/";  //CARPETA SLIDER DEL SERVIDOR
    private static $IR_RUTA_PRODUCTOS="/009_SectorPublico/0093_PaginaProductos/productImages/";  //CARPETA PRODUCTOS DEL SERVIDOR
    private static $IR_RUTA_SERVICIOS="/009_SectorPublico/0094_PaginaServicios/servicesImages/";  //CARPETA SERVICIOS DEL SERVIDOR
    private static $IR_RUTA_PROYECTOS="/009_SectorPublico/0095_PaginaProyectos/projectsImages/";  //CARPETA PROYECTOS DEL SERVIDOR
    private static $IR_RUTA_NOVEDADES="/009_SectorPublico/0091_PaginaPrincipal/newsImages/";  //CARPETA NOVEDADES DEL SERVIDOR
    private static $IR_RUTA_CATEGORIA_PRODUCTOS="/009_SectorPublico/0093_PaginaProductos/productCategory/";  //CARPETA CATEGORIA PRODUCTOS DEL SERVIDOR
    private static $IR_RUTA_CATEGORIA_SERVICIOS="/009_SectorPublico/0094_PaginaServicios/servicesCategory/";  //CARPETA CATEGORIA SERVICIOS DEL SERVIDOR
    private static $IR_RUTA_CATEGORIA_PROYECTOS="/009_SectorPublico/0095_PaginaProyectos/projectsCategory/";  //CARPETA CATEGORIA PROYECTOS DEL SERVIDOR

    public function ConexionPHP()
    {
        //Sin necesidad de un constuctor
    }
    public static function getBD_Servidor()
    {
        return self::$BD_servidor;
    }
    public static function getBD_Usuario()
    {
        return self::$BD_usuario;
    }
    public static function getBD_Contrasenia()
    {
        return self::$BD_contrasenia;
    }
    public static function getBD_NombreJEFES_RRHH()
    {
        return self::$BD_nombreJEFES_RRHH;
    }
    public static function getBD_NombreEMPLEADOS()
    {
        return self::$BD_nombreEMPLEADOS;
    }
    public static function getBD_NombreCLIENTES()
    {
        return self::$BD_nombreCLIENTES;
    }
    public static function getBD_TablaJefes()
    {
        return self::$BD_tablaJefes;
    }
    public static function getBD_TablaIDClientes()
    {
        return self::$BD_tablaIDClientes;
    }
    public static function getBD_TablaJefesTareas()
    {
        return self::$BD_tablaJefesTareas;
    }
    public static function getBD_TablaJefesGannt()
    {
        return self::$BD_tablaJefesGannt;
    }
    public static function getBD_TablaEmpleados()
    {
        return self::$BD_tablaEmpleados;
    }
    public static function getBD_TablaClientes()
    {
        return self::$BD_tablaClientes;
    }
    public static function getBD_TablaInterfazImagenes()
    {
       return self::$BD_tablaInterfazImagenes; 
    }
    public static function getBD_TablaCarrito()
    {
        return self::$BD_tablaCarrito;
    }
    public static function getBD_TablaHistoria()
    {
       return self::$BD_tablaHistoria; 
    }
    public static function getBD_Charset()
    {
        return self::$BD_charset;
    }
    public static function errorReporting()
    {
        mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
        return error_reporting(0);
    }
    public static function IR_departamento($departamento)
    {
        switch($departamento)
        {
            case 1: $texto=self::$IR_inicio; break;
            case 2: $texto=self::$IR_historia; break;
            case 3: $texto=self::$IR_productos; break;
            case 4: $texto=self::$IR_servicios; break;
            case 5: $texto=self::$IR_proyectos; break;
            case 6: $texto=self::$IR_clientes; break;
        }
        return $texto;
    }
    public static function IR_RUTA_departamento($ruta)
    {
        switch($ruta)
        {
            case 1: $texto=self::$IR_RUTA_SLIDER; break;
            case 2: $texto=self::$IR_RUTA_PRODUCTOS; break;
            case 3: $texto=self::$IR_RUTA_SERVICIOS; break;
            case 4: $texto=self::$IR_RUTA_PROYECTOS; break;
            case 5: $texto=self::$IR_RUTA_NOVEDADES; break;
            case 6: $texto=self::$IR_RUTA_CATEGORIA_PRODUCTOS; break;
            case 7: $texto=self::$IR_RUTA_CATEGORIA_SERVICIOS; break;
            case 8: $texto=self::$IR_RUTA_CATEGORIA_PROYECTOS; break;
        }
        return $texto;    
    }
    public static function getConexionJEFES_RRHH()
    {
        //Creará conexión con la base de datos de los JEFES
        $ConexionJEFES_RRHH= new PDO('mysql:host='.self::$BD_servidor.';dbname='.self::$BD_nombreJEFES_RRHH,self::$BD_usuario, self::$BD_contrasenia);
        $ConexionJEFES_RRHH->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $ConexionJEFES_RRHH->exec("SET CHARACTER SET UTF8");
        return $ConexionJEFES_RRHH;
    }
    public static function getConexionEMPLEADOS()
    {
        //Creará conexión con la base de datos de los EMPLEADOS
        $ConexionBaseEmpleados= new PDO('mysql:host='.self::$BD_servidor.';dbname='.self::$BD_nombreEMPLEADOS,self::$BD_usuario, self::$BD_contrasenia);
        $ConexionBaseEmpleados->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $ConexionBaseEmpleados->exec("SET CHARACTER SET UTF8");
        return $ConexionBaseEmpleados;
    }
    public static function getConexionCLIENTES()
    {
        //Creará conexión con la base de datos de los CLIENTES
        $ConexionClientes= new PDO('mysql:host='.self::$BD_servidor.';dbname='.self::$BD_nombreCLIENTES,self::$BD_usuario, self::$BD_contrasenia);
        $ConexionClientes->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $ConexionClientes->exec("SET CHARACTER SET UTF8");
        return $ConexionClientes;
    }
}