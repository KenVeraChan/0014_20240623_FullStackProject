/******************************************************************/
/********* 0) RATON ENTRANDO EN AREA DE BOTONES DEL MENU **********/
/******************************************************************/

var elemento1= document.getElementsByClassName("bloque_opciones");
var elemento4= document.getElementsByClassName("areaPrivada");

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
}
