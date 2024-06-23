
/**************************************/
/**** 1) CARGA DE PAGINA PRINCIPAL ****/
/**************************************/
function cargaPagina(){ 
    //BOTON 1 //
        var B0 = document.getElementsByClassName("boton")[0];
        B0.addEventListener("mouseenter", alentrar0);
        function alentrar0()
        {
            B0.style.backgroundColor="yellow";
            B0.style.color="rgba(0, 0, 19, 0.89)";
        }
        B0.addEventListener("mouseleave", alsalir0);
        function alsalir0()
        {
            B0.style.backgroundColor="rgba(0, 0, 19, 0.89)";
            B0.style.color="rgba(230, 230, 11, 0.719)";
        }
        //FUNCIONES DEL BOTON//
        B0.addEventListener("click",function(){
                location.href="historiaEmpresa.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
        });
    //////////////////////////////////////////////////////////////////////////////
    //BOTON 2 //
        var B1 = document.getElementsByClassName("boton")[1];
        B1.addEventListener("mouseenter", alentrar1);
        function alentrar1()
        {
            B1.style.backgroundColor="yellow";
            B1.style.color="rgba(0, 0, 19, 0.89)";
        }
        B1.addEventListener("mouseleave", alsalir1);
        function alsalir1()
        {
            B1.style.backgroundColor="rgba(0, 0, 19, 0.89)";
            B1.style.color="rgba(230, 230, 11, 0.719)";
        }
        //FUNCIONES DEL BOTON//
        B1.addEventListener("click",function(){
            location.href="catalogoProductos.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
        });
    //////////////////////////////////////////////////////////////////////////////
    //BOTON 3 //
        var B2 = document.getElementsByClassName("boton")[2];
        B2.addEventListener("mouseenter", alentrar2);
        function alentrar2()
        {
            B2.style.backgroundColor="yellow";
            B2.style.color="rgba(0, 0, 19, 0.89)";
        }
        B2.addEventListener("mouseleave", alsalir2);
        function alsalir2()
        {
            B2.style.backgroundColor="rgba(0, 0, 19, 0.89)";
            B2.style.color="rgba(230, 230, 11, 0.719)";
        }
        //FUNCIONES DEL BOTON//
        B2.addEventListener("click",function(){
            location.href="catalogoServicios.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
        });
    ////////////////////////////////////////////////////////////////////////////
    //BOTON 4 //
        var B3 = document.getElementsByClassName("boton")[3];
        B3.addEventListener("mouseenter", alentrar3);
        function alentrar3()
        {
            B3.style.backgroundColor="yellow";
            B3.style.color="rgba(0, 0, 19, 0.89)";
        }
        B3.addEventListener("mouseleave", alsalir3);
        function alsalir3()
        {
            B3.style.backgroundColor="rgba(0, 0, 19, 0.89)";
            B3.style.color="rgba(230, 230, 11, 0.719)";
        }
        //FUNCIONES DEL BOTON//
        B3.addEventListener("click",function(){
            location.href="proyectosEnCurso.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
       });
    //////////////////////////////////////////////////////////////////////////////
    //BOTON 5 //
        var B4 = document.getElementsByClassName("boton")[4];
        B4.addEventListener("mouseenter", alentrar4);
        function alentrar4()
        {
            B4.style.backgroundColor="yellow";
            B4.style.color="rgba(0, 0, 19, 0.89)";
        }
        B4.addEventListener("mouseleave", alsalir4);
        function alsalir4()
        {
            B4.style.backgroundColor="rgba(0, 0, 19, 0.89)";
            B4.style.color="rgba(230, 230, 11, 0.719)";
        }
        //FUNCIONES DEL BOTON//
        B4.addEventListener("click",function(){
            location.href="contactoEmpresa.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
         });
    /////////////////////////////////////////////////////////////////////////////
    //BOTON 6 //
        var B5 = document.getElementsByClassName("boton")[5];
        B5.addEventListener("mouseenter", alentrar5);
        function alentrar5()
        {
            B5.style.backgroundColor="yellow";
            B5.style.color="rgba(0, 0, 19, 0.89)";
        }
        B5.addEventListener("mouseleave", alsalir5);
        function alsalir5()
        {
            B5.style.backgroundColor="rgba(0, 0, 19, 0.89)";
            B5.style.color="rgba(230, 230, 11, 0.719)";
        }
        //FUNCIONES DEL BOTON//
        B5.addEventListener("click",function(){
            location.href="areaEmpleo.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
        });
   /////////////////////////////////////////////////////////////////////////////
    //BOTON 7 //
    var B6 = document.getElementById("iconoEmpresa");
    //FUNCIONES DEL BOTON//
    B6.addEventListener("click",function(){
        location.href="index.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
    });
    //CARGA LA IMAGEN SEGUN EL TAMAÑO DE LA PAGINA WEB
    mapear();
}
/**********************************************/
/** 3) PROGRAMACION DEL MAPA IMAGEN MOSTRADO **/
/**********************************************/
    var semaforo=-1;   //PARA LA ELECCION DE LA PANTALLA
    //AHORA SE COLOCARÁ LA FOTO UNICA DEL MAPA DE POSICION
    var imagenes=  new Array(
        ["images/Mapa-Sfer4D.jpg"]
    );
function tamPagina()  //FUNCION SE ACTIVARÁ CUANDO SE REGISTREN CARGAS DE PAGINA
{
    //NIVEL ZERO DE MAXIMO 299px
    var mqlNivelZero = window.matchMedia("screen and (min-width: 100px) and (max-width: 299px)");
    var imagen2= document.getElementsByClassName("mapa")[0];   /*OBJETO PARA CAMBIAR DE IMAGEN*/    
    cambioMediaQueryZero(mqlNivelZero);
    mqlNivelZero.addEventListener("resize",cambioMediaQueryZero);
    function cambioMediaQueryZero(mqlNivelZero) {
        if(mqlNivelZero.matches==true)
        {
            //LA PARGINA CARGADA TIENE MINIMO 100px y MAXIMO ANCHO DE 299px
            // WIDTH DE: 100-299 //
            imagen2.innerHTML = "<img src="+imagenes[0]+" width=230px height=100px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
        }
    }
    //NIVEL PRIMERO DE MAXIMO 480px
    var mqlNivelPrimero = window.matchMedia("screen and (min-width: 300px) and (max-width: 480px)");
    cambioMediaQueryPrimero(mqlNivelPrimero);
    mqlNivelPrimero.addEventListener("resize",cambioMediaQueryPrimero);
    function cambioMediaQueryPrimero(mqlNivelPrimero) {
        if(mqlNivelPrimero.matches==true)
        {
            //LA PARGINA CARGADA TIENE MINIMO 280px y MAXIMO ANCHO DE 480px
            // WIDTH DE: 300-480 //
            imagen2.innerHTML = "<img src="+imagenes[0]+" width=230px height=100px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU

        }
    }
    //NIVEL SEGUNDO DE MAXIMO 768px
    var mqlNivelSegundo = window.matchMedia("screen and (min-width: 481px) and (max-width: 768px)");
    cambioMediaQuerySegundo(mqlNivelSegundo);
    mqlNivelSegundo.addEventListener("resize",cambioMediaQuerySegundo);
    function cambioMediaQuerySegundo(mqlNivelSegundo) {
        if(mqlNivelSegundo.matches==true)
        {
            //LA PARGINA CARGADA TIENE MINIMO 480px y MAXIMO ANCHO DE 768px
            // WIDTH DE: 481-768 //
            imagen2.innerHTML = "<img src="+imagenes[0]+" width=420px height=180px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
        }
    }
    //NIVEL TERCERO DE MAXIMO 1024px
    var mqlNivelTercero = window.matchMedia("screen and (min-width: 769px) and (max-width: 1024px)");
    cambioMediaQueryTercero(mqlNivelTercero);
    mqlNivelTercero.addEventListener("resize",cambioMediaQueryTercero);
    function cambioMediaQueryTercero(mqlNivelTercero) {
        if(mqlNivelTercero.matches==true)
        {
            //LA PARGINA CARGADA TIENE MINIMO 768px y MAXIMO ANCHO DE 1024px
            // WIDTH DE: 769-1024 //
            imagen2.innerHTML = "<img src="+imagenes[0]+" width=620px height=215px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
        }
    }
    //NIVEL CUARTO DE MAXIMO 1280px
    var mqlNivelCuarto = window.matchMedia("screen and (min-width: 1025px) and (max-width: 1280px)");
    cambioMediaQueryCuarto(mqlNivelCuarto);
    mqlNivelCuarto.addEventListener("resize",cambioMediaQueryCuarto);
    function cambioMediaQueryCuarto(mqlNivelCuarto) {
        if(mqlNivelCuarto.matches==true)
        {
            //LA PARGINA CARGADA TIENE MINIMO 1024px y MAXIMO ANCHO DE 1280px
            // WIDTH DE: 1025-1280 //
            imagen2.innerHTML = "<img src="+imagenes[0]+" width=730px height=215px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
        }
    }
        //NIVEL CUARTO DE MAXIMO 7800px
    var mqlNivelQuinto = window.matchMedia("screen and (min-width: 1281px) and (max-width: 7800px)");
    cambioMediaQueryQuinto(mqlNivelQuinto);
    mqlNivelQuinto.addEventListener("resize",cambioMediaQueryQuinto);
    function cambioMediaQueryQuinto(mqlNivelQuinto) {
        if(mqlNivelQuinto.matches==true)
        {
            //LA PARGINA CARGADA TIENE MINIMO 1024px y MAXIMO ANCHO DE 1280px
            // WIDTH DE: 1281-7800 //
            imagen2.innerHTML = "<img src="+imagenes[0]+" width=730px height=215px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU       
        }
    }
}
    function configuracion()
    {
        //Ejecutandolo aqui dentro se asegura uno, que el documento ha terminado de cargar
        $("#fecha").css({"text-align":"center"});
        $("#fecha").css({"color":"rgb(192, 189, 8)"});
        $("#contenido").css({"text-align": "center"});
        $("#contenido").css({"font-size":"x-small"});
    }