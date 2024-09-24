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
            //LETRERO DE CARGA IMÁGENES SLIDER
            letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: SLIDER";
            letrero.style.color="rgb(19,229,61)";
        }
    if(tipoLetrero==2)
        {
            //LETRERO DE CARGA IMÁGENES PRODUCTOS
            letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: PRODUCTOS";
            letrero.style.color="rgb(19,229,61)";
        }
    if(tipoLetrero==3)
        {
            //LETRERO DE CARGA IMÁGENES SERVICIOS
            letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: SERVICIOS";
            letrero.style.color="rgb(19,229,61)";
        }
    if(tipoLetrero==4)
        {
            //LETRERO DE CARGA IMÁGENES PROYECTOS
            letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: PROYECTOS";
            letrero.style.color="rgb(19,229,61)";
        }
    if(tipoLetrero==5)
        {
            //LETRERO DE CARGA IMÁGENES NOVEDADES
            letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: NOVEDADES";
            letrero.style.color="rgb(19,229,61)";
        }
    if(tipoLetrero==6)
        {
            //LETRERO DE CARGA IMÁGENES CATEGORIA PRODUCTOS
            letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: CATEGORIA PRODUCTOS";
            letrero.style.color="rgb(19,229,61)";
        }
    if(tipoLetrero==7)
        {
            //LETRERO DE CARGA IMÁGENES CATEGORIA SERVICIOS
            letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: CATEGORIA SERVICIOS";
            letrero.style.color="rgb(19,229,61)";
        }
    if(tipoLetrero==8)
        {
            //LETRERO DE CARGA IMÁGENES CATEGORIA CATEGORIA PROYECTOS
            letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: CATEGORIA PROYECTOS";
            letrero.style.color="rgb(19,229,61)";
        }
    if(tipoLetrero==9)
        {
            //LETRERO DE QUE NO SE HA CARGADO NINGUNA IMAGEN AL NO EXISTIR NINGUNA QUE MOSTRAR
            letrero.innerHTML="NO EXISTEN IMÁGENES DE ESTA CATEGORÍA EN LA CARPETA DEL SERVIDOR";
            letrero.style.color="rgb(239,4,4)";
        }
    if(tipoLetrero==10)
        {
            //LETRERO DE NO SE HA INTRODUCIDO UNA ELECCION EN EL DESPLEGABLE
            letrero.innerHTML="ERROR! DEBE ELEGIR UNA OPCIÓN ANTES DE ACCIONAR EL BOTÓN DE CARGA";
            letrero.style.color="rgb(239,4,4)";
        }
    if(tipoLetrero>0 && tipoLetrero<11)
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

