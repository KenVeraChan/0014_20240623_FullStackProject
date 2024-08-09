var elemento1= document.getElementsByClassName("bloque_opciones");
var elemento2= document.getElementsByClassName("tabla");
var elemento3= document.getElementsByClassName("cabecera");
var elemento4= document.getElementsByClassName("consulta");
var elemento5= document.getElementsByClassName("celdas");
var elemento6= document.getElementsByClassName("desplegable");
var botonForm= document.getElementsByClassName("boton");

function cargarPagina()
{
    //PONER DE COLOR DORADO TODOS LOS BOTONES PRESENTES
    //OPCIONES-BUSQUEDA-INSERCCION-ACTUALIZACION-ELIMINACION //
    for(let i=0;i<elemento1.length;i++)
        {
        //BOTON DE OPCIONES VISIBLE
        elemento1[i].style.visibility="visible";
        elemento1[i].style.borderRadius= "10px";
        elemento1[i].style.boxShadow= "rgb(150,150,150) 5px 5px 20px 10px";
        elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
        elemento1[i].addEventListener('mouseenter',function(){
            elemento1[i].style.background= "rgb(0, 153, 164)";
            elemento1[i].style.color="rgba(0, 0, 19, 0.89)";
                })
        elemento1[i].addEventListener('mouseleave',function(){
            elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento1[i].style.color="rgb(0, 228, 228)";
                })
        } 
   //EFECTO COLOR DEL BOTONES DEL FORMULARIO//
    //BOTON DE ACTUALIZAR(0)--CARGAR(1)--LIMPIAR(2)//
    for(let i=0;i<3;i++)
    {
            botonForm[i].addEventListener("mouseenter",function(){
            botonForm[i].style.transitionDuration = "0.5s";
            botonForm[i].style.backgroundColor="rgb(12,184,203)";
        })
        botonForm[i].addEventListener("mouseleave",function(){
            botonForm[i].style.transitionDuration = "0.5s";
            botonForm[i].style.backgroundColor="white";
        })
    }
    //TITULO PAGINA Y CABECERA
    //elemento3[0].style.color="black";
    //CAJAS DE DATOS Y DESPLEGABLES
    var i=0;
    //LA PRIMERA CELDA NO PUEDE ESTAR BLOQUEADA
    //CON EL ID SE PODRÁN ACTUALIZAR LOS DATOS DEL FORMULARIO
    elemento5[0].disabled=false;
    elemento5[0].value="";
    for(i=1; i<5;i++)
        {
            elemento5[i].value="";
            elemento5[i].disabled=true;
        }
    for(i=0; i<2;i++)
        {
            elemento6[i].value="";
            elemento6[i].disabled=true;
        }
    //SE BLOQUEA EL ACCESO A LA ACTUALIZACION SI NO HAY DATOS EN EL FORMULARIO
    botonForm[0].disabled=true;
}
