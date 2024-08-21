var elemento1= document.getElementsByClassName("bloque_opciones");

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
function cargaCuadro()
{
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
}
