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
    private static $BD_tablaJefesTareas="gestionpeticiones"; //TABLA Jefes Y RRHH
    private static $BD_tablaJefesGannt="diagrama_gannt"; //TABLA Jefes Gannt
    private static $BD_tablaClientes="clientes"; //TABLA Clientes

    private static $BD_charset="utf8";

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
    public static function getBD_Charset()
    {
        return self::$BD_charset;
    }
    public static function errorReporting()
    {
        mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
        return error_reporting(0);
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