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
            var baseDatos=document.getElementById("tablaLogin");
            baseDatos.style.transitionDuration="0.5s";
            baseDatos.style.marginLeft= "15%";
        }
        if(window.screen.width<768 && window.screen.width>=600)
        {
            //Carga de la tabla de la BBDD
            var baseDatos=document.getElementById("tablaLogin");
            baseDatos.style.transitionDuration="0.5s";
            baseDatos.style.marginLeft= "30%";
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
function letreroConfirmadaEntrada(seleccion)
{        
    var letrero= document.getElementsByClassName("letreroOK")[0];
    if(seleccion==0 || seleccion==1)
        {
            //seleccion==0 --> NO HACE NADA PORQUE NO SE HA GENERADO NINGUNA OPERACION DE ENTRADA EXITOSA O FALLIDA O EQUIVOCADA DE LOGIN
            //seleccion==1 --> NO SALE EL LETRERO PORQUE SE HA LOGEADO CORRECTAMENTE Y PASA A LA SIGUIENTE PÁGINA WEB
        }
    if(seleccion==2)
        {
        letrero.innerHTML="Lo siento. Ususario o contraseña INCORRECTOS"; 
        }
    if(seleccion==3)
        {
            letrero.innerHTML="Lo siento. Su ROL de RRHH no le permite el acceso al área de JEFES";   
        }
    if(seleccion==4)
        {
            letrero.innerHTML="Se ha cerrado la sesión de su cuenta de JEFE correctamente!";   
        }
    if(seleccion==5)
        {
            letrero.innerHTML="HA CADUCADO la sesión de su cuenta CLIENTE!"; 
        }
    if(seleccion>1 && seleccion<6)
        {
            letrero.style.paddingTop="10px";
            letrero.style.boxShadow= "rgb(150,150,150) 5px 5px 20px 10px";
            letrero.style.transitionDuration = "1s";
            letrero.style.marginTop="0px";
    
            document.addEventListener("mousemove",function(){
            let temporizador=setTimeout(function(){
                var letrero= document.getElementsByClassName("letreroOK")[0];
                letrero.style.transitionDuration = "1s";
                letrero.style.marginTop="-50px";
            },3500);
            })
            clearTimeout(temporizador);
        }
}