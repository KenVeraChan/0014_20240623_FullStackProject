function cargarPagina()
{
    //MUESTRA LA TABLA EN FORMA PAGINADA PARA VER COMO QUEDA LA MISMA TRAS LOS CAMBIOS
    //Nota: con getElementById se necesita declarar dentro del método
    var botonForm= document.getElementById("imagenPortada");
    botonForm.style.transitionDuration = "1s";
    botonForm.style.opacity = "0.25";
        if(window.screen.width<481)
        {
            //Carga de la tabla de la BBDD
            var baseDatos=document.getElementById("tablaLogin");
            baseDatos.style.transitionDuration="0.5s";
            baseDatos.style.marginLeft= "20%";
        }
        if(window.screen.width<599 && window.screen.width>=481)
        {
            //Carga de la tabla de la BBDD
            var tablaIndicaciones=document.getElementById("formularioLogin");
            tablaIndicaciones.style.transitionDuration="0.5s";
            tablaIndicaciones.style.marginLeft= "7%";
            tablaIndicaciones.style.width="78%";

            var baseDatos=document.getElementById("tablaLogin");
            baseDatos.style.transitionDuration="0.5s";
            baseDatos.style.marginLeft= "5%";

            var tablaIndicaciones=document.getElementById("indicaciones");
            tablaIndicaciones.style.transitionDuration="0.5s";
            tablaIndicaciones.style.marginLeft= "7%";
            tablaIndicaciones.style.width="85%";
        }
        if(window.screen.width<768 && window.screen.width>=600)
        {
            //Carga de la tabla de la BBDD
            var tablaIndicaciones=document.getElementById("formularioLogin");
            tablaIndicaciones.style.transitionDuration="0.5s";
            tablaIndicaciones.style.marginLeft= "14%";

            var baseDatos=document.getElementById("tablaLogin");
            baseDatos.style.transitionDuration="0.5s";
            baseDatos.style.marginLeft= "11%";

            var tablaIndicaciones=document.getElementById("indicaciones");
            tablaIndicaciones.style.transitionDuration="0.5s";
            tablaIndicaciones.style.marginLeft= "14%";
        }
        //Carga de la tabla de las INDICACIONES DE JEFES
        if(window.screen.width>=768 && window.screen.width<900)
        {
            //Carga de la tabla de la BBDD
            var tablaIndicaciones=document.getElementById("formularioLogin");
            tablaIndicaciones.style.transitionDuration="0.5s";
            tablaIndicaciones.style.marginLeft= "20%";

            var baseDatos=document.getElementById("tablaLogin");
            baseDatos.style.transitionDuration="0.5s";
            baseDatos.style.marginLeft= "5%";
            
            var tablaIndicaciones=document.getElementById("indicaciones");
            tablaIndicaciones.style.transitionDuration="0.5s";
            tablaIndicaciones.style.marginLeft= "20%";
        }
        if(window.screen.width>=900)
        {
            //Carga de la tabla de la BBDD
            var tablaIndicaciones=document.getElementById("formularioLogin");
            tablaIndicaciones.style.transitionDuration="0.5s";
            tablaIndicaciones.style.marginLeft= "30%";

            var baseDatos=document.getElementById("tablaLogin");
            baseDatos.style.transitionDuration="0.5s";
            baseDatos.style.marginLeft= "5%";
            
            var tablaIndicaciones=document.getElementById("indicaciones");
            tablaIndicaciones.style.transitionDuration="0.5s";
            tablaIndicaciones.style.marginLeft= "30%";
        }
    //Efecto de la tabla login
    var boton=document.getElementsByName("enviar");
    for(let i=0;i<boton.length;i++)
    {
        boton[i].addEventListener('mouseenter',function(){
            boton[i].style.background="rgb(204, 0, 255)";
            boton[i].style.color="rgba(0, 0, 19, 0.89)";
        })
        boton[i].addEventListener('mouseleave',function(){
            boton[i].style.background="rgba(0, 0, 46, 0.89)";
            boton[i].style.color="rgb(204, 0, 255)";
        })
    }
}