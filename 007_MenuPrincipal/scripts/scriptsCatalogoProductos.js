
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
}
/******************************************/
/** 2) ILUMINACION DE PRODUCTOS EN VENTA **/
/******************************************/

function enciendeBloque(value)
{
var P1= document.getElementsByClassName("cajaProducto")[value];
    P1.style.transition="0.4s";
    P1.style.backgroundColor="rgba(163, 180, 9, 0.596)";
}
function apagaBloque(value)
{
    var P1= document.getElementsByClassName("cajaProducto")[value];
    P1.style.transition="0.4s";
    P1.style.backgroundColor="rgb(3, 5, 105)";
}
