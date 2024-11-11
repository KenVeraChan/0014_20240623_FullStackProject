/******************************************************************/
/********* 0) RATON ENTRANDO EN AREA DE BOTONES DEL MENU **********/
/******************************************************************/

var elemento1= document.getElementsByClassName("boton");
var elemento2= document.getElementsByClassName("filaVenta");
var elemento4= document.getElementsByClassName("areaPrivada");

function cargarPagina()
{
    for(let i=0;i<elemento1.length;i++)
    {
        //BOTONES de opciones
        elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
        elemento1[i].addEventListener('mouseenter',function(){
            elemento1[i].style.transitionDuration = "0.5s";
            elemento1[i].style.background= "yellow";
            elemento1[i].style.color="rgb(13,9,77)";
                })
        elemento1[i].addEventListener('mouseleave',function(){
            elemento1[i].style.transitionDuration = "0.5s";
            elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento1[i].style.color="yellow";
        })   
    } 
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
    var elemento1= document.getElementsByClassName("boton");
    var letrero= document.getElementsByClassName("letreroOK")[0];
    if(tipoLetrero==0)
        {
            //LETRERO DE NO HACE NADA PORQUE NO SE DETECTARON MODIFICACIONES
        }
    if(tipoLetrero==1)
        {
            //LETRERO DE DATOS ACTUALIZADOS CORRECTAMENTE
            letrero.innerHTML="DATOS DEL SOCIO ACTUALIZADOS CORRECTAMENTE SIN FOTO!";
            letrero.style.color="rgb(45,255,21)";
        }
    if(tipoLetrero==2)
        {
            //LETRERO DE DATOS INTRODUCIDOS INCORRECTAMENTE
            letrero.innerHTML="DATOS INTRODUCIDOS INCORRECTAMENTE!";
            letrero.style.color="rgb(255,21,21)";
        }
    if(tipoLetrero==3)
        {
            //LETRERO DE DADA DE BAJA UN USUSARIO
            letrero.innerHTML="CUENTA DADA DE BAJA CORRECTAMENTE!";
            letrero.style.color="rgb(255,21,21)";
        }
    if(tipoLetrero==4)
        {
            //LETRERO DE DATOS CARGADOS CORRECTAMENTE
            letrero.innerHTML="DATOS CARGADOS CORRECTAMENTE!";
            letrero.style.color="rgb(45,255,21)";
            elemento1[2].style.visibility="visible";
            elemento1[3].style.visibility="visible";
        }
    if(tipoLetrero==5)
        {
            //LETRERO DE DATOS CARGADOS CORRECTAMENTE
            letrero.innerHTML="ERROR! LA IMAGEN QUE SE PRETENDE SUBIR NO ES JPG/PNG/JPEG/GIF!";
            letrero.style.color="rgb(255,21,21)";
        } 
    if(tipoLetrero==6)
        {
            //LETRERO DE DATOS CARGADOS CORRECTAMENTE
            letrero.innerHTML="ERROR! LA IMAGEN QUE SE PRETENDE SUBIR SUPERA LOS 3MB!";
            letrero.style.color="rgb(255,21,21)";
        }  
    if(tipoLetrero==7)
        {
            //LETRERO DE DATOS ACTUALIZADOS CORRECTAMENTE
            letrero.innerHTML="DATOS DEL SOCIO ACTUALIZADOS CORRECTAMENTE CON FOTO!";
            letrero.style.color="rgb(45,255,21)";
        }  
    if(tipoLetrero>0 && tipoLetrero<8)
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