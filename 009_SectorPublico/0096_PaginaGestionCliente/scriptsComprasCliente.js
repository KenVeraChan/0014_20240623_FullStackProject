/******************************************************************/
/********* 0) RATON ENTRANDO EN AREA DE BOTONES DEL MENU **********/
/******************************************************************/

var elemento1= document.getElementsByClassName("bloque_opciones");
var elemento2= document.getElementsByClassName("noticia");
var elemento3= document.getElementsByClassName("parrafo");
var elemento4= document.getElementsByClassName("areaPrivada");
var elemento5= document.getElementsByClassName("acceder");
var elemento6= document.getElementsByClassName("comprar");

function cargarPagina()
{
    //PONER DE COLOR DORADO TODOS LOS BOTONES PRESENTES
    //OPCIONES-BUSQUEDA-INSERCCION-ACTUALIZACION-ELIMINACION //
    for(let i=0;i<elemento1.length;i++)
    {
        //BOTON DE OPCIONES VISIBLE
        elemento1[i].style.visibility="visible";
        elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
        elemento1[i].addEventListener('mouseenter',function(){
            elemento1[i].style.transitionDuration = "0.5s";
            elemento1[i].style.background= "yellow";
            elemento1[i].style.color="rgba(0, 0, 19, 0.89)";
                })
        elemento1[i].addEventListener('mouseleave',function(){
            elemento1[i].style.transitionDuration = "0.5s";
            elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento1[i].style.color="yellow";
                })
    }
    for(let i=0;i<elemento4.length;i++)
    {
        //BOTONES DE AREAS DE RRHH, JEFES Y CLIENTES
        elemento4[i].addEventListener('mouseenter',function(){
            elemento4[i].style.transitionDuration = "0.5s";
            elemento4[i].style.border="solid 2px rgba(0, 0, 19, 0.89)";
            elemento4[i].style.borderRadius="25px 0px 25px 0px";
            elemento4[i].style.boxShadow="white 1px 0 40px";
                })
        elemento4[i].addEventListener('mouseleave',function(){
            elemento4[i].style.transitionDuration = "0.5s";
            elemento4[i].style.border="none";
            elemento4[i].style.borderRadius="none";
            elemento4[i].style.boxShadow="none";
                })
    }
    //PARA LOS PANELES DEL MOSTRADOR 
    for(let i=0;i<elemento2.length;i++)
    {
        elemento2[i].addEventListener('mouseenter',function(){
            elemento2[i].style.transitionDuration = "0.5s";
            elemento2[i].style.background= "rgb(12,22,111)";
            elemento2[i].style.color="white";
                switch(i)   //RATON ENTRANDO EN LOS BLOQUES INFORMATIVOS PARA MOSTRAR EL CONTENIDO
                    {
                    case 0: elemento3[i].innerHTML="<strong> Materiales de construcción: terrestre y espacial, no de obra civil</strong>";
                    break;
                    case 1: elemento3[i].innerHTML="<strong> Productos de diseño industrial, programación robótica y automatización de maquinaria de producción</strong>";
                    break;
                    case 2: elemento3[i].innerHTML= "<strong> Material de uso en laboratorio, tratamiento de productos químicos y biológicos del peligrosidad de nivel medio</strong>";
                    break;
                    case 3: elemento3[i].innerHTML=  "<strong> Productos de diseño de aeronaves y materiales de alta resistencia y baja densidad para movilidad en espacios hostiles, así como elementos de investigación espacial</strong>";
                    break;
                    default: break;
                    }            
                })
        elemento2[i].addEventListener('mouseleave',function(){
            elemento2[i].style.transitionDuration = "0.5s";
            elemento2[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento2[i].style.color="rgba(230, 230, 11, 0.719)";
                    switch(i)
                    {
                    case 0: elemento3[i].innerHTML="";
                    break;
                    case 1: elemento3[i].innerHTML="";
                    break;
                    case 2: elemento3[i].innerHTML="";
                    break;
                    case 3: elemento3[i].innerHTML= "";
                    break;
                    default: break;
                        }  
                })
    }
    //BOTONES DEL CATALOGO DE OPCIONES
    for(let i=0;i<elemento5.length;i++)
        {
            elemento5[i].addEventListener('mouseenter',function(){
                elemento5[i].style.transitionDuration = "0.5s";
                elemento5[i].style.background= "rgb(211,218,19)";
                elemento5[i].style.color="rgb(12,12,68)";          
                    })
            elemento5[i].addEventListener('mouseleave',function(){
                elemento5[i].style.transitionDuration = "0.5s";
                elemento5[i].style.background= "rgb(2, 2, 27)";
                elemento5[i].style.color="rgb(211,218,19)";  
                    })
        }
    //BOTON DE COMPRAR
    for(let i=0;i<elemento6.length;i++)
        {
            elemento6[i].addEventListener('mouseenter',function(){
                elemento6[i].style.transitionDuration = "0.5s";
                elemento6[i].style.backgroundImage= "url('../../009_SectorPublico/0093_PaginaProductos/images/CARRITO.png')";
                elemento6[i].innerHTML="COMPRAR";
                elemento6[i].style.boxShadow="white 1px 0 40px";        
                    })
            elemento6[i].addEventListener('mouseleave',function(){
                elemento6[i].style.transitionDuration = "0.5s";
                elemento6[i].style.backgroundImage= "url('../../009_SectorPublico/0093_PaginaProductos/images/CESTA.png')";
                elemento6[i].style.backgroundSize="65px"
                elemento6[i].style.backgroundColor="transparent"; 
                elemento6[i].innerHTML=""; 
                elemento6[i].style.boxShadow="none";   
                    })
        }
}

//LETRERO DE OKEY
function letreroConfirmado(tipoLetrero)
{
    var letrero= document.getElementsByClassName("letreroOK")[0];
    if(tipoLetrero==0)
        {
            //LETRERO DE NO HACE NADA PORQUE NO SE DETECTARON MODIFICACIONES
        }
    if(tipoLetrero==1)
        {
            //LETRERO DE QUE NO SE HAN DETECTADO UNIDADES EN EL CARRITO DE LA COMPRA
            letrero.innerHTML="NO SE HAN DETECTADO PRODUCTOS, SERVICIOS O PROYECTOS EN EL CARRITO DE LA COMPRA!";
            letrero.style.color="rgb(255,21,21)";
        }
    if(tipoLetrero==2)
        {
            //LETRERO DE CARGA COMPLETA DE TODOS LAS UNIDADES DETECTADAS EN EL CARRITO DE LA COMPRA
            letrero.innerHTML="CARRITO DE LA COMPRA CARGADO EXITOSAMENTE!";
            letrero.style.color="rgb(45,255,21)";
        }
    if(tipoLetrero>0 && tipoLetrero<3)
    {
        letrero.style.paddingTop="10px";
        letrero.style.boxShadow= "rgb(150,150,150) 5px 5px 20px 10px";
        letrero.style.transitionDuration = "1s";
        letrero.style.marginTop="0px";
    
        document.addEventListener("mousemove",function(){
        let temporizador=setTimeout(function(){
            var letrero= document.getElementsByClassName("letreroOK")[0];
            letrero.style.transitionDuration = "1s";
            letrero.style.marginTop="-50px";
        },3500);
        })
        clearTimeout(temporizador);
    }
}