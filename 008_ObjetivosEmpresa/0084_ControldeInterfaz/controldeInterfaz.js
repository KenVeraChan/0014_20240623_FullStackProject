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
    switch(tipoLetrero)
    {
        case 1:
            {
                //LETRERO DE PROYECTO AÑADIDO AL FORMULARIO DESDE LA BBDD
                letrero.innerHTML="IMAGEN CARGADA DE LA CARPETA DEL SERVIDOR AL FORMIULARIO EXITOSAMENTE";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 2:
            {
                //LETRERO DE PROYECTO ACTUALIZADO DE LA CARPETA SLIDER DEL SERVIDOR
                letrero.innerHTML="IMAGEN SUBIDA A LA CARPETA SLIDER DEL SERVIDOR";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 3:
            {
                //LETRERO DE PROYECTO ACTUALIZADO DE LA CARPETA PRODUCTOS DEL SERVIDOR
                letrero.innerHTML="IMAGEN SUBIDA A LA CARPETA PRODUCTOS DEL SERVIDOR";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 4:
            {
                //LETRERO DE PROYECTO ACTUALIZADO DE LA CARPETA SERVICIOS DEL SERVIDOR
                letrero.innerHTML="IMAGEN SUBIDA A LA CARPETA SERVICIOS DEL SERVIDOR";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 5:
            {
                //LETRERO DE PROYECTO ACTUALIZADO DE LA CARPETA PROYECTOS DEL SERVIDOR
                letrero.innerHTML="IMAGEN SUBIDA A LA CARPETA PROYECTOS DEL SERVIDOR";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 6:
            {
                //LETRERO DE PROYECTO ACTUALIZADO DE LA CARPETA NOVEDADES DEL SERVIDOR
                letrero.innerHTML="IMAGEN SUBIDA A LA CARPETA NOVEDADES DEL SERVIDOR";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 7:
            {
                //LETRERO DE PROYECTO ACTUALIZADO DE LA CARPETA CATEGORIA PRODUCTOS DEL SERVIDOR
                letrero.innerHTML="IMAGEN SUBIDA A LA CARPETA CATEGORIA PRODUCTOS DEL SERVIDOR";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 8:
            {
                //LETRERO DE PROYECTO ACTUALIZADO DE LA CARPETA CATEGORIA SERVICIOS DEL SERVIDOR
                letrero.innerHTML="IMAGEN SUBIDA A LA CARPETA CATEGORIA SERVICIOS DEL SERVIDOR";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 9:
            {
                //LETRERO DE PROYECTO ACTUALIZADO DE LA CARPETA CATEGORIA PROYECTOS DEL SERVIDOR
                letrero.innerHTML="IMAGEN SUBIDA A LA CARPETA CATEGORIA PROYECTOS DEL SERVIDOR";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 10:
            {
                //LETRERO DE PROYECTO ACTUALIZADO A LA BBDD
                letrero.innerHTML="ERROR: NO SE PUEDE SUBIR LA IMAGEN SIN ESPECIFICAR EL DESTINO DE LA MISMA";
                letrero.style.color="rgb(229,19,19)";
                break;
            }
        case 11:
            {
                //LETRERO DE FALLO DE TIPO SUBIDA IMAGEN ERRONEO
                letrero.innerHTML="ERROR: EL FORMATO DE LA IMAGEN QUE SE PRETENDÍA SUBIR NO ES DE TIPO: JPG,JPEG,PNG,GIF";
                letrero.style.color="rgb(229,19,19)";
                break;
            }
        case 12:
            {
                //LETRERO DE FALLO DE EXCESO DEL TAMANIO DE LA IMAGEN
                letrero.innerHTML="ERROR: EL TAMAÑO DE LA IMAGEN EXCEDE LO PERMITIDO DE 3MB";
                letrero.style.color="rgb(229,19,19)";
                break;
            }
        case 13:
            {
                //LETRERO DE FALLO DE EXCESO DEL TAMANIO DE LA IMAGEN
                letrero.innerHTML="LO SIENTO!, NO EXISTE NINGUNA IMAGEN QUE TENGA ESE ID INTRODUCIDO";
                letrero.style.color="rgb(229,19,19)";
                break;
            }
        case 14:
            {
                //LETRERO DE FALLO DE EXCESO DEL TAMANIO DE LA IMAGEN
                letrero.innerHTML="IMAGEN ELIMINADA EXITOSAMENTE DE LA BBDD Y DEL DIRECTORIO DEL SERVIDOR EN DONDE SE ALMACENÓ";
                letrero.style.color="rgb(247,174,3)";
                break;
            }
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

