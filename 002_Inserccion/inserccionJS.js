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
            elemento1[i].style.background= "rgb(0, 226, 0)";
            elemento1[i].style.color="rgba(0, 0, 19, 0.89)";
                })
        elemento1[i].addEventListener('mouseleave',function(){
            elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento1[i].style.color="rgb(0, 226, 0)";
                })
        }   
    //EFECTO COLOR DEL BOTON: INSERTAR, DEL CUADRO DEL FORMULARIO//
    for(let i=0;i<botonForm.length;i++)
        {
        botonForm[i].addEventListener("mouseenter",function(){
            botonForm[i].style.transitionDuration = "0.5s";
            botonForm[i].style.backgroundColor="rgb(28,203,28)";
            })
        botonForm[i].addEventListener("mouseleave",function(){
                botonForm[i].style.transitionDuration = "0.5s";
                botonForm[i].style.backgroundColor="white";
            })
        } 
}