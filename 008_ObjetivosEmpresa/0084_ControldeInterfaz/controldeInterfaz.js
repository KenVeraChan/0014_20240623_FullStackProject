var elemento1= document.getElementsByClassName("boton");

function cargarPagina()
{
    for(let i=0;i<elemento1.length;i++)
        {
        //BOTON DE OPCIONES VISIBLE
        elemento1[i].style.transitionDuration="0.5s";
        elemento1[i].style.visibility="visible";
        elemento1[i].style.borderRadius= "10px";
        elemento1[i].style.boxShadow= "rgb(150,150,150) 5px 5px 20px 10px";
        elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
        elemento1[i].addEventListener('mouseenter',function(){
            elemento1[i].style.background= "rgb(214, 214, 3)";
            elemento1[i].style.color="rgba(0, 0, 19, 0.89)";
                })
        elemento1[i].addEventListener('mouseleave',function(){
            elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento1[i].style.color="rgb(214, 214, 3)";
                })
        }
        oscureceAmbiente();
}
function oscureceAmbiente()
{
    //MUESTRA LA TABLA EN FORMA PAGINADA PARA VER COMO QUEDA LA MISMA TRAS LOS CAMBIOS
    //Nota: con getElementById se necesita declarar dentro del método
    var botonForm= document.getElementById("imagenPortada");
    botonForm.style.transitionDuration = "1s";
    botonForm.style.opacity = "0.25";
    //Carga de la tabla de la BBDD
}

//LETRERO DE OKEY
function letreroConfirmado(tipoLetrero)
{
    var letrero= document.getElementsByClassName("letreroOK")[0];
    if(tipoLetrero==1)
        {
            //LETRERO DE PROYECTO AÑADIDO A LA BBDD
            letrero.innerHTML="IMAGEN CARGADA DE LA CARPETA DEL SERVIDOR";
        }
    if(tipoLetrero==2)
        {
            //LETRERO DE PROYECTO ACTUALIZADO A LA BBDD
            letrero.innerHTML="IMAGEN SUBIDA A LA CARPETA DEL SERVIDOR";
        }
    if(tipoLetrero==3)
        {
            //LETRERO DE PROYECTO ACTUALIZADO A LA BBDD
            letrero.innerHTML="ERROR: NO SE PUEDE SUBIR LA IMAGEN SIN ESPECIFICAR EL DESTINO DE LA MISMA";
        }
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

