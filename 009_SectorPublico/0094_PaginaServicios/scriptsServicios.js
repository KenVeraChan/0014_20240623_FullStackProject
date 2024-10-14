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
        elemento1[i].style.background= "rgba(0, 19, 1, 0.89)";
        elemento1[i].addEventListener('mouseenter',function(){
            elemento1[i].style.transitionDuration = "0.5s";
            elemento1[i].style.background= "yellow";
            elemento1[i].style.color="rgba(0, 0, 19, 0.89)";
                })
        elemento1[i].addEventListener('mouseleave',function(){
            elemento1[i].style.transitionDuration = "0.5s";
            elemento1[i].style.background= "rgba(0, 19, 1, 0.89)";
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
            elemento2[i].style.background= "rgb(36,112,12)";
            elemento2[i].style.color="white";
            elemento3[i].style.visibility="visible";
                })
        elemento2[i].addEventListener('mouseleave',function(){
            elemento2[i].style.transitionDuration = "0.5s";
            elemento2[i].style.background= "rgba(1, 18, 0, 0.89)";
            elemento2[i].style.color="rgba(230, 230, 11, 0.719)";
            elemento3[i].style.visibility="hidden";
                })
    }
    //BOTONES DEL CATALOGO DE OPCIONES
    for(let i=0;i<elemento5.length;i++)
        {
            elemento5[i].addEventListener('mouseenter',function(){
                elemento5[i].style.transitionDuration = "0.5s";
                elemento5[i].style.background= "rgb(211,218,19)";
                elemento5[i].style.color="rgb(10,87,5)";          
                    })
            elemento5[i].addEventListener('mouseleave',function(){
                elemento5[i].style.transitionDuration = "0.5s";
                elemento5[i].style.background= "rgb(3, 43, 1)";
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
    if(tipoLetrero==1)
        {
            //LETRERO DE CARGA IMÁGENES SLIDER
            letrero.innerHTML="PRODUCTO AÑADIDO AL CARRITO DE LA COMPRA";
            letrero.style.color="rgb(19,229,61)";
        }
    if(tipoLetrero==2)
        {
            //LETRERO DE CARGA IMÁGENES SLIDER
            letrero.innerHTML="NO PUEDE DEJAR SIN SELECCIONAR LA CANTIDAD DE PRODUCTOS PARA COMPRAR!";
            letrero.style.color="rgb(178,6,6)";
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