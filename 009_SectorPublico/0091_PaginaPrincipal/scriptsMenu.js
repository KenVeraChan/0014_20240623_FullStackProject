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
        //BOTON DE AREA PRIVADA ZONA SUPERIOR DERECHA
        var elemento4= document.getElementById("areaPrivada");
        elemento4.addEventListener('mouseenter',function(){
            elemento4.style.transitionDuration = "0.5s";
            elemento4.style.textShadow="white 1px 0 40px";
            elemento4.style.color= "white";
                })
        elemento4.addEventListener('mouseleave',function(){
            elemento4.style.transitionDuration = "0.5s";
            elemento4.style.textShadow="none";
            elemento4.style.color="yellow";
                })
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
    }
    for(let i=0;i<elemento2.length;i++)
    {
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
                    case 4: elemento3[i].innerHTML=  "<strong>-- Inmensa cantidad de datos digitales.</strong><br><strong>-- El Estado negocia con Sfer4D para la compra de espacio virtual en la nube.</strong><br><strong>-- Las investigaciones espaciales ocupan el mayor espacio de almacenamiento.";
                    break;
                    case 5: elemento3[i].innerHTML=  "<strong>-- El capital empresarial se ve fortalecido por las inversiones independientes.</strong><br><strong>-- Los nuevos avances en investigación biomolecular ponen en quiebra las pequeñas empresas.</strong><br><strong>-- Sfer4D financia a las pequeñas empresas para evitar su cese de actividad.";
                    break;
                    case 6: elemento3[i].innerHTML=  "<strong>-- Se retrasa la investigación molecular por falta de materias primas.</strong><br><strong>-- Se firman subcontratas para la investigación en paralelo a fin de solventar la carencia de material primario.";
                    break;
                    case 7: elemento3[i].innerHTML=  "<strong>-- Se crean nuevos proyectos para la gestión de residuos bioquímicos.</strong><br><strong>-- El forja la ley orgánica de no trabajar con productos radiactivos hasta no tener un tratado documentado sobre la gestión de los residuos.";
                    break;
                    case 8: elemento3[i].innerHTML=  "<strong>-- Wellis compra 10.000 motores eléctricos para navegación turística.</strong><br><strong>-- Sfer4D logra la insignia de la PILA por ser el primero en conseguir que un avión completamente eléctrico duplique la velocidad de un caza militar durante un viaje de 12 horas ininterrumpidas.";
                    break;
                    case 9: elemento3[i].innerHTML=  "<strong>-- Las antenas de las instalaciones astronómicas de Sfer4D, ubicadas al norte de Wavdur, informan que la señal recibida del espacio profundo poseía unas coordenadas de origen, además de la petición de auxilio que primeramente se descifró.";
                    break;
                    case 10: elemento3[i].innerHTML=  "<strong>-- Instrumental de Sfer4D instalado en las fosas marinas ubicadas en pleno océano a 14.000 metros de profundidad, detectan nuevos organismos de vida pluricelular emergentes de una mayor profundidad.</strong><br><strong>-- Los primeros investigadores, en compañía de los oceaonógrafos descubren que poseen una capacidad de mitosis acelerada: replicación orgánica ante una amenaza cercana";
                    break;
                    case 11: elemento3[i].innerHTML=  "<strong>-- Sfer4D financia de nuevo el proyecto Greenovatio.</strong><br><strong>-- Se plantan árboles y demás vegetación específica en todas las autopistas y carreteras del Estado a fin de evitar la generación de alérgenos.";
                    break;
                    case 12: elemento3[i].innerHTML=  "<strong>-- Sfer4D se implica en la educación tecnológica de los futuros hombres y mujeres profesionales con deseos de aprender la tecnología actual.</strong><br><strong>-- Se donan hasta 100.000 ordenadores portátiles con demos de los programas informáticos para iniciarse en la programación VIS4C de la robótica en cursos de alto nivel.";
                    break;
                    case 13: elemento3[i].innerHTML=  "<strong>-- Sfer4D alquila las primeras zonas polares de la zona norte para reanudar sus investigaciones sobre el electromagnetismo.</strong><br><strong>-- Los aliados de la NACION-5Z firman un contrato con Sfer4D para el intercambio amistoso de tecnologia por conocimientos del terreno polar.";
                    break;
                    case 14: elemento3[i].innerHTML=  "<strong>-- Las acciones de la empresa caen en el sector de la automoción eléctrica.</strong><br><strong>-- El mundo aun no esta preparado para el cambio a lo eléctrico debido a la falla y la gestión de reciclaje de las baterías fabricadas.";
                    break;
                    case 15: elemento3[i].innerHTML=  "<strong>-- Varios robots en una planta de producción en Grenzlin toman sus propias decisiones en el diseño de un modelo conocido de vehículo, mejorando la aerodinámica y reduciendo las emisiones de dióxido de carbono.</strong><br><strong>-- La junta internacional se reunirá a finales de año para estudiar el caso.";
                    break;
                    default: break;
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
                    case 4: elemento3[i].innerHTML= "";
                    break;
                    case 5: elemento3[i].innerHTML= "";
                    break;
                    case 6: elemento3[i].innerHTML= "";
                    break;
                    case 7: elemento3[i].innerHTML= "";
                    break;
                    case 8: elemento3[i].innerHTML= "";
                    break;
                    case 9: elemento3[i].innerHTML= "";
                    break;
                    case 10: elemento3[i].innerHTML= "";
                    break;
                    case 11: elemento3[i].innerHTML= "";
                    break;
                    case 12: elemento3[i].innerHTML= "";
                    break;
                    case 13: elemento3[i].innerHTML= "";
                    break;
                    case 14: elemento3[i].innerHTML= "";
                    break;
                    case 15: elemento3[i].innerHTML= "";
                    break;
                    default: break;
                        }  
                })
    }
}