function cargarPagina()
{
    //MUESTRA LA TABLA EN FORMA PAGINADA PARA VER COMO QUEDA LA MISMA TRAS LOS CAMBIOS
    //Nota: con getElementById se necesita declarar dentro del método
    var botonForm= document.getElementById("imagenPortada");
    botonForm.style.transitionDuration = "1s";
    botonForm.style.opacity = "0.25";
    //Carga de la tabla de la BBDD
    var baseDatos=document.getElementsByClassName("elecciones");
    baseDatos[0].style.transitionDuration="0.3s";
    baseDatos[0].style.marginLeft= "35%";

    baseDatos[1].style.transitionDuration="0.6s";
    baseDatos[1].style.marginLeft= "35%";

    baseDatos[2].style.transitionDuration="0.9s";
    baseDatos[2].style.marginLeft= "35%";

    for(let i=0;i<baseDatos.length;i++)
    {
    baseDatos[i].addEventListener('mouseenter',function(){
            baseDatos[i].style.background="rgb(204, 0, 255)";
            baseDatos[i].style.color="rgba(0, 0, 19, 0.89)";
    })
    baseDatos[i].addEventListener('mouseleave',function(){
            baseDatos[i].style.background="rgba(0, 0, 19, 0.89)";
            baseDatos[i].style.color="rgb(204, 0, 255)";
    })
    }
}
