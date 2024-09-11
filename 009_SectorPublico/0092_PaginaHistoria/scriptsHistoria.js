/******************************************************************/
/********* 0) RATON ENTRANDO EN AREA DE BOTONES DEL MENU **********/
/******************************************************************/

var elemento1= document.getElementsByClassName("bloque_opciones");

function cargarPagina()
{
    //BOTON DE AREA PRIVADA ZONA SUPERIOR DERECHA
    var elemento4= document.getElementById("areaPrivada");
    elemento4.addEventListener('mouseenter',function(){
        elemento4.style.transitionDuration = "0.5s";
        elemento4.style.textShadow="white 1px 0 40px";
        elemento4.style.color= "white";
            })
    elemento4.addEventListener('mouseleave',function(){
        elemento4.style.transitionDuration = "0.5s";
        elemento4.style.textShadow="none";
        elemento4.style.color="yellow";
            })
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
}
