function cargarPagina()
{
    //MUESTRA LA TABLA EN FORMA PAGINADA PARA VER COMO QUEDA LA MISMA TRAS LOS CAMBIOS
    //Nota: con getElementById se necesita declarar dentro del método
    var botonForm= document.getElementById("imagenPortada");
    botonForm.style.transitionDuration = "1s";
    botonForm.style.opacity = "0.25";
    //Carga de la tabla de la BBDD
    if(window.screen.width>1100)
    {
        var entrada=document.getElementById("tablaBotones");
        entrada.style.transitionDuration="1.3s";
        entrada.style.marginLeft= "10%";

        var entradaJEFES=document.getElementById("eleccionesJEFE");
        entradaJEFES.style.transitionDuration="1.3s";
        entradaJEFES.style.marginLeft= "15%";
    
        var entradaRRHH=document.getElementById("eleccionesRRHH");
        entradaRRHH.style.transitionDuration="1.6s";
        entradaRRHH.style.marginLeft= "15%";
    
        var entradaVOLVER=document.getElementById("eleccionesEMPLEADO");
        entradaVOLVER.style.transitionDuration="1.9s";
        entradaVOLVER.style.marginLeft= "15%";
    }    
    if(window.screen.width>768 && window.screen.width<=1100)
    {
        var entrada=document.getElementById("tablaBotones");
        entrada.style.transitionDuration="1.3s";
        entrada.style.marginLeft= "10%";
                
        var entradaJEFES=document.getElementById("eleccionesJEFE");
        entradaJEFES.style.transitionDuration="1.3s";
        entradaJEFES.style.marginLeft= "10%";
    
        var entradaRRHH=document.getElementById("eleccionesRRHH");
        entradaRRHH.style.transitionDuration="1.6s";
        entradaRRHH.style.marginLeft= "10%";
    
        var entradaVOLVER=document.getElementById("eleccionesEMPLEADO");
        entradaVOLVER.style.transitionDuration="1.9s";
        entradaVOLVER.style.marginLeft= "10%";
    }
    if(window.screen.width>555 && window.screen.width<=768)
    {
        var entrada=document.getElementById("tablaBotones");
        entrada.style.transitionDuration="1.3s";
        entrada.style.marginLeft= "10%";
                
        var entradaJEFES=document.getElementById("eleccionesJEFE");
        entradaJEFES.style.transitionDuration="1.3s";
        entradaJEFES.style.marginLeft= "10%";
    
        var entradaRRHH=document.getElementById("eleccionesRRHH");
        entradaRRHH.style.transitionDuration="1.6s";
        entradaRRHH.style.marginLeft= "10%";
    
        var entradaVOLVER=document.getElementById("eleccionesEMPLEADO");
        entradaVOLVER.style.transitionDuration="1.9s";
        entradaVOLVER.style.marginLeft= "10%";
    }
    if(window.screen.width>481 && window.screen.width<=555)
    {
        var entrada=document.getElementById("tablaBotones");
        entrada.style.transitionDuration="1.3s";
        entrada.style.marginLeft= "10%";
                
        var entradaJEFES=document.getElementById("eleccionesJEFE");
        entradaJEFES.style.transitionDuration="1.3s";
        entradaJEFES.style.marginLeft= "10%";
    
        var entradaRRHH=document.getElementById("eleccionesRRHH");
        entradaRRHH.style.transitionDuration="1.6s";
        entradaRRHH.style.marginLeft= "10%";
    
        var entradaVOLVER=document.getElementById("eleccionesEMPLEADO");
        entradaVOLVER.style.transitionDuration="1.9s";
        entradaVOLVER.style.marginLeft= "10%";
    }
    if(window.screen.width>300 && window.screen.width<=481)
    {
        var entrada=document.getElementById("tablaBotones");
        entrada.style.transitionDuration="1.3s";
        entrada.style.marginLeft= "15%";
                
        var entradaJEFES=document.getElementById("eleccionesJEFE");
        entradaJEFES.style.transitionDuration="1.3s";
        entradaJEFES.style.marginLeft= "10%";
    
        var entradaRRHH=document.getElementById("eleccionesRRHH");
        entradaRRHH.style.transitionDuration="1.6s";
        entradaRRHH.style.marginLeft= "10%";
    
        var entradaVOLVER=document.getElementById("eleccionesEMPLEADO");
        entradaVOLVER.style.transitionDuration="1.9s";
        entradaVOLVER.style.marginLeft= "10%";
    }
    if(window.screen.width>100 && window.screen.width<=300)
    {
        var entrada=document.getElementById("tablaBotones");
        entrada.style.transitionDuration="1.3s";
        entrada.style.marginLeft= "7%";
                
        var entradaJEFES=document.getElementById("eleccionesJEFE");
        entradaJEFES.style.transitionDuration="1.3s";
        entradaJEFES.style.marginLeft= "10%";
    
        var entradaRRHH=document.getElementById("eleccionesRRHH");
        entradaRRHH.style.transitionDuration="1.6s";
        entradaRRHH.style.marginLeft= "10%";
    
        var entradaVOLVER=document.getElementById("eleccionesEMPLEADO");
        entradaVOLVER.style.transitionDuration="1.9s";
        entradaVOLVER.style.marginLeft= "10%";
    }

    var JEFES = document.getElementById("eleccionesJEFE");
    //REACCION DEL BOTON DE JEFES
    JEFES.addEventListener('mouseenter',function(){
        JEFES.style.transitionDuration="0.25s";
        JEFES.style.boxShadow="18px 18px 18px white";
    })
    JEFES.addEventListener('mouseleave',function(){
        JEFES.style.transitionDuration="0.25s";
        JEFES.style.boxShadow="none";
    })

    var RRHH= document.getElementById("eleccionesRRHH");
    //REACCION DEL BOTON DE RRHH
    RRHH.addEventListener('mouseenter',function(){
        RRHH.style.transitionDuration="0.25s";
        RRHH.style.boxShadow="18px 18px 18px white";
    })
    RRHH.addEventListener('mouseleave',function(){
        RRHH.style.transitionDuration="0.25s";
        RRHH.style.boxShadow="none";
    })

    var volver= document.getElementById("eleccionesEMPLEADO");
    //REACCION DEL BOTON DE VUELTA
    volver.addEventListener('mouseenter',function(){
        volver.style.transitionDuration="0.25s";
        volver.style.boxShadow="18px 18px 18px white";
    })
    volver.addEventListener('mouseleave',function(){
        volver.style.transitionDuration="0.25s";
        volver.style.boxShadow="none";
    })
}
