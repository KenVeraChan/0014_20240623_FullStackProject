<?php
class ConexionPHP
{
    //METODO 1: EMPLEANDO EN TODO ESTE FICHERO --> PDO PARA LA CONEXION
    private static $BD_servidor="localhost";
    private static $BD_usuario="root";
    private static $BD_contrasenia="";
    private static $BD_nombre="cursosql"; //Se recomienda crear nueva BBDD al final del todo, no con este nombre
    private static $BD_tablaEmpleados="contactos_empresa"; //BBDD Empleados
    private static $BD_tablaJefes="login"; //BBDD Jefes
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
    public static function getBD_Nombre()
    {
        return self::$BD_nombre;
    }
    public static function getBD_TablaEmpleados()
    {
        return self::$BD_tablaEmpleados;
    }
    public static function getBD_TablaJefes()
    {
        return self::$BD_tablaJefes;
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
    public static function getConexionEmpleados()
    {
        //Creará conexión con la base de datos de los EMPLEADOS
    }
    public static function getConexionJefes()
    {
        //Creará conexión con la base de datos de los JEFES
        $ConexionBaseJefes= new PDO('mysql:host='.self::$BD_servidor.';dbname='.self::$BD_nombre,self::$BD_usuario, self::$BD_contrasenia);
        $ConexionBaseJefes->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $ConexionBaseJefes->exec("SET CHARACTER SET UTF8");
        return $ConexionBaseJefes;
    }
}