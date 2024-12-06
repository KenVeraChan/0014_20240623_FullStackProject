/******************************************************************/
/********* 0) RATON ENTRANDO EN AREA DE BOTONES DEL MENU **********/
/******************************************************************/

var elemento1= document.getElementsByClassName("bloque_opciones");
var elemento2= document.getElementsByClassName("filaVenta");
var elemento3= document.getElementsByClassName("pulsadorCompra");
var elemento4= document.getElementsByClassName("areaPrivada");
var elemento5= document.getElementsByClassName("pulsadorDescarga");
var elemento6= document.getElementsByClassName("pulsadorEliminacion");
var elemento7= document.getElementsByClassName("pulsadorActualizar");

function cargarPagina()
{
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
    for(let i=0;i<elemento2.length;i++)
    {
        //FILAS DE LAS VENTAS SELECCIONADAS
        elemento2[i].style.visibility="visible";
        elemento2[i].style.background= "rgba(0, 0, 19, 0.89)";
        elemento2[i].addEventListener('mouseenter',function(){
            elemento2[i].style.transitionDuration = "0.5s";
            elemento2[i].style.background= "yellow";
            elemento2[i].style.color="rgb(13,9,77)";
            elemento7[i].style.color="rgb(13,9,77)";
                })
        elemento2[i].addEventListener('mouseleave',function(){
            elemento2[i].style.transitionDuration = "0.5s";
            elemento2[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento2[i].style.color="yellow";
            elemento7[i].style.color="yellow";
                })   
    }
    for(let i=0;i<elemento3.length;i++)
        {
            //BOTONES DE AREAS DE RRHH, JEFES Y CLIENTES
            elemento3[i].addEventListener('mouseenter',function(){
                elemento3[i].style.transitionDuration = "0.5s";
                elemento3[i].style.border="solid 2px rgba(0, 0, 19, 0.89)";
                elemento3[i].style.boxShadow="white 1px 0 40px";
                    })
            elemento3[i].addEventListener('mouseleave',function(){
                elemento3[i].style.transitionDuration = "0.5s";
                elemento3[i].style.border="none";
                elemento3[i].style.boxShadow="none";
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
    for(let i=0;i<elemento5.length;i++)
        {
            //BOTONES DE AREAS DE RRHH, JEFES Y CLIENTES
            elemento5[i].addEventListener('mouseenter',function(){
                elemento5[i].style.transitionDuration = "0.5s";
                elemento5[i].style.border="solid 2px rgba(0, 0, 19, 0.89)";
                elemento5[i].style.boxShadow="white 1px 0 40px";
                    })
            elemento5[i].addEventListener('mouseleave',function(){
                elemento5[i].style.transitionDuration = "0.5s";
                elemento5[i].style.border="none";
                elemento5[i].style.boxShadow="none";
                    })
        }
    for(let i=0;i<elemento6.length;i++)
        {
            //BOTONES DE AREAS DE RRHH, JEFES Y CLIENTES
            elemento6[i].addEventListener('mouseenter',function(){
                elemento6[i].style.transitionDuration = "0.5s";
                elemento6[i].style.border="solid 2px rgba(0, 0, 19, 0.89)";
                elemento6[i].style.boxShadow="white 1px 0 40px";
                    })
            elemento6[i].addEventListener('mouseleave',function(){
                elemento6[i].style.transitionDuration = "0.5s";
                elemento6[i].style.border="none";
                elemento6[i].style.boxShadow="none";
                    })
        }
    for(let i=0;i<elemento7.length;i++)
        {
            //BOTONES DE AREAS DE RRHH, JEFES Y CLIENTES
            elemento7[i].addEventListener('mouseenter',function(){
                elemento7[i].style.transitionDuration = "0.5s";
                elemento7[i].style.backgroundColor="black";    
                elemento7[i].style.color="yellow";
                elemento7[i].style.boxShadow="black 1px 0 20px";
                elemento7[i].style.borderRadius="30%";
                    })
            elemento7[i].addEventListener('mouseleave',function(){
                elemento7[i].style.transitionDuration = "0.5s";
                elemento7[i].style.backgroundColor="transparent";
                elemento7[i].style.boxShadow="none";
                elemento7[i].style.color="black";
                elemento7[i].style.borderRadius="30%";
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
            //LETRERO DE ERROR EN EL CAMBIO DE LA CANTIDAD DE UN PRODUCTO
            letrero.innerHTML="ERROR NO EXISTE ESE ITEM NI SU CANTIDAD!";
            letrero.style.color="rgb(255,21,21)";
        }
    if(tipoLetrero==9)
        {
            //LETRERO DE ERROR NO SE PUEDE MODIFICAR LA CANTIDAD DE UN PRODUCTO QUE NO EXISTE
            letrero.innerHTML="ERROR NO SE PUEDE MODIFICAR LA CANTIDAD DE UN PRODUCTO QUE NO EXISTE!";
            letrero.style.color="rgb(255,21,21)";
        }
    if(tipoLetrero==10)
        {
            //LETRERO DE QUE SE NO SE HA CAMBIADO LA CANTIDAD DE UN ELEMENTO SELECCIONADO
            letrero.innerHTML="NO SE HA MODIFICADO LA CANTIDAD DEL PRODUCTO ELEGIDO!";
            letrero.style.color="rgb(255,21,21)";
        }
    if(tipoLetrero==11)
        {
            //LETRERO DE QUE SE NO SE HA CAMBIADO LA CANTIDAD DE UN ELEMENTO SELECCIONADO
            letrero.innerHTML="SE HA ELIMINADO EL ELEMENTO ELEGIDO DEL CARRITO DE LA COMPRA!";
            letrero.style.color="rgb(255,21,21)";
        }
    if(tipoLetrero>0 && tipoLetrero<12)
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