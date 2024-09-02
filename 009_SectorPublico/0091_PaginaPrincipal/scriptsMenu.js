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
}
function cargaImagen(num)
{
    if(num==1)
    {   /* CARGA LA IMAGEN ANTERIOR */
        
    }
    if(num==2)
    {  /* CARGA LA IMAGEN SIGUIENTE */

    }
}
