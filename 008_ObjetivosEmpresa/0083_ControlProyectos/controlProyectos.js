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
function cargaCuadroTareas()
{
    //Se aparta el cuadro de estadisticas primero
    var bases=document.getElementsByClassName("base2")[0];
    bases.style.transitionDuration="0.25s";
    bases.style.marginLeft="-1500px";
    //Se aparta el cuadro de inspeccion de candidatos segundo
    var bases=document.getElementsByClassName("base3")[0];
    bases.style.transitionDuration="0.25s";
    bases.style.marginLeft="-1500px";

    //Se muestra el cuadro de las estadisticas
    var bases=document.getElementsByClassName("base")[0];
    bases.style.transitionDuration="0.25s";
    bases.style.marginLeft="4%";

    var baseDatos=document.getElementById("tablaPaginacion");
    baseDatos.style.transitionDuration="0.5s";
    baseDatos.style.marginLeft="4%";
    baseDatos.addEventListener('mouseenter',function(){
        baseDatos.style.boxShadow= "rgb(150,150,150) 5px 5px 20px 10px";});
    baseDatos.addEventListener('mouseleave',function(){
        baseDatos.style.boxShadow= "none";});

    var baseDatos2=document.getElementById("tablaEstadisticas");
    baseDatos2.style.transitionDuration="0.75s";
    baseDatos2.style.marginLeft="6%";
    baseDatos2.addEventListener('mouseenter',function(){
        baseDatos2.style.boxShadow= "rgb(150,150,150) 5px 5px 20px 10px";});
    baseDatos2.addEventListener('mouseleave',function(){
        baseDatos2.style.boxShadow= "none";});

    //Carga la consideracion de la tabla
    beneficioNegativo();
}
function beneficioNegativo()
{
    //NO FUNCIONA, PENDIENTE DE CORREGIR Y TERMINAR
    for(let i=0;i<10;i++)
    {
       if(parseInt(negativo[8+i*5].value)<0)
        {
            negativo[8+i*5].style.background= "rgba(236, 63, 63, 0.89)";
        }
    }
    alert (negativo[18].value);
}
function cargaIntroTareas()
{
    //Se aparta el cuadro de estadisticas primero
    var bases=document.getElementsByClassName("base")[0];
    bases.style.transitionDuration="0.25s";
    bases.style.marginLeft="-2500px";
    //Se aparta el cuadro de inspeccion de candidatos segundo
    var bases=document.getElementsByClassName("base3")[0];
    bases.style.transitionDuration="0.25s";
    bases.style.marginLeft="-2500px";


    //Se muestra la tabla de intro datos de las tareas
    var bases=document.getElementsByClassName("base2")[0];
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
function cargaCuadroAspirantes()
{
    //Se aparta el cuadro de estadisticas primero
    var bases=document.getElementsByClassName("base")[0];
    bases.style.transitionDuration="0.25s";
    bases.style.marginLeft="-2500px";
    //Se aparta el cuadro de inserccion tareas segundo
    var bases=document.getElementsByClassName("base2")[0];
    bases.style.transitionDuration="0.25s";
    bases.style.marginLeft="-2500px";

    //Se muestra la tabla de inspeccion de candidatos
    var bases=document.getElementsByClassName("base3")[0];
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
            letrero.innerHTML="Tarea añadida a la BBDD de los DEPARTAMENTOS";
        }
    if(tipoLetrero==2)
        {
            //LETRERO DE TAREA AÑADIDA A LA BBDD DE LOS DEPARTAMENTOS
            letrero.innerHTML="Se ha APROBADO la inclusión en plantilla del usuario";
        }
    if(tipoLetrero==3)
        {
            //LETRERO DE TAREA AÑADIDA A LA BBDD DE LOS DEPARTAMENTOS
            letrero.innerHTML="Se ha DESESTIMADO la inclusión en plantilla del usuario";
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
