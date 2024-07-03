<?php
    function compararCARGARvsACTUALIZAR($registroCarga,$registroActualiza)
    {
        foreach($registroCarga as $valor)
        {
            if(!strcmp($registroCarga[$valor],$registroActualiza[$valor]))
            {
                //AMBOS VALORES SON IGUALES DE MANERA QUE PASA AL SIGUIENTE
                // PUES SE SUPONE QUE ES UN VALOR QUE COMO YA ESTABA NO FORMA PARTE
                // DE LA ACTUALIZACIÓN
            }
            else
            {
                echo ("<script>alert('<br>Se quiere sustituir ".$registroCarga[$valor]." por el valor: ".$registroActualiza[$valor]."<br>')</script>");
            }
        }
    }

    //Se utiliza un objeto para poder guardar lo que se CARGA respecto a lo que 
    // luego se compara a fin de ver qué elemento o elementos son los que cambian
    // y efectuar los considerables cambios
    class UsuarioCompararActualizar
    {
        private $RegID;
        private $RegNombre;
        private $RegApellidos;
        private $RegDireccion;
        private $RegPoblacion;
        private $RegProfesion;
        private $RegAhorros;

        public function __construct($RegID,$RegNombre,$RegApellidos,$RegDireccion,$RegPoblacion,$RegProfesion,$RegAhorros)
        {
            $this->RegID=$RegID;
            $this->RegNombre=$RegNombre;
            $this->RegApellidos=$RegApellidos;
            $this->RegDireccion=$RegDireccion;
            $this->RegPoblacion=$RegPoblacion;
            $this->RegProfesion=$RegProfesion;
            $this->RegAhorros=$RegAhorros;
        }
        //GETTER Y SETTER DEL ID USUARIO
        function IDgetter()
        {
            return $this->RegID;
        }
        function IDsetter($RegID):void
        {
            $this->RegID=$RegID;
        }
        //GETTER Y SETTER DEL NOMBRE USUARIO
        function NOMBREgetter()
        {
            return $this->RegNombre;
        }
        function NOMBREsetter($RegNombre):void
        {
            $this->RegNombre=$RegNombre;
        }
        //GETTER Y SETTER DEL APELLIDO USUARIO
        function APELLIDOgetter()
        {
            return $this->RegApellidos;
        }
        function APELLIDOsetter($RegApellidos):void
        {
            $this->RegApellidos=$RegApellidos;
        }
        //GETTER Y SETTER DE LA DIRECCION USUARIO
        function DIRECCIONgetter()
        {
            return $this->RegDireccion;
        }
        function DIRECCIONsetter($RegDireccion):void
        {
            $this->RegDireccion=$RegDireccion;
        }
        //GETTER Y SETTER DE LA POBLACION USUARIO
        function POBLACIONgetter()
        {
            return $this->RegPoblacion;
        }
        function POBLACIONsetter($RegPoblacion):void
        {
            $this->RegPoblacion=$RegPoblacion;
        }
        //GETTER Y SETTER DE LA POBLACION USUARIO
        function PROFESIONgetter()
        {
            return $this->RegProfesion;
        }
        function PROFESIONsetter($RegProfesion):void
        {
            $this->RegProfesion=$RegProfesion;
        }
        //GETTER Y SETTER DE LA POBLACION USUARIO
        function AHORROSgetter()
        {
            return $this->RegAhorros;
        }
        function AHORROSsetter($RegAhorros):void
        {
            $this->RegAhorros=$RegAhorros;
        }
    }
?>