/******************************************************************/
/********* 0) RATON ENTRANDO EN AREA DE BOTONES DEL MENU **********/
/******************************************************************/


var elemento1= document.getElementsByClassName("bloque_opciones");
var elemento2= document.getElementsByClassName("celdaV");
var elemento4= document.getElementsByClassName("areaPrivada");
var elemento5= document.getElementsByClassName("pulsadorActualizar");
var elemento6= document.getElementsByClassName("celdaS");

function cargarPagina()
{
    var elemento3= document.getElementById("trasCompra");   //Los de tipo ID se tienen que declarar dentro de la función
    //PONER DE COLOR DORADO TODOS LOS BOTONES PRESENTES
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
    //FILAS DE LAS VENTAS SELECCIONADAS
    elemento2[4].addEventListener('mouseenter',function(){
        elemento2[4].style.transitionDuration = "0.5s";
        elemento2[4].style.background= "yellow";
        elemento6[4].style.background= "yellow";
        elemento2[4].style.color="rgb(13,9,77)";
        elemento6[4].style.color="rgb(13,9,77)";
        elemento3.style.color="rgb(13,9,77)";
            })
    elemento2[4].addEventListener('mouseleave',function(){
        elemento2[4].style.transitionDuration = "0.5s";
        elemento2[4].style.background= "rgba(0, 0, 19, 0.89)";
        elemento6[4].style.background= "rgba(1, 1, 22, 0)";
        elemento2[4].style.color="yellow";
        elemento6[4].style.color="yellow";
        elemento3.style.color="yellow";
            })   
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
    for(let i=0;i<elemento5.length;i++)
        {
            //BOTONES DE AREAS DE RRHH, JEFES Y CLIENTES
            elemento5[i].addEventListener('mouseenter',function(){
                elemento5[i].style.transitionDuration = "0.5s";
                elemento5[i].style.backgroundColor="black";    
                elemento5[i].style.color="yellow";
                elemento5[i].style.boxShadow="black 1px 0 20px";
                elemento5[i].style.borderRadius="30%";
                    })
            elemento5[i].addEventListener('mouseleave',function(){
                elemento5[i].style.transitionDuration = "0.5s";
                elemento5[i].style.backgroundColor="transparent";
                elemento5[i].style.boxShadow="none";
                elemento5[i].style.color="black";
                elemento5[i].style.borderRadius="30%";
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
    if(tipoLetrero==3)
        {
            //LETRERO DE ES NECESARIO REGISTRAR UN MÉTODO DE PAGO DE COMPRAS
            letrero.innerHTML="NO SE HA DETECTADO NINGUNA TARJETA DE COMPRA. ACTUALICE SU PERFIL DE USUARIO!";
            letrero.style.color="rgb(255,21,21)";
        }
    if(tipoLetrero==4)
        {
            //LETRERO DE ES NECESARIO REGISTRAR UN MÉTODO DE PAGO DE COMPRAS
            letrero.innerHTML="INSUFICIENTES DATOS PERSONALES PARA REALZAR LA COMPRA. ACTUALICE SU PERFIL DE USUARIO!";
            letrero.style.color="rgb(255,21,21)";
        }
    if(tipoLetrero==5)
        {
            //LETRERO DE CARGA COMPLETA DE TODOS LAS UNIDADES DETECTADAS EN EL CARRITO DE LA COMPRA
            letrero.innerHTML="COMPRA REALIZADA EXITOSAMENTE!";
            letrero.style.color="rgb(45,255,21)";
        }
    if(tipoLetrero==6)
        {
            //LETRERO DE CARGA COMPLETA DE TODOS LAS UNIDADES DETECTADAS EN EL CARRITO DE LA COMPRA
            letrero.innerHTML="CARRITO DE LA COMPRA VACIADO!";
            letrero.style.color="rgb(45,255,21)";
        }
    if(tipoLetrero==7)
        {
            //LETRERO DE CARGA COMPLETA DE TODOS LAS UNIDADES DETECTADAS EN EL CARRITO DE LA COMPRA
            letrero.innerHTML="CANTIDAD DE UN PRODUCTO DEL CARRITO CAMBIADO EXITOSAMENTE!";
            letrero.style.color="rgb(45,255,21)";
        }
    if(tipoLetrero==8)
        {
            //LETRERO DE CARGA COMPLETA DE TODOS LAS UNIDADES DETECTADAS EN EL CARRITO DE LA COMPRA
            letrero.innerHTML="ERROR EN EL CAMBIO DE LA CANTIDAD DE UN PRODUCTO!";
            letrero.style.color="rgb(255,21,21)";
        }
    if(tipoLetrero==9)
        {
            //LETRERO DE CARGA COMPLETA DE TODOS LAS UNIDADES DETECTADAS EN EL CARRITO DE LA COMPRA
            letrero.innerHTML="NO QUEDARÍAN MAS UNIDADES EN EL ALMACEN PARA VENDER!";
            letrero.style.color="rgb(255,21,21)";
        }
    if(tipoLetrero>0 && tipoLetrero<10)
    {
        letrero.style.paddingTop="10px";
        letrero.style.boxShadow= "rgb(150,150,150) 5px 5px 20px 10px";
        letrero.style.transitionDuration = "1s";
        if(tipoLetrero==9)
        {
            letrero.style.zIndex="10";
            letrero.style.marginTop="500px";
        }
        else
        {
            letrero.style.marginTop="0px";
        }
        document.addEventListener("mousemove",function(){
        let temporizador=setTimeout(function(){
            var letrero= document.getElementsByClassName("letreroOK")[0];
            letrero.style.transitionDuration = "1s";
            letrero.style.marginTop="-50px";
        },3500);
        })
        clearTimeout(temporizador);
    }
        //ANIMACION DEL PERFIL DE USUARIO CLIENTE
        var clienteLogin= document.getElementById("cerrarSesion");
        var clienteNombre= document.getElementById("bienvenido");
        clienteNombre.addEventListener("mouseenter",function(){
                clienteLogin.style.color="rgb(242,177,0)";
                clienteNombre.style.color="rgb(242,177,0)";
        });
        clienteNombre.addEventListener("mouseleave",function(){
                clienteLogin.style.color="white";
                clienteNombre.style.color="white";
        });
}
//AREA DE CAMBIO DE STOCK CUANDO SE VAN SACANDO UNIDADES DEL ALMACEN
let datoStock=0;
function cambiaStock(actualStock)
{
    const uno=document.getElementById("despliegue");
    datoStock=actualStock-uno.value;
    document.getElementById("trasCompra").value=datoStock;

    if(datoStock<=0)
    {
        //Se avisa de que no quedan mas unidades en el STOCK
        letreroConfirmado(9);
    }
}
