var elemento1= document.getElementsByClassName("bloque_opciones");

function cargarPagina()
{
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
} 
function llamada()
{
  alert("Poner aqui el fichero de paginacion para ver todos los empleados!");
}
//MUESTRA LA TABLA EN FORMA PAGINADA PARA VER COMO QUEDA LA MISMA TRAS LOS CAMBIOS
function muestraTablaPaginada() 
{
    var botonForm= document.getElementById("imagenPortada");
    botonForm.style.transitionDuration = "1s";
    botonForm.style.opacity = "0.25";
  }
