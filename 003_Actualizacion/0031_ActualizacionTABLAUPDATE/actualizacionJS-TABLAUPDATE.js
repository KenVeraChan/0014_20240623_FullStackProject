var elemento1= document.getElementsByClassName("bloque_opciones");
var elemento3= document.getElementsByClassName("cabecera");
var botonForm= document.getElementsByClassName("botones");
var elemento4= document.getElementsByClassName("uno");

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
    //CELDAS DE LA TABLA IMPROVISADA DE LOS DATOS
    for(let i=0;i<elemento4.length;i++)
    {  
        elemento4[i].style.background= "rgba(0, 0, 19, 0.89)";
        elemento4[i].style.fontsize= "small";
        elemento4[i].style.color="rgb(0,230,230)";
    }
    
    //TITULO PAGINA Y CABECERA
    //elemento3[0].style.color="black";
       //EFECTO COLOR DEL BOTONES DEL FORMULARIO//
    //BOTON DE ACTUALIZAR(0)//
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
}
function prueba()
{
    //Metodo para interactuar con las celdas de la tabla representada
    for(let i=0;i<elemento4.length;i++)
        {
    elemento4[i].addEventListener('mouseenter',function(){
        elemento4[i].style.background= "rgb(0,212,212)";
        elemento4[i].style.color="rgba(0, 0, 19, 0.89)";
            })
    elemento4[i].addEventListener('mouseleave',function(){
        elemento4[i].style.background= "rgba(0, 0, 19, 0.89)";
        elemento4[i].style.color="rgb(0,230,230)";
            })
        }
}