function cargarPagina()
{
    //MUESTRA LA TABLA EN FORMA PAGINADA PARA VER COMO QUEDA LA MISMA TRAS LOS CAMBIOS
    //Nota: con getElementById se necesita declarar dentro del método
    var botonForm= document.getElementById("imagenPortada");
    botonForm.style.transitionDuration = "1s";
    botonForm.style.opacity = "0.25";
    //Carga de la tabla de la BBDD
    if(window.screen.width>768)
    {
        var entradaJEFES=document.getElementById("eleccionesJEFE");
        entradaJEFES.style.transitionDuration="1.3s";
        entradaJEFES.style.marginLeft= "0%";
    
        var entradaRRHH=document.getElementById("eleccionesRRHH");
        entradaRRHH.style.transitionDuration="1.6s";
        entradaRRHH.style.marginLeft= "0%";
    
        var entradaVOLVER=document.getElementById("eleccionesVOLVER");
        entradaVOLVER.style.transitionDuration="1.9s";
        entradaVOLVER.style.marginLeft= "0%";
    }
    if(window.screen.width<768)
        {
            var entradaJEFES=document.getElementById("eleccionesJEFE");
            entradaJEFES.style.transitionDuration="1.3s";
            entradaJEFES.style.marginLeft= "-50%";
        
            var entradaRRHH=document.getElementById("eleccionesRRHH");
            entradaRRHH.style.transitionDuration="1.6s";
            entradaRRHH.style.marginLeft= "-50%";
        
            var entradaVOLVER=document.getElementById("eleccionesVOLVER");
            entradaVOLVER.style.transitionDuration="1.9s";
            entradaVOLVER.style.marginLeft= "-50%";
        }


    //REACCION DEL BOTON DE JEFES
    entradaJEFES.addEventListener('mouseenter',function(){
        entradaJEFES.style.transitionDuration="1s";
        entradaJEFES.style.textShadow="white 1px 0 40px";
    })
    entradaJEFES.addEventListener('mouseleave',function(){
        entradaJEFES.style.transitionDuration="1s";
        entradaJEFES.style.textShadow="none";
    })

    //REACCION DEL BOTON DE RRHH
    entradaRRHH.addEventListener('mouseenter',function(){
        entradaRRHH.style.transitionDuration="1s";
        entradaRRHH.style.textShadow="white 1px 0 40px";
    })
    entradaRRHH.addEventListener('mouseleave',function(){
        entradaRRHH.style.transitionDuration="1s";
        entradaRRHH.style.textShadow="none";
    })

    //REACCION DEL BOTON DE VUELTA
    entradaVOLVER.addEventListener('mouseenter',function(){
        entradaVOLVER.style.transitionDuration="1s";
        entradaVOLVER.style.textShadow="white 1px 0 40px";
    })
    entradaVOLVER.addEventListener('mouseleave',function(){
        entradaVOLVER.style.transitionDuration="1s";
        entradaVOLVER.style.textShadow="none";
    })
}
