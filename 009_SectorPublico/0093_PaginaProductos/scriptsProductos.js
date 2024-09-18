/******************************************************************/
/********* 0) RATON ENTRANDO EN AREA DE BOTONES DEL MENU **********/
/******************************************************************/

var elemento1= document.getElementsByClassName("bloque_opciones");
var elemento2= document.getElementsByClassName("noticia");
var elemento3= document.getElementsByClassName("parrafo");
var elemento4= document.getElementsByClassName("areaPrivada");
var elemento5= document.getElementsByClassName("acceder");

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
            elemento4[i].style.bordeRadius="25px 0px 25px 0px";
            elemento4[i].style.boxShadow="white 1px 0 40px";
                })
        elemento4[i].addEventListener('mouseleave',function(){
            elemento4[i].style.transitionDuration = "0.5s";
            elemento4[i].style.border="none";
            elemento4[i].style.bordeRadius="none";
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
}