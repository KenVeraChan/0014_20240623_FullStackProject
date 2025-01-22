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
            elemento1[i].style.background= "rgb(147, 0, 183)";
            elemento1[i].style.color="rgba(0, 0, 19, 0.89)";
                })
        elemento1[i].addEventListener('mouseleave',function(){
            elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento1[i].style.color="rgb(204, 0, 255)";
                })
        }
        muestraTabla();   //Llamada a la muestr de la tabla de la BBDD
}
function muestraTabla()
{
    //MUESTRA LA TABLA EN FORMA PAGINADA PARA VER COMO QUEDA LA MISMA TRAS LOS CAMBIOS
    //Nota: con getElementById se necesita declarar dentro del método
    var botonForm= document.getElementById("imagenPortada");
    botonForm.style.transitionDuration = "1s";
    botonForm.style.opacity = "0.25";
    //Carga de la tabla de la BBDD
    var baseDatos=document.getElementsByClassName("tablaBBDD")[0];
    baseDatos.style.transitionDuration="1.5s";
    baseDatos.style.marginLeft="2%";
}
function letreroConfirmadoOK(selector)
{
    var letrero= document.getElementsByClassName("letreroOK")[0];
    if(selector==1)
    {
        letrero.innerHTML="Tarea Guardada y Registrada Ahora en la BBDD";
    }
    if(selector==2)
    {
        letrero.innerHTML="Sin cambios al accionar VOLVER";
    }
    if(selector>0 && selector<3)
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
