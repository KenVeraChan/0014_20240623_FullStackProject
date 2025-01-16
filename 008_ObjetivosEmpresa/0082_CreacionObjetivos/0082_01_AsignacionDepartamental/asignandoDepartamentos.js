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
    if(window.screen.width>100 && window.screen.width<=555)
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
function cargaFormularios(indice)
{
    var JEFES=document.getElementsByClassName("consultaJEFES")[0];
    var RRHH=document.getElementsByClassName("consultaRRHH")[0];
    var EMPLEADO=document.getElementsByClassName("consultaEMPLEADOS")[0];

    if(indice==1)
    {
    //CARGA FORMULARIO JEFES
        //SE RETIRAN TODOS LOS FORMULARIOS DE RR.HH. Y DE EMPLEADOS
        RRHH.style.transitionDuration="0.3s";
        RRHH.style.marginLeft= "-1200%";
        RRHH.style.backgroundColor="rgba(0, 0, 19, 0.89)";
        RRHH.style.boxShadow="none";
        document.getElementById("eleccionesRRHH").style.backgroundColor="rgba(0, 0, 19, 0.89)";
        document.getElementById("eleccionesRRHH").style.color="rgb(255, 255, 255)";
        document.getElementById("eleccionesRRHH").style.textShadow = "none";

        EMPLEADO.style.transitionDuration="0.5s";
        EMPLEADO.style.marginLeft= "-1200%";
        EMPLEADO.style.backgroundColor="rgba(0, 0, 19, 0.89)";
        EMPLEADO.style.boxShadow="none";
        document.getElementById("eleccionesEMPLEADO").style.backgroundColor="rgba(0, 0, 19, 0.89)";
        document.getElementById("eleccionesEMPLEADO").style.color="rgb(255, 255, 255)";
        document.getElementById("eleccionesEMPLEADO").style.textShadow = "none";

        //SE COLOCA EN PANTALLA EL FORMULARIO DE JEFES
        JEFES.style.transitionDuration="0.7s";
        JEFES.style.marginLeft= "13.5%";
        JEFES.style.backgroundColor="rgba(0, 78, 5, 0.85)";
        JEFES.style.boxShadow="18px 18px 18px white";
        document.getElementById("eleccionesJEFE").style.backgroundColor="rgba(0, 78, 5, 0.85)";
        document.getElementById("eleccionesJEFE").style.color="rgba(115, 255, 0, 0.85)";
        document.getElementById("eleccionesJEFE").style.textShadow = "20px 20px 1px rgba(255, 255, 255, 0.65)"

    }
    if(indice==2)
    {
    //CARGA FORMULARIO RRHH
        //SE RETIRAN TODOS LOS FORMULARIOS DE RR.HH. Y DE EMPLEADOS
        JEFES.style.transitionDuration="0.3s";
        JEFES.style.marginLeft= "-1200%";
        JEFES.style.backgroundColor="rgba(0, 0, 19, 0.89)";
        JEFES.style.boxShadow="18px 18px 18px white";
        document.getElementById("eleccionesJEFE").style.backgroundColor="rgba(0, 0, 19, 0.89)";
        document.getElementById("eleccionesJEFE").style.color="rgb(255, 255, 255)";
        document.getElementById("eleccionesJEFE").style.textShadow = "none";

        EMPLEADO.style.transitionDuration="0.5s";
        EMPLEADO.style.marginLeft= "-1200%";
        EMPLEADO.style.backgroundColor="rgba(0, 0, 19, 0.89)";
        EMPLEADO.style.boxShadow="none";
        document.getElementById("eleccionesEMPLEADO").style.backgroundColor="rgba(0, 0, 19, 0.89)";
        document.getElementById("eleccionesEMPLEADO").style.color="rgb(255, 255, 255)";
        document.getElementById("eleccionesEMPLEADO").style.textShadow = "none";
        //SE COLOCA EN PANTALLA EL FORMULARIO DE JEFES
        RRHH.style.transitionDuration="0.7s";
        RRHH.style.marginLeft= "13.5%";
        RRHH.style.backgroundColor="rgba(77, 75, 0, 0.85)";
        RRHH.style.boxShadow="18px 18px 18px white";
        document.getElementById("eleccionesRRHH").style.backgroundColor="rgba(77, 75, 0, 0.85)";
        document.getElementById("eleccionesRRHH").style.color="rgba(255, 247, 0, 0.85)";
        document.getElementById("eleccionesRRHH").style.textShadow = "20px 20px 1px rgba(255, 255, 255, 0.65)";
    }
    if(indice==3)
    {
    //CARGA FORMULARIO EMPLEADOS
        //SE RETIRAN TODOS LOS FORMULARIOS DE RR.HH. Y DE EMPLEADOS
        JEFES.style.transitionDuration="0.3s";
        JEFES.style.marginLeft= "-1200%";
        JEFES.style.backgroundColor="rgba(0, 0, 19, 0.89)";
        JEFES.style.boxShadow="18px 18px 18px white";
        document.getElementById("eleccionesJEFE").style.backgroundColor="rgba(0, 0, 19, 0.89)";
        document.getElementById("eleccionesJEFE").style.color="rgb(255, 255, 255)";
        document.getElementById("eleccionesJEFE").style.textShadow = "none";

        RRHH.style.transitionDuration="0.5s";
        RRHH.style.marginLeft= "-1200%";
        RRHH.style.backgroundColor="rgba(0, 0, 19, 0.89)";
        RRHH.style.boxShadow="none";
        document.getElementById("eleccionesRRHH").style.backgroundColor="rgba(0, 0, 19, 0.89)";
        document.getElementById("eleccionesRRHH").style.color="rgb(255, 255, 255)";
        document.getElementById("eleccionesRRHH").style.textShadow = "none";

        //SE COLOCA EN PANTALLA EL FORMULARIO DE JEFES
        EMPLEADO.style.transitionDuration="0.7s";
        EMPLEADO.style.marginLeft= "13.5%";
        EMPLEADO.style.backgroundColor="rgba(92, 0, 0, 0.85)";
        EMPLEADO.style.boxShadow="18px 18px 18px white";
        document.getElementById("eleccionesEMPLEADO").style.backgroundColor="rgba(92, 0, 0, 0.85)";
        document.getElementById("eleccionesEMPLEADO").style.color="rgba(255, 0, 0, 0.85)";
        document.getElementById("eleccionesEMPLEADO").style.textShadow = "20px 20px 1px rgba(255, 255, 255, 0.65)";
    }
}