var elemento1= document.getElementsByClassName("boton");
var elemento2= document.getElementsByClassName("regresar");
var elemento3= document.getElementsByClassName("referencia");

function cargarPagina()
{
    for(let i=0;i<elemento1.length;i++)
        {
        //BOTON DE OPCIONES VISIBLE
        elemento1[i].style.transitionDuration="0.5s";
        elemento1[i].style.visibility="visible";
        elemento1[i].style.boxShadow= "rgb(150,150,150) 2px 2px 10px 5px";
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
        for(let i=0;i<elemento2.length;i++)
            {
            //BOTON DE OPCIONES VISIBLE
            elemento2[i].style.transitionDuration="0.5s";
            elemento2[i].style.visibility="visible";
            elemento2[i].style.boxShadow= "rgb(150,150,150) 2px 2px 10px 5px";
            elemento2[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento2[i].addEventListener('mouseenter',function(){
                elemento2[i].style.background= "rgb(214, 214, 3)";
                elemento2[i].style.color="rgba(0, 0, 19, 0.89)";
                elemento3[i].style.color="rgba(0, 0, 19, 0.89)";
                    })
            elemento2[i].addEventListener('mouseleave',function(){
                elemento2[i].style.background= "rgba(0, 0, 19, 0.89)";
                elemento2[i].style.color="rgb(214, 214, 3)";
                elemento3[i].style.color="rgb(214, 214, 3)";
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
                //LETRERO DE CARGA IMÁGENES SLIDER
                letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: SLIDER";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 2:
            {
                //LETRERO DE CARGA IMÁGENES PRODUCTOS
                letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: PRODUCTOS";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 3:
            {
                //LETRERO DE CARGA IMÁGENES SERVICIOS
                letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: SERVICIOS";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 4:
            {
                //LETRERO DE CARGA IMÁGENES PROYECTOS
                letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: PROYECTOS";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 5:
            {
                //LETRERO DE CARGA IMÁGENES NOVEDADES
                letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: NOVEDADES";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 6:
            {
                //LETRERO DE CARGA IMÁGENES CATEGORIA PRODUCTOS
                letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: CATEGORIA PRODUCTOS";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 7:
            {
                //LETRERO DE CARGA IMÁGENES CATEGORIA SERVICIOS
                letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: CATEGORIA SERVICIOS";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 8:
            {
                //LETRERO DE CARGA IMÁGENES CATEGORIA CATEGORIA PROYECTOS
                letrero.innerHTML="IMÁGENES CARGADAS DESDE LA CARPETA DEL SERVIDOR: CATEGORIA PROYECTOS";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
        case 9:
            {
                //LETRERO DE QUE NO SE HA CARGADO NINGUNA IMAGEN AL NO EXISTIR NINGUNA QUE MOSTRAR
                letrero.innerHTML="NO EXISTEN IMÁGENES DE ESTA CATEGORÍA EN LA CARPETA DEL SERVIDOR";
                letrero.style.color="rgb(239,4,4)";
                break;
            }
       case 10:
            {
                //LETRERO DE NO SE HA INTRODUCIDO UNA ELECCION EN EL DESPLEGABLE
                letrero.innerHTML="ERROR! DEBE ELEGIR UNA OPCIÓN ANTES DE ACCIONAR EL BOTÓN DE CARGA";
                letrero.style.color="rgb(239,4,4)";
                break;
            }
       case 11:
            {
                //LETRERO DE SE LE HA DADO A ACTUALIZAR PERO SIN NADA RELLENADO PARA ACTUALIZAR
                //0000:0 NO SE RELLENÓ LUEGO NO SE VA A ACTUALIZAR
                letrero.innerHTML="REGISTRO SIN ACTUALIZAR PORQUE NO SE RELLENÓ NINGÚN DESPLEGABLE!";
                letrero.style.color="rgb(239,4,4)";
                break;
            }
       case 12:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //0001:1 EN EL CASO DE QUE SOLO SE ACTUALICE: DETALLES
                letrero.innerHTML="CAMPO <strong>DETALLES</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;
            }
       case 13:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //0010:2 EN EL CASO DE QUE SOLO SE ACTUALICE: COSTE
                letrero.innerHTML="CAMPO <strong>COSTE</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 14:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //0011:3 EN EL CASO DE QUE SOLO SE ACTUALICE: COSTE Y DETALLES   
                letrero.innerHTML="CAMPO <strong>COSTE</strong> y <strong>DETALLES</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 15:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //0100:4 EN EL CASO DE QUE SOLO SE ACTUALICE: STOCK  
                letrero.innerHTML="CAMPO <strong>STOCK</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 16:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //0101:5 EN EL CASO DE QUE SOLO SE ACTUALICE: STOCK Y DETALLES
                letrero.innerHTML="CAMPO <strong>STOCK</strong> y <strong>DETALLES</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 17:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //0110:6 EN EL CASO DE QUE SOLO SE ACTUALICE: STOCK Y COSTE
                letrero.innerHTML="CAMPO <strong>STOCK</strong> y <strong>COSTE</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 18:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //0111:7 EN EL CASO DE QUE SOLO SE ACTUALICE: STOCK, COSTE Y DETALLES
                letrero.innerHTML="CAMPO <strong>STOCK</strong>, <strong>COSTE</strong> y <strong>DETALLES</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 19:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //1000:8 EN EL CASO DE QUE SOLO SE ACTUALICE: SECTOR
                letrero.innerHTML="CAMPO <strong>SECTOR</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 20:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //1001:9 EN EL CASO DE QUE SOLO SE ACTUALICE: STOCK Y DETALLES
                letrero.innerHTML="CAMPO <strong>STOCK</strong> y <strong>DETALLES</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 21:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //1010:10 EN EL CASO DE QUE SOLO SE ACTUALICE: SECTOR Y COSTE
                letrero.innerHTML="CAMPO <strong>SECTOR</strong> y <strong>COSTE</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 22:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //1011:11 EN EL CASO DE QUE SOLO SE ACTUALICE: SECTOR, COSTE Y DETALLES
                letrero.innerHTML="CAMPO <strong>SECTOR</strong>, <strong>COSTE</strong> y <strong>DETALLES</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 23:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //1100:12 EN EL CASO DE QUE SOLO SE ACTUALICE: SECTOR Y STOCK
                letrero.innerHTML="CAMPO <strong>SECTOR</strong> y <strong>STOCK</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 24:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //1101:13 EN EL CASO DE QUE SOLO SE ACTUALICE: SECTOR, STOCK Y DETALLES
                letrero.innerHTML="CAMPO <strong>SECTOR</strong>, <strong>STOCK</strong> y <strong>DETALLES</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 25:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //1110:14 EN EL CASO DE QUE SOLO SE ACTUALICE: SECTOR, STOCK Y COSTE
                letrero.innerHTML="CAMPO <strong>SECTOR</strong>, <strong>STOCK</strong> y <strong>COSTE</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 26:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //1111:15 EN EL CASO DE QUE SOLO SE ACTUALICE TODO: SECTOR, STOCK, COSTE Y DETALLES
                letrero.innerHTML="CAMPO <strong>SECTOR</strong>, <strong>STOCK</strong>, <strong>COSTE</strong> y <strong>DETALLES</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 27:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //SE ACTUALIZÓ DETALLES DE LA ZONA DE SLIDER, NOVEDADES, CATEGORIA PRODUCTOS, CATEGORIA SERVICIOS O CATEGORIA PROYECTOS
                letrero.innerHTML="CAMPO <strong>DETALLES</strong>: ACTUALIZADO CORRECTAMENTE!";
                letrero.style.color="rgb(19,229,61)";
                break;        
            }
        case 28:
            {
                //LETRERO DE FILA REGISTRADA HA SIDO ACTUALIZADA CORRECTAMENTE
                //NO SE ACTUALIZÓ DETALLES DE LA ZONA DE SLIDER, NOVEDADES, CATEGORIA PRODUCTOS, CATEGORIA SERVICIOS O CATEGORIA PROYECTOS
                //MOTIVO: CAMPO DETALLES VACIO
                letrero.innerHTML="CAMPO <strong>DETALLES</strong>: NO ACTUALIZADO AL ESTAR EL CAMPO VACÍO!";
                letrero.style.color="rgb(239,4,4)";
                break;        
            }
    }

    if(tipoLetrero>0 && tipoLetrero<29)
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

