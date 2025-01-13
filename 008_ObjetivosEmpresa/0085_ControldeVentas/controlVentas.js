var elemento1= document.getElementsByClassName("bloque_opciones");
var negativo= document.getElementsByClassName("cajaS");

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
            elemento1[i].style.background= "white";
            elemento1[i].style.color="rgba(0, 0, 19, 0.89)";
                })
        elemento1[i].addEventListener('mouseleave',function(){
            elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento1[i].style.color="white";
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
}
function cargaIntroIncidencia()
{
    //Se aparta el cuadro de estadisticas primero
    var bases=document.getElementsByClassName("base2")[0];
    bases.style.transitionDuration="0.25s";
    bases.style.marginLeft="-9500px";

    //Se muestra la tabla de ventas segundo
    var bases=document.getElementsByClassName("base1")[0];
    bases.style.transitionDuration="1.25s";
    bases.style.marginLeft="4%";

    var botonForm= document.getElementsByClassName("boton");
    //EFECTO COLOR DEL BOTON: INSERTAR, DEL CUADRO DEL FORMULARIO//
    botonForm[0].addEventListener("mouseenter",function(){
        botonForm[0].style.transitionDuration = "0.5s";
        botonForm[0].style.backgroundColor="rgb(16,11,60)";
        botonForm[0].style.color="white";

    })
    botonForm[0].addEventListener("mouseleave",function(){
        botonForm[0].style.transitionDuration = "0.5s";
        botonForm[0].style.backgroundColor="white";
        botonForm[0].style.color="black";
    })
}
function cargaCuadroPedidos()
{
    //Se aparta el cuadro de estadisticas primero
    var bases=document.getElementsByClassName("base1")[0];
    bases.style.transitionDuration="0.25s";
    bases.style.marginLeft="-9500px";

    //Se muestra la tabla de inspeccion de ventas segundo
    var bases=document.getElementsByClassName("base2")[0];
    bases.style.transitionDuration="1.25s";
    bases.style.marginLeft="4%";
}

//LETRERO DE OKEY
function letreroConfirmado(tipoLetrero)
{
    var letrero= document.getElementsByClassName("letreroOK")[0];
    if(tipoLetrero==1)
        {
            //LETRERO DE TAREA AÑADIDA A LA BBDD DE LOS DEPARTAMENTOS
            letrero.innerHTML="Incidencia añadida a la BBDD de los DEPARTAMENTOS";
        }
    if(tipoLetrero==2)
        {
            //LETRERO DE TAREA AÑADIDA A LA BBDD DE LOS DEPARTAMENTOS
            letrero.innerHTML="Se ha CONFIRMADO el pedido registrado";
        }
    if(tipoLetrero==3)
        {
            //LETRERO DE TAREA AÑADIDA A LA BBDD DE LOS DEPARTAMENTOS
            letrero.innerHTML="Se ha CANCELADO el pedido registrado";
        }
    if(tipoLetrero>0 && tipoLetrero<4)
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
