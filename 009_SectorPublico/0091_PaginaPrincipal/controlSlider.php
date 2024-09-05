<?php
if(isset($_GET["pasaDerecha"]))
{
    while($cierre==0)
    {
        //SI SE PIDE CARGAR UNA IMAGEN SE PROCEDE CON LA CONSULTA DE LA CARGA DE LA IMAGEN
        $filasID=$consulta->rowCount();
        if($filasID==0 && $cierre==0)
        {
            //Continua la busqueda de la siguiente imagen del SLIDER no nula
        }
        if($i==1 && $cierre==0)
        {
            $i=20; //Reinicia la busqueda desde el ID mas grande
        }
        if($filasID!=0 && $cierre==0)
        {
            //Descarga la imagen del SLIDER y termina
            $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultado as $foto)
            {      
                $_SESSION["nombreImagen"]=$foto["NOMBRE"];
            }
            //TERMINA
            $cierre=1; //Para terminar el bucle
        }
        $consulta->closeCursor();  //Cierra la conexion y la consulta
        $i--;
    }
    $_SESSION["senalImagen"]=1;  //Imagen cargada desde la carpeta del servidor
    $_SESSION["aleatorio"]=$i;   //Imagen SLIDER encontrada y siguiente
    header("location:../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php");
}
if(isset($_GET["pasaIzquierda"]))
{
    //Carga según el ID pero la cinta de imágenes hacia un ID MENOR CADA VEZ
    if($id<1)
    {
        $id=20;  //CARRUSEL DE SLIDER DE 20 IMAGENES COMO MÁXIMO ESTABLECIDO
    }
    else
    {
        for($i=$id;$i<20;$i++)
        {
            //SI SE PIDE CARGAR UNA IMAGEN SE PROCEDE CON LA CONSULTA DE LA CARGA DE LA IMAGEN
            $consulta=$conexion->query("SELECT NOMBRE FROM $BD_tabla WHERE ID='$i' AND DESTINO='SLIDER'");
            $filasID=$consulta->rowCount();
            if($filasID==0 && $cierre==0)
            {
                //Continua la busqueda de la siguiente imagen del SLIDER no nula
            }
            if($i==20 && $cierre==0)
            {
                $i=0; //Reinicia la busqueda desde el ID mas grande
            }
            if($filasID!=0 && $cierre==0)
            {
                //Descarga la imagen del SLIDER y termina
                $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
                foreach($resultado as $foto)
                {      
                    $_SESSION["nombreImagen"]=$foto["NOMBRE"];
                }
                //TERMINA
                $cierre=1; //Para terminar el bucle
            }
            $consulta->closeCursor();  //Cierra la conexion y la consulta
        }
        $_SESSION["senalImagen"]=1;  //Imagen cargada desde la carpeta del servidor
        $_SESSION["aleatorio"]=$i;   //Imagen SLIDER encontrada y siguiente
        header("location:../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php");
    }
}
?>