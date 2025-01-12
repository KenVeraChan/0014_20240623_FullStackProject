/******************************************************************/
/********* 0) RATON ENTRANDO EN AREA DE BOTONES DEL MENU **********/
/******************************************************************/

var elemento1= document.getElementsByClassName("bloque_opciones");
var elemento2= document.getElementsByClassName("noticia");
var elemento3= document.getElementsByClassName("parrafo");
var elemento4= document.getElementsByClassName("areaPrivada");
var elemento5= document.getElementsByClassName("textoTitulo");
var elemento6= document.getElementsByClassName("imgBloques");

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
                elemento5[i].style.visibility="visible"; 
                elemento3[i].style.visibility="visible";          
                    })
            elemento2[i].addEventListener('mouseleave',function(){
                elemento2[i].style.transitionDuration = "0.5s";
                elemento2[i].style.background= "rgba(0, 0, 19, 0.89)";
                elemento2[i].style.color="rgba(230, 230, 11, 0.719)";
                elemento5[i].style.visibility="hidden"; 
                elemento3[i].style.visibility="hidden"; 
                    })
        }
        //ANIMACION DEL PERFIL DE USUARIO CLIENTE
        var clienteLogin= document.getElementById("cerrarSesion");
        var clienteNombre= document.getElementById("bienvenido");
        clienteNombre.addEventListener("mouseenter",function(){
                clienteLogin.style.color="yellow";
                clienteNombre.style.color="yellow";
        });
        clienteNombre.addEventListener("mouseleave",function(){
                clienteLogin.style.color="white";
                clienteNombre.style.color="white";
        });
}