/******************************************************************/
/**** 1) RATON ENTRANDO EN AREA DE BOTONES Y REACCION DE ESTOS ****/
/******************************************************************/

function visibilidadBotones()
{
    var imagen1= document.getElementsByClassName("botonSliderIzquierda")[0];
    imagen1.style.visibility="visible"; /*APARECE OCULTO Y LUEGO SE VE AL PASAR EL RATON*/
    var imagen2= document.getElementsByClassName("botonSliderDerecha")[0];
    imagen2.style.visibility="visible";/*APARECE OCULTO Y LUEGO SE VE AL PASAR EL RATON*/
}
function invisibilidadBotones()
{
    var imagen1= document.getElementsByClassName("botonSliderIzquierda")[0];
    imagen1.style.visibility="hidden"; /*APARECE OCULTO Y LUEGO SE VE AL PASAR EL RATON*/
    var imagen2= document.getElementsByClassName("botonSliderDerecha")[0];
    imagen2.style.visibility="hidden"; /*APARECE OCULTO Y LUEGO SE VE AL PASAR EL RATON*/
}
/**************************************/
/**** 2) CARGA DE PAGINA PRINCIPAL ****/
/**************************************/
function cargaPagina(){ 
    //BOTON DE LOS SLIDERS: IZQUIERDA Y DERECHA //
    invisibilidadBotones();
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
        //BOTONES DEL CUERPO DE LA PAGINA WEB //
        destacaBloque();
}

/**************************************************************************/
/******* 3) CAMBIO DEL ARRAY DE IMAGENES SLIDER SEGUN MEDIA QUERIES *******/
/**************************************************************************/

var contador = 0;
var controlIzquierda=0;   //0: imagenMovible   1:imagenInmovil
var controlDerecha=1;
var semaforo=-1;   //PARA LA ELECCION DE LA PANTALLA

function tamPagina()  //FUNCION SE ACTIVARÁ CUANDO SE REGISTREN CARGAS DE PAGINA
{
    //NIVEL ZERO DE MAXIMO 299px
    var mqlNivelZero = window.matchMedia("screen and (min-width: 100px) and (max-width: 299px)");
    cambioMediaQueryZero(mqlNivelZero);
    mqlNivelZero.addEventListener("resize",cambioMediaQueryZero);
    function cambioMediaQueryZero(mqlNivelZero) {
        if(mqlNivelZero.matches==true)
        {
            //LA PARGINA CARGADA TIENE MINIMO 100px y MAXIMO ANCHO DE 299px
            semaforo=0;
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
            semaforo=1;
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
            semaforo=2;
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
            semaforo=3;
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
            semaforo=4;
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
            semaforo=5;
        }
    }
    return semaforo;   //DEVUELVE EL VALOR DE SEMAFORO PARA METERLO EN EL SWITCH
}
   // SE CREARÁ LA MATRIZ PARA GUARDAR LAS IMAGENES SEGUN LA CARGA DE LA PAGINA

  //SE PODRAN AÑADIR LAS IMAGENES QUE SE QUIERAN QUE LUEGO SE REDIMENSIONARA
  var imagenes = new Array(
    ["sliderImages/OtraTierra.jpg"],
    ["sliderImages/AutumnMeetings.jpg"],
    ["sliderImages/Cubits.jpg"],
    ["sliderImages/FutureUniversity.jpg"],
    ["sliderImages/MettingIT.jpg"],
    ["sliderImages/TimeTravel.jpg"],
    ["sliderImages/ViajeManpertos.jpg"]); 

/*************************************************************/
/***** 4) GESTION DE MOVIMIENTO DE IMAGENES EN EL SLIDER *****/
/*************************************************************/

function SliderHaciaDerecha()
{
if(controlIzquierda==0 && controlDerecha==1)    
{
    if((contador==0 || contador%2==0) && contador<imagenes.length)
    {
    //MIENTRAS SE SACA UNO SE MUESTRA EL OTRO
    var imagen1=document.getElementById("imagenMovible");
    imagen1.style.transitionDuration="0.05s";
    imagen1.style.transform="translate(-1350px,0px)";
    imagen1.style.width="0px";

    var imagen2=document.getElementById("imagenInMovil");
    imagen2.style.zIndex=-(contador+3); //ROTARAN EN -1 y -2 segun las fotos colocadas 
            switch(tamPagina())
            {
                case 0:
                    {   // WIDTH DE: 100-299 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=242px height=150px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
                        
                        break;
                    }
                case 1:
                    {   // WIDTH DE: 300-480 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=400px height=150px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU

                            break;
                    }
                case 2:
                    {   // WIDTH DE: 481-768 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=550px height=150px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU

                            break;
                    }
                case 3:
                    {   // WIDTH DE: 769-1024 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=870px height=300px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
                            break;
                    }
                case 4:
                    {   // WIDTH DE: 1025-1280 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=1100px height=300px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
                        break;
                    }
                case 5:
                    {   // WIDTH DE: 1281-7800 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=1300px height=300px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU       
                        break;
                    }
                default:
                    {
                        break;
                    }
            }
    imagen2.style.transitionDuration="0.002s";
    imagen2.style.transform="translate(0px,0px)";
    }
    if((contador==1 || contador%2!=0) && contador<imagenes.length)
    {
    //MIENTRAS SE SACA UNO SE MUESTRA EL OTRO
    var imagen1=document.getElementById("imagenInMovil");
    imagen1.style.transitionDuration="0.05s";
    imagen1.style.transform="translate(-1350px,0px)";
    imagen1.style.width="0px";

    var imagen2=document.getElementById("imagenMovible");
    imagen2.style.zIndex=-(contador+3); //ROTARAN EN -1 y -2 segun las fotos colocadas 
            switch(tamPagina())
            {
                case 0:
                    {   // WIDTH DE: 100-299 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=242px height=150px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
                            break;
                    }
                case 1:
                    {   // WIDTH DE: 300-480 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=400px height=150px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU

                            break;
                    }
                case 2:
                    {   // WIDTH DE: 481-768 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=550px height=150px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU

                            break;
                    }
                case 3:
                    {   // WIDTH DE: 769-1024 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=870px height=300px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
                            break;
                    }
                case 4:
                    {   // WIDTH DE: 1025-1280 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=1100px height=300px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU

                        break;
                    }
                case 5:
                    {   // WIDTH DE: 1281-7800 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=1300px height=300px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU       
                        break;
                    }
                default:
                    {
                        break;
                    }
            }
    imagen2.style.transitionDuration="0.002s";
    imagen2.style.transform="translate(0px,0px)";
    }
    contador++;
    if(contador>=imagenes.length)
    {
        contador=0;
    }
}
else
{
    contador++;           //NO CONTABILIZA EL ULTIMO AÑADIDO 
    controlDerecha=1;     //Y SE PONE A 1 CUANDO SE MANTENGA EN DERECHA
    controlIzquierda=0;   //Y SE PONE A 0 IZQUIERDA PORQUE ESTA EN DERECHA
    SliderHaciaDerecha();  
}
}
function SliderHaciaIzquierda()
{
if(controlIzquierda==1 && controlDerecha==0)    
{
    if((contador==0 || contador%2==0) && contador>=0)
    {
    //MIENTRAS SE SACA UNO SE MUESTRA EL OTRO
    var imagen1=document.getElementById("imagenMovible");
    imagen1.style.transitionDuration="0.05s";
    imagen1.style.transform="translate(-1350px,0px)";
    imagen1.style.width="0px";

    var imagen2=document.getElementById("imagenInMovil");
    imagen2.style.zIndex=-(contador+3); //ROTARAN EN -1 y -2 segun las fotos colocadas 
            switch(tamPagina())
            {
                case 0:
                    {   // WIDTH DE: 100-299 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=242px height=150px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
                            break;
                    }
                case 1:
                    {   // WIDTH DE: 300-480 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=400px height=150px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU

                            break;
                    }
                case 2:
                    {   // WIDTH DE: 481-768 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=550px height=150px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU

                            break;
                    }
                case 3:
                    {   // WIDTH DE: 769-1024 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=870px height=300px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
                            break;
                    }
                case 4:
                    {   // WIDTH DE: 1025-1280 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=1100px height=300px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
                        break;
                    }
                case 5:
                    {   // WIDTH DE: 1281-7800 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=1300px height=300px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU               
                        break;
                    }
                default:
                    {
                        break;
                    }
            }
    imagen2.style.transitionDuration="0.002s";
    imagen2.style.transform="translate(0px,0px)";
    }
    if((contador==1 || contador%2!=0) && contador>=0)
    {
    //MIENTRAS SE SACA UNO SE MUESTRA EL OTRO
    var imagen1=document.getElementById("imagenInMovil");
    imagen1.style.transitionDuration="0.05s";
    imagen1.style.transform="translate(-1350px,0px)";
    imagen1.style.width="0px";

    var imagen2=document.getElementById("imagenMovible");
    imagen2.style.zIndex=-(contador+3); //ROTARAN EN -1 y -2 segun las fotos colocadas 
            switch(tamPagina())
            {
                case 0:
                    {   // WIDTH DE: 100-299 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=242px height=150px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
                            break;
                    }
                case 1:
                    {   // WIDTH DE: 300-480 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=400px height=150px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU

                            break;
                    }
                case 2:
                    {   // WIDTH DE: 481-768 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=550px height=150px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU

                            break;
                    }
                case 3:
                    {   // WIDTH DE: 769-1024 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=870px height=300px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU
                            break;
                    }
                case 4:
                    {   // WIDTH DE: 1025-1280 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=1100px height=300px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU       
                        break;
                    }
                case 5:
                    {   // WIDTH DE: 1281-7800 //
                        imagen2.innerHTML = "<img src="+imagenes[contador]+" width=1300px height=300px alt=foto>";  //REDIMENSIONAMOS FOTOS IN SITU       
                        break;
                    }
                default:
                    {
                        break;
                    }
            }
    imagen2.style.transitionDuration="0.002s";
    imagen2.style.transform="translate(0px,0px)";
    }
    contador--;
    if(contador<0)
    {
        contador=imagenes.length-1;
    }
}
else
{
    contador--; //NO CONTABILIZA EL ULTIMO AÑADIDO
    controlIzquierda=1;   // Y SE PONE A 1 CUANDO SE MANTENGA EN IZQUIERDA
    controlDerecha=0;     // Y SE PONE A 0 DERECHA PORQUE ESTA EN IZQUIERDA
    SliderHaciaIzquierda();
}
}

/*********************************************************************************************/
/****** 5) GESTION DE LA ILUMINACIÓN DE LOS BLOQUES DE NOVEDADES DEL CUERPO DE LA PAGINA *****/
/*********************************************************************************************/

function destacaBloque()
{
    //// NECESARIO SABER EL TAMAÑO DE LA PANTALLA ////
    //// PARA PODER DEFINIR EL TAMAÑO DE LA LETRA ////
    //// DENTRO DEL DIV QUE SE DECLARARÁ DESPUÉS  ////
    var senial= tamPagina();

    //BOTON 1 //
    var BOT1 = document.getElementsByClassName("noticia")[0];
    var mostrarBloque1= document.getElementsByClassName("parrafo")[0];
    BOT1.addEventListener("mouseenter", SIdestacaBloque1);
    function SIdestacaBloque1()
    {
        BOT1.style.backgroundColor="rgba(163, 180, 9, 0.596)";
        BOT1.style.color="rgba(0, 0, 19, 0.89)";
    }
    BOT1.addEventListener("mouseleave", NOdestacaBloque1);
    function NOdestacaBloque1()
    {
        BOT1.style.backgroundColor="rgba(0, 0, 19, 0.89)";
        BOT1.style.color="rgba(230, 230, 11, 0.719)";
        mostrarBloque1.innerHTML="";  /*BORRAR LO QUE SE HABÍA COLOCADO*/
        
        if(senial==0)
        { //// Y SE RECUPERA LO QUE ANTES PONIA EN EL ZOCALO ////
           var mensaje= document.getElementById("zocalo");
           mensaje.innerHTML=
           mensaje.style.color="black";
           mensaje.style.fontSize="14px"
           mensaje.innerHTML="-------- Fundadores --------<br><strong>William Wissangel</strong></br><strong>Sharyllín Rousher</strong><br>---- Correo Electrónico ----</br><strong>sfer4D_corporation@outlook.com</strong>";
        }
    }
    //FUNCIONES DEL BOTON//
    BOT1.addEventListener("click",function(){
        if(senial==5) 
        {
            mostrarBloque1.style.color="black";
            mostrarBloque1.style.fontSize="13px"
            mostrarBloque1.innerHTML=
            "<strong>-- Conseguido el metal con propiedades plásticas.</strong><br><strong>-- Primera vez que se alcanza la temperatura de: -274ºC.</strong><br><strong>-- El hidrógeno como combustible provoca mayores lluvias continentales e inundaciones imprevistas.</strong>";
        }
        if(senial==4)
        {
            mostrarBloque1.style.color="black";
            mostrarBloque1.style.fontSize="12px"
            mostrarBloque1.innerHTML=
            "<strong>-- Conseguido el metal con propiedades plásticas.</strong><br><strong>-- Primera vez que se alcanza la temperatura de: -274ºC.</strong><br><strong>-- El hidrógeno como combustible provoca mayores lluvias continentales e inundaciones imprevistas.</strong>";  
        }
        if(senial==3)
        {
            mostrarBloque1.style.color="black";
            mostrarBloque1.style.fontSize="9px"
            mostrarBloque1.innerHTML=
            "<strong>-- Conseguido el metal con propiedades plásticas.</strong><br><strong>-- Primera vez que se alcanza la temperatura de: -274ºC.</strong><br><strong>-- El hidrógeno como combustible provoca mayores lluvias continentales e inundaciones imprevistas.</strong>";
        }
        if(senial==2)
        {
            mostrarBloque1.style.color="black";
            mostrarBloque1.style.fontSize="8px"
            mostrarBloque1.innerHTML=
            "<strong>-- Conseguido el metal con propiedades plásticas.</strong><br><strong>-- Primera vez que se alcanza la temperatura de: -274ºC.</strong><br><strong>-- El hidrógeno como combustible provoca mayores lluvias continentales e inundaciones imprevistas.</strong>";
        }
        if(senial==1)
        {
            mostrarBloque1.style.color="black";
            mostrarBloque1.style.fontSize="7px"
            mostrarBloque1.innerHTML=
            "<strong>-- Conseguido el metal con propiedades plásticas.</strong><br><strong>-- Primera vez que se alcanza la temperatura de: -274ºC.</strong><br><strong>-- El hidrógeno como combustible provoca mayores lluvias continentales e inundaciones imprevistas.</strong>";
        }
        if(senial==0)
        {
            var mensaje= document.getElementById("zocalo");
            mensaje.innerHTML=
            mensaje.style.color="black";
            mensaje.style.fontSize="10px"
            mensaje.innerHTML=
            "<strong>-- Conseguido el metal con propiedades plásticas.</strong><br><strong>-- Primera vez que se alcanza la temperatura de: -274ºC.</strong><br><strong>-- El hidrógeno como combustible provoca mayores lluvias continentales e inundaciones imprevistas.</strong>";
        }
    });

    //BOTON 2 //
    var BOT2 = document.getElementsByClassName("noticia")[1];
    var mostrarBloque2= document.getElementsByClassName("parrafo")[1];
    BOT2.addEventListener("mouseenter", SIdestacaBloque2);
    function SIdestacaBloque2()
    {
        BOT2.style.backgroundColor="rgba(163, 180, 9, 0.596)";
        BOT2.style.color="rgba(0, 0, 19, 0.89)";
    }
    BOT2.addEventListener("mouseleave", NOdestacaBloque2);
    function NOdestacaBloque2()
    {
        BOT2.style.backgroundColor="rgba(0, 0, 19, 0.89)";
        BOT2.style.color="rgba(230, 230, 11, 0.719)";
        mostrarBloque2.innerHTML="";  /*BORRAR LO QUE SE HABÍA COLOCADO*/
        
        if(senial==0)
        { //// Y SE RECUPERA LO QUE ANTES PONIA EN EL ZOCALO ////
           var mensaje= document.getElementById("zocalo");
           mensaje.innerHTML=
           mensaje.style.color="black";
           mensaje.style.fontSize="14px"
           mensaje.innerHTML="-------- Fundadores --------<br><strong>William Wissangel</strong></br><strong>Sharyllín Rousher</strong><br>---- Correo Electrónico ----</br><strong>sfer4D_corporation@outlook.com</strong>";
        }
    }
    //FUNCIONES DEL BOTON//
    BOT2.addEventListener("click",function(){
        if(senial==5)
        {
            mostrarBloque2.style.color="black";
            mostrarBloque2.style.fontSize="13px"
            mostrarBloque2.innerHTML=
        "<strong>-- Techeimer se extiende por el continente de Wellis para su revolución industrial en nanotecnología</strong><br><strong>-- La empresa Ampergya sube sus impuestos energéticos.</strong><br><strong>-- La inteligencia artificial recomienda no buscar más formas de vida en el espacio por ver al ser humano una especie débil.</strong>";
        }
        if(senial==4)
        {
            mostrarBloque2.style.color="black";
            mostrarBloque2.style.fontSize="12px"
            mostrarBloque2.innerHTML=
        "<strong>-- Techeimer se extiende por el continente de Wellis para su revolución industrial en nanotecnología</strong><br><strong>-- La empresa Ampergya sube sus impuestos energéticos.</strong><br><strong>-- La inteligencia artificial recomienda no buscar más formas de vida en el espacio por ver al ser humano una especie débil.</strong>";
        }
        if(senial==3)
        {
            mostrarBloque2.style.color="black";
            mostrarBloque2.style.fontSize="9px"
            mostrarBloque2.innerHTML=
        "<strong>-- Techeimer se extiende por el continente de Wellis para su revolución industrial en nanotecnología</strong><br><strong>-- La empresa Ampergya sube sus impuestos energéticos.</strong><br><strong>-- La inteligencia artificial recomienda no buscar más formas de vida en el espacio por ver al ser humano una especie débil.</strong>";
        }
        if(senial==2)
        {
            mostrarBloque2.style.color="black";
            mostrarBloque2.style.fontSize="8px"
            mostrarBloque2.innerHTML=
        "<strong>-- Techeimer se extiende por el continente de Wellis para su revolución industrial en nanotecnología</strong><br><strong>-- La empresa Ampergya sube sus impuestos energéticos.</strong><br><strong>-- La inteligencia artificial recomienda no buscar más formas de vida en el espacio por ver al ser humano una especie débil.</strong>";
        }
        if(senial==1)
        {
            mostrarBloque2.style.color="black";
            mostrarBloque2.style.fontSize="7px"
            mostrarBloque2.innerHTML=
        "<strong>-- Techeimer se extiende por el continente de Wellis para su revolución industrial en nanotecnología</strong><br><strong>-- La empresa Ampergya sube sus impuestos energéticos.</strong><br><strong>-- La inteligencia artificial recomienda no buscar más formas de vida en el espacio por ver al ser humano una especie débil.</strong>";
        }
        if(senial==0)
        {
            var mensaje= document.getElementById("zocalo");
            mensaje.innerHTML=
            mensaje.style.color="black";
            mensaje.style.fontSize="10px"
            mensaje.innerHTML=
        "<strong>-- Techeimer se extiende por el continente de Wellis para su revolución industrial en nanotecnología</strong><br><strong>-- La empresa Ampergya sube sus impuestos energéticos.</strong><br><strong>-- La inteligencia artificial recomienda no buscar más formas de vida en el espacio por ver al ser humano una especie débil.</strong>";
        }
    });

    //BOTON 3 //
    var BOT3 = document.getElementsByClassName("noticia")[2];
    var mostrarBloque3= document.getElementsByClassName("parrafo")[2];
    BOT3.addEventListener("mouseenter", SIdestacaBloque3);
    function SIdestacaBloque3()
    {
        BOT3.style.backgroundColor="rgba(163, 180, 9, 0.596)";
        BOT3.style.color="rgba(0, 0, 19, 0.89)";
    }
    BOT3.addEventListener("mouseleave", NOdestacaBloque3);
    function NOdestacaBloque3()
    {
        BOT3.style.backgroundColor="rgba(0, 0, 19, 0.89)";
        BOT3.style.color="rgba(230, 230, 11, 0.719)";
        mostrarBloque3.innerHTML="";  /*BORRAR LO QUE SE HABÍA COLOCADO*/
        
        if(senial==0)
        { //// Y SE RECUPERA LO QUE ANTES PONIA EN EL ZOCALO ////
           var mensaje= document.getElementById("zocalo");
           mensaje.innerHTML=
           mensaje.style.color="black";
           mensaje.style.fontSize="14px"
           mensaje.innerHTML="-------- Fundadores --------<br><strong>William Wissangel</strong></br><strong>Sharyllín Rousher</strong><br>---- Correo Electrónico ----</br><strong>sfer4D_corporation@outlook.com</strong>";
        }
    }
    //FUNCIONES DEL BOTON//
    BOT3.addEventListener("click",function(){
         if(senial==5)
         {
            mostrarBloque3.style.color="black";
            mostrarBloque3.style.fontSize="13px"
            mostrarBloque3.innerHTML=
        "<strong>-- Diseño de Software destinado a la Aeronáutica.</strong><br><strong>-- Desarrollo de agricultura vertical.</strong><br><strong>-- Servicios de domótica particular y para entidades empresariales.</strong><br><strong>-- FemtoTecnología para estudiar microorganismos hostiles.</strong>";
         }
         if(senial==4)
         {
            mostrarBloque3.style.color="black";
            mostrarBloque3.style.fontSize="12px"
            mostrarBloque3.innerHTML=
        "<strong>-- Diseño de Software destinado a la Aeronáutica.</strong><br><strong>-- Desarrollo de agricultura vertical.</strong><br><strong>-- Servicios de domótica particular y para entidades empresariales.</strong><br><strong>-- FemtoTecnología para estudiar microorganismos hostiles.</strong>";
         }
         if(senial==3)
         {
            mostrarBloque3.style.color="black";
            mostrarBloque3.style.fontSize="9px"
            mostrarBloque3.innerHTML=
        "<strong>-- Diseño de Software destinado a la Aeronáutica.</strong><br><strong>-- Desarrollo de agricultura vertical.</strong><br><strong>-- Servicios de domótica particular y para entidades empresariales.</strong><br><strong>-- FemtoTecnología para estudiar microorganismos hostiles.</strong>";
         }
         if(senial==2)
         {
            mostrarBloque3.style.color="black";
            mostrarBloque3.style.fontSize="8px"
            mostrarBloque3.innerHTML=
        "<strong>-- Diseño de Software destinado a la Aeronáutica.</strong><br><strong>-- Desarrollo de agricultura vertical.</strong><br><strong>-- Servicios de domótica particular y para entidades empresariales.</strong><br><strong>-- FemtoTecnología para estudiar microorganismos hostiles.</strong>";
         }
         if(senial==1)
         {
            mostrarBloque3.style.color="black";
            mostrarBloque3.style.fontSize="7px"
            mostrarBloque3.innerHTML=
        "<strong>-- Diseño de Software destinado a la Aeronáutica.</strong><br><strong>-- Desarrollo de agricultura vertical.</strong><br><strong>-- Servicios de domótica particular y para entidades empresariales.</strong><br><strong>-- FemtoTecnología para estudiar microorganismos hostiles.</strong>";
         }
         if(senial==0)
         {
            var mensaje= document.getElementById("zocalo");
            mensaje.innerHTML=
            mensaje.style.color="black";
            mensaje.style.fontSize="10px"
            mensaje.innerHTML=
        "<strong>-- Diseño de Software destinado a la Aeronáutica.</strong><br><strong>-- Desarrollo de agricultura vertical.</strong><br><strong>-- Servicios de domótica particular y para entidades empresariales.</strong><br><strong>-- FemtoTecnología para estudiar microorganismos hostiles.</strong>";
         }
    });

    //BOTON 4 //
    var BOT4 = document.getElementsByClassName("noticia")[3];
    var mostrarBloque4= document.getElementsByClassName("parrafo")[3];
    BOT4.addEventListener("mouseenter", SIdestacaBloque4);
    function SIdestacaBloque4()
    {
        BOT4.style.backgroundColor="rgba(163, 180, 9, 0.596)";
        BOT4.style.color="rgba(0, 0, 19, 0.89)";
    }
    BOT4.addEventListener("mouseleave", NOdestacaBloque4);
    function NOdestacaBloque4()
    {
        BOT4.style.backgroundColor="rgba(0, 0, 19, 0.89)";
        BOT4.style.color="rgba(230, 230, 11, 0.719)";
        mostrarBloque4.innerHTML="";  /*BORRAR LO QUE SE HABÍA COLOCADO*/
      
        if(senial==0)
        { //// Y SE RECUPERA LO QUE ANTES PONIA EN EL ZOCALO ////
           var mensaje= document.getElementById("zocalo");
           mensaje.innerHTML=
           mensaje.style.color="black";
           mensaje.style.fontSize="14px"
           mensaje.innerHTML="-------- Fundadores --------<br><strong>William Wissangel</strong></br><strong>Sharyllín Rousher</strong><br>---- Correo Electrónico ----</br><strong>sfer4D_corporation@outlook.com</strong>";
        }
    }
    //FUNCIONES DEL BOTON//
    BOT4.addEventListener("click",function(){
         if(senial==5)
         {
           mostrarBloque4.style.color="black";
           mostrarBloque4.style.fontSize="13px"
           mostrarBloque4.innerHTML=
        "<strong>-- Rotor de antigravedad manual para maqinaria pesada.</strong><br><strong>-- Mapeador tridimensional de estructuras hasta 10 km de radio.</strong><br><strong>-- Proyectores de holografía HD sin pantalla física requerida.</strong><br><strong>-- Perforadores de laser para tuneladoras veloces.</strong>";
         }
         if(senial==4)
         {
           mostrarBloque4.style.color="black";
           mostrarBloque4.style.fontSize="12px"
           mostrarBloque4.innerHTML=
        "<strong>-- Rotor de antigravedad manual para maqinaria pesada.</strong><br><strong>-- Mapeador tridimensional de estructuras hasta 10 km de radio.</strong><br><strong>-- Proyectores de holografía HD sin pantalla física requerida.</strong><br><strong>-- Perforadores de laser para tuneladoras veloces.</strong>";
         }
         if(senial==3)
         {
           mostrarBloque4.style.color="black";
           mostrarBloque4.style.fontSize="9px"
           mostrarBloque4.innerHTML=
        "<strong>-- Rotor de antigravedad manual para maqinaria pesada.</strong><br><strong>-- Mapeador tridimensional de estructuras hasta 10 km de radio.</strong><br><strong>-- Proyectores de holografía HD sin pantalla física requerida.</strong><br><strong>-- Perforadores de laser para tuneladoras veloces.</strong>";
         }
         if(senial==2)
         {
           mostrarBloque4.style.color="black";
           mostrarBloque4.style.fontSize="8px"
           mostrarBloque4.innerHTML=
        "<strong>-- Rotor de antigravedad manual para maqinaria pesada.</strong><br><strong>-- Mapeador tridimensional de estructuras hasta 10 km de radio.</strong><br><strong>-- Proyectores de holografía HD sin pantalla física requerida.</strong><br><strong>-- Perforadores de laser para tuneladoras veloces.</strong>";
         }
         if(senial==1)
         {
           mostrarBloque4.style.color="black";
           mostrarBloque4.style.fontSize="7px"
           mostrarBloque4.innerHTML=
        "<strong>-- Rotor de antigravedad manual para maqinaria pesada.</strong><br><strong>-- Mapeador tridimensional de estructuras hasta 10 km de radio.</strong><br><strong>-- Proyectores de holografía HD sin pantalla física requerida.</strong><br><strong>-- Perforadores de laser para tuneladoras veloces.</strong>";
         }
         if(senial==0)
         {
            var mensaje= document.getElementById("zocalo");
            mensaje.innerHTML=
            mensaje.style.color="black";
            mensaje.style.fontSize="10px"
            mensaje.innerHTML=
        "<strong>-- Rotor de antigravedad manual para maqinaria pesada.</strong><br><strong>-- Mapeador tridimensional de estructuras hasta 10 km de radio.</strong><br><strong>-- Proyectores de holografía HD sin pantalla física requerida.</strong><br><strong>-- Perforadores de laser para tuneladoras veloces.</strong>";
         }
    });  
}
