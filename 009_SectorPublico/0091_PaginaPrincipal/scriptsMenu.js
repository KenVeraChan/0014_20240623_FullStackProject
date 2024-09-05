/******************************************************************/
/********* 0) RATON ENTRANDO EN AREA DE BOTONES DEL MENU **********/
/******************************************************************/

var elemento1= document.getElementsByClassName("bloque_opciones");
var elemento2= document.getElementsByClassName("noticia");
var elemento3= document.getElementsByClassName("parrafo");

function cargarPagina()
{
    //PONER DE COLOR DORADO TODOS LOS BOTONES PRESENTES
    //OPCIONES-BUSQUEDA-INSERCCION-ACTUALIZACION-ELIMINACION //
    for(let i=0;i<elemento1.length;i++)
        {
        //BOTON DE OPCIONES VISIBLE
        elemento1[i].style.visibility="visible";
        elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
        elemento1[i].addEventListener('mouseenter',function(){
            elemento1[i].style.transitionDuration = "0.5s";
            elemento1[i].style.background= "yellow";
            elemento1[i].style.color="rgba(0, 0, 19, 0.89)";
                })
        elemento1[i].addEventListener('mouseleave',function(){
            elemento1[i].style.transitionDuration = "0.5s";
            elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento1[i].style.color="yellow";
                })
        elemento2[i].addEventListener('mouseenter',function(){
            elemento2[i].style.transitionDuration = "0.5s";
            elemento2[i].style.background= "rgb(12,22,111)";
            elemento2[i].style.color="white";
                switch(i)   //RATON ENTRANDO EN LOS BLOQUES INFORMATIVOS PARA MOSTRAR EL CONTENIDO
                    {
                    case 0: elemento3[i].innerHTML="<strong>-- Conseguido el metal con propiedades plásticas.</strong><br><strong>-- Primera vez que se alcanza la temperatura de: -274ºC.</strong><br><strong>-- El hidrógeno como combustible provoca mayores lluvias continentales e inundaciones imprevistas.</strong>";
                    break;
                    case 1: elemento3[i].innerHTML="<strong>-- Techeimer se extiende por el continente de Wellis para su revolución industrial en nanotecnología</strong><br><strong>-- La empresa Ampergya sube sus impuestos energéticos.</strong><br><strong>-- La inteligencia artificial recomienda no buscar más formas de vida en el espacio por ver al ser humano una especie débil.</strong>";
                    break;
                    case 2: elemento3[i].innerHTML= "<strong>-- Diseño de Software destinado a la Aeronáutica.</strong><br><strong>-- Desarrollo de agricultura vertical.</strong><br><strong>-- Servicios de domótica particular y para entidades empresariales.</strong><br><strong>-- FemtoTecnología para estudiar microorganismos hostiles.</strong>";
                    break;
                    case 3: elemento3[i].innerHTML=  "<strong>-- Rotor de antigravedad manual para maqinaria pesada.</strong><br><strong>-- Mapeador tridimensional de estructuras hasta 10 km de radio.</strong><br><strong>-- Proyectores de holografía HD sin pantalla física requerida.</strong><br><strong>-- Perforadores de laser para tuneladoras veloces.</strong>";
                    break;
                    }            
                })
        elemento2[i].addEventListener('mouseleave',function(){
            elemento2[i].style.transitionDuration = "0.5s";
            elemento2[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento2[i].style.color="rgba(230, 230, 11, 0.719)";
                    switch(i)
                    {
                    case 0: elemento3[i].innerHTML="";
                    break;
                    case 1: elemento3[i].innerHTML="";
                    break;
                    case 2: elemento3[i].innerHTML="";
                    break;
                    case 3: elemento3[i].innerHTML= "";
                    break;
                        }  
                })
        }
        cargaImagen(0,0);  //Carga la primera imagen en el SLIDER
}
function receptorID(arrayID)
{
    var matrizID=arrayID;
    return matrizID;
}
function receptorNOMBRE(arrayNOMBRE)
{
    var matrizNOMBRE=arrayNOMBRE;
    return matrizNOMBRE;
}
function cargaImagen(numero)
{
    var posicion;
    //NUMERO DE ENTRADA ZERO:
    if(numero==0)
    {
        var letrero=document.getElementsByClassName("espacioIimagen")[0];
        letrero.style.transitionDuration = "1s";
        letrero.style.marginLeft="0px";
        posicion=0;  //Valor inicial al cargar la pagina
    }
    //NUMERO DE ENTRADA NEGATIVO:
    if(numero<0)
    {
        posicion--;  //Decrementa al anterior SLIDER
        if(posicion==0)  //Caso de que el primer SLIDER ESTE PRESENTE
        {
            //QUITA EL PRIMER SLIDER 0
            var letrero=document.getElementsByClassName("imagenCargada")[1]; //El primer SLIDER
            letrero.style.transitionDuration = "1s";
            letrero.style.marginLeft="-3000px";  
            //PONE EL ULTIMO SLIDER
            var letrero=document.getElementsByClassName("imagenCargada")[0]; //El ultimo SLIDER
            letrero.style.transitionDuration = "1s";
            letrero.style.marginLeft="0px"; 
        }
        if(posicion<0)  //Caso de que el último SLIDER ESTE PRESENTE
        {
            //QUITA ESE ULTIMO SLIDER
            var letrero=document.getElementsByClassName("imagenCargada")[0]; //El ultimo SLIDER
            letrero.style.transitionDuration = "1s";
            letrero.style.marginLeft="-3000px";
            //PONE EL PENÚLTIMO SLIDER   
            var letrero=document.getElementsByClassName("imagenCargada")[receptorID.length-1]; //El ultimo SLIDER
            letrero.style.transitionDuration = "1s";
            letrero.style.marginLeft="0px"; 
        }
        if(posicion>0 && posicion<=(receptorID.length-1))
        {
            //QUITA EL SLIDER ANTERIOR
            var letrero=document.getElementsByClassName("imagenCargada")[posicion];
            letrero.style.transitionDuration = "1s";
            letrero.style.marginLeft="-3000px";
            //QUITA EL SLIDER ANTERIOR AL ANTERIOR
            var letrero=document.getElementsByClassName("imagenCargada")[posicion-1];
            letrero.style.transitionDuration = "1s";
            letrero.style.marginLeft="0px";
        }
    }
    if(numero>0)
        {
            posicion++; //Incrementa el siguiente SLIDER
            if(posicion==0)  //Caso de que el primer SLIDER ESTE PRESENTE
            {
                //QUITA EL PRIMER SLIDER 0
                var letrero=document.getElementsByClassName("imagenCargada")[0]; //El primer SLIDER
                letrero.style.transitionDuration = "1s";
                letrero.style.marginLeft="-3000px";  
                //PONE EL ULTIMO SLIDER
                var letrero=document.getElementsByClassName("imagenCargada")[1]; //El ultimo SLIDER
                letrero.style.transitionDuration = "1s";
                letrero.style.marginLeft="0px"; 
            }
            if(posicion==(receptorID.length-1))  //Caso de que el último SLIDER ESTE PRESENTE
            {
                //QUITA ESE ULTIMO SLIDER
                var letrero=document.getElementsByClassName("imagenCargada")[receptorID.length-1]; //El ultimo SLIDER
                letrero.style.transitionDuration = "1s";
                letrero.style.marginLeft="-3000px";
                //PONE EL PENÚLTIMO SLIDER   
                var letrero=document.getElementsByClassName("imagenCargada")[0]; //El ultimo SLIDER
                letrero.style.transitionDuration = "1s";
                letrero.style.marginLeft="0px"; 
            }
            if(posicion>0 && posicion<(receptorID.length-1))
            {
                //QUITA EL SLIDER ANTERIOR
                var letrero=document.getElementsByClassName("imagenCargada")[posicion];
                letrero.style.transitionDuration = "1s";
                letrero.style.marginLeft="-3000px";
                //QUITA EL SLIDER ANTERIOR AL ANTERIOR
                var letrero=document.getElementsByClassName("imagenCargada")[posicion+1];
                letrero.style.transitionDuration = "1s";
                letrero.style.marginLeft="0px";
            }
        }
}
