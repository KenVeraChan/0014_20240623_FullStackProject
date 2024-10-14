var elemento1= document.getElementsByClassName("bloque_opciones");
var elemento3= document.getElementsByClassName("cabecera");
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
            elemento1[i].style.background= "yellow";
            elemento1[i].style.color="rgba(0, 0, 19, 0.89)";
                })
        elemento1[i].addEventListener('mouseleave',function(){
            elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento1[i].style.color="rgba(230, 230, 11, 0.719)";
                })
        }
    //TITULO PAGINA Y CABECERA
    elemento3[0].style.color="black";
}
function prueba()
{
    //Metodo para interactuar con las celdas de la tabla representada
    for(let i=0;i<elemento4.length;i++)
        {
    elemento4[i].addEventListener('mouseenter',function(){
        elemento4[i].style.background= "yellow";
        elemento4[i].style.color="rgba(0, 0, 19, 0.89)";
            })
    elemento4[i].addEventListener('mouseleave',function(){
        elemento4[i].style.background= "rgba(0, 0, 19, 0.89)";
        elemento4[i].style.color="rgba(230, 230, 11, 0.719)";
            })
        }
}