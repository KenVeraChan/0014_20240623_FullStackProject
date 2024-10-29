/******************************************************************/
/********* 0) RATON ENTRANDO EN AREA DE BOTONES DEL MENU **********/
/******************************************************************/

var elemento2= document.getElementsByClassName("filaVenta");
var elemento4= document.getElementsByClassName("areaPrivada");

function cargarPagina()
{
    for(let i=0;i<elemento2.length;i++)
    {
        //FILAS DE LAS VENTAS SELECCIONADAS
        elemento2[i].style.visibility="visible";
        elemento2[i].style.background= "rgba(0, 0, 19, 0.89)";
        elemento2[i].addEventListener('mouseenter',function(){
            elemento2[i].style.transitionDuration = "0.5s";
            elemento2[i].style.background= "yellow";
            elemento2[i].style.color="rgb(13,9,77)";
                })
        elemento2[i].addEventListener('mouseleave',function(){
            elemento2[i].style.transitionDuration = "0.5s";
            elemento2[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento2[i].style.color="yellow";
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