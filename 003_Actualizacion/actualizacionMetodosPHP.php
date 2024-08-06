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
    class UsuarioCompararActualizar implements JsonSerializable
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
        //GETTER DEL ID USUARIO
        public function IDgetter()
        {
            return $this->RegID;
        }
        //GETTER DEL NOMBRE USUARIO
        public function NOMBREgetter()
        {
            return $this->RegNombre;
        }
        //GETTER DEL APELLIDO USUARIO
        public function APELLIDOgetter()
        {
            return $this->RegApellidos;
        }
        //GETTER DE LA DIRECCION USUARIO
        public function DIRECCIONgetter()
        {
            return $this->RegDireccion;
        }
        //GETTER DE LA POBLACION USUARIO
        public function POBLACIONgetter()
        {
            return $this->RegPoblacion;
        }
        //GETTER DE LA POBLACION USUARIO
        public function PROFESIONgetter()
        {
            return $this->RegProfesion;
        }
        //GETTER DE LA POBLACION USUARIO
        public function AHORROSgetter()
        {
            return $this->RegAhorros;
        }
        public function ConvertirArray()
        {
            $array= array($this->RegID,
                          $this->RegNombre,
                          $this->RegApellidos,
                          $this->RegDireccion,
                          $this->RegPoblacion,
                          $this->RegProfesion,
                          $this->RegAhorros);
            return $array;
        }
        public function jsonSerialize()
        {
            return get_object_vars($this);
        }
    }
?>