var elemento1= document.getElementsByClassName("bloque_opciones");
var elemento2= document.getElementsByClassName("tabla");
var elemento3= document.getElementsByClassName("cabecera");
var elemento4= document.getElementsByClassName("consulta");
var elemento5= document.getElementsByClassName("celdas");
var elemento6= document.getElementsByClassName("desplegable");
var botonForm= document.getElementsByClassName("boton");

function tablaEliminacion()
{
   //EFECTO COLOR DEL BOTONES DEL FORMULARIO ELIMINAR//
    //BOTON DE ACTUALIZAR(0)--CARGAR(1)--LIMPIAR(2)//
    for(let i=0;i<3;i++)
        {
            botonForm[i].addEventListener("mouseenter",function(){
            botonForm[i].style.transitionDuration = "0.5s";
            botonForm[i].style.backgroundColor="rgb(245,173,30)";
        })
        botonForm[i].addEventListener("mouseleave",function(){
            botonForm[i].style.transitionDuration = "0.5s";
            botonForm[i].style.backgroundColor="white";
        })
    }
    //OPCIONES-BUSQUEDA-INSERCCION-ACTUALIZACION-ELIMINACION //
    for(let i=0;i<elemento1.length;i++)
        {
        elemento1[i].addEventListener('mouseenter',function(){
            elemento1[i].style.background= "-webkit-linear-gradient(top, #FFAB00,#FFFFFF)";
                })
        elemento1[i].addEventListener('mouseleave',function(){
            elemento1[i].style.background= "-webkit-linear-gradient(top,#FFFFFF, #FFAB00)";
                })
        }
    //TITULO PAGINA Y CABECERA
    elemento3[0].style.color="black";
    //Se bloquean todas las celdas salvo la primera que es el ID para no interatuar con las demás
        for(i=0;i<5;i++)
            {
                if(i==0)
                    {
                        //No hace nada porque no puede bloquear la celda del ID
                        elemento6[i].disabled=true;
                        elemento6[i+1].disabled=true;
                    }
                else
                {
                    elemento5[i].disabled=true;
                }
            }
}