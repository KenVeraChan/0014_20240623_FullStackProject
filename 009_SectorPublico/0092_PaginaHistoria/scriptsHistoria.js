/******************************************************************/
/********* 0) RATON ENTRANDO EN AREA DE BOTONES DEL MENU **********/
/******************************************************************/

var elemento1= document.getElementsByClassName("bloque_opciones");

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
        }
}
/************************************************************/
/************* 1) DISEÑO DEL SELECTOR DE FECHAS *************/
/************************************************************/
    //ARRAY DE LA HISTORIA QUE SE IMPLEMENTARA

    var historia = new Array(
        ["La corporación Sfer4D tiene sus inicios históricos hacia el final de la guerra mundial por la supervivencia contra una enemigo común no humano. En los edificios arrasados de la antigua empresa tecnológica: <strong>Techeimer</strong>. En plena crisis el fundador <strong>William Wissangel</strong>, quien asumió el mando militar de una operación, la última, que logró hallar las debilidades de aquel enemigo, que por entonces estaba ganando. La tecnología militar era bastante inferior a la del enemigo, pero sus estrategias discretas de combate resultaron eficientes para la resistencia que quedó dividida en varios sectores de las primeras naciones que sufrieron los primeros golpes de la conquista."],
        ["La empresa comienza con uno de sus proyectos propios: <strong>GREENOVATIO</strong> para devolver la vida verde al planeta. Financió y comenzó a vivir sus primeros reconocimientos tras estas primeras acciones altruistas."],
        ["Sfer4D diseña nuevas actualizaciones para el lenguaje de programación: <strong>VIS4C</strong>, posibilitando el control de autómatas y propiciando la mejora en la seguridad de los sistemas abordados."],
        ["Sfer4D recibe el reconocimiento mundial tras formar parte de las organizaciones humanitarias de recuperación y reconstrucción de las infraestructuras a nivel nacional e internacional, aun cuando el coste de éste último apartado le supuso beneficios negativos"],
        ["La empresa alcanza un máximo de inversión tal que sus competidores continentales, aprovechan ese intento de masificarse para minimizarlo, por su descentralización de sus ventas en los sectores que más lo demandaban"],
        ["Sfer4D decide trasladarse al continente de Shunay, región que le propoció grandes beneficios por el precio del suelo y el éxito del estudio de mercado. El empleazamiento poseía terrenos disponibles para futuros crecimientos y una profundidad disponible para excavar de poco más de dos kilómetros de tierra firme."],
        ["Sfer4D cierra su primer contrato como asociado, para intercambiar materia prima y productos biotecnológicos, alcanzando un desarrollo en el diseño de fármacos especializados en cocteles de encimas reparadoras de tejidos dañados, tras el previo reconocimiento molecular al que debía acelerar su regeneración sistemática. "],
        ["Tras alcanzar un 45% mas de los beneficios calculados para el año anterior, Sfer4D amplia sus dominios territoriales hasta los 50 metros de profundidad excavada, a fin de poder extender subniveles de tratamiento de productos químicos, aún sin una demanda establecida"],
        ["Sfer4D termina de diseñar su primera inteligencia artificial para la manipulación de productos químicos de caracter ácido e inflamable. Decide no poner a la venta tales controladores automáticos por la escasez de ciertos semiconductores en los microprocesadores diseñados para tal fin."],
        ["Al comprobar que el mercado tecnológico y de la producción de mecanismos de construcción, exigían de un software que pudiera determinar sus propias decisiones tras realizar previos cálculos, Sfer4D se lanza a profundizar en el control de la inteligencia artificial, inventando el escaneador tridimensional destinado a operaciones de construcción en ingeniería civil y de caminos. El dispositivo traza una holografía del espacio existente atravesando varios materiales para interpolar la presencia de cavidades u otros materiales sin necesidad de una previa perforación física."],
        ["Con la imprevista cantidad de ventas generadas en ese mes, Sfer4D recurre a su propia inteligencia artificial, descubriendo extensas vías férreas abandonadas bajo el suelo continental de Sky-Gital. El ferrocarril abandonado perteneció a un fracasado proyecto de vías de circulación subterránea que los gobiernos negaron su posterior avance, debido a las consecutivas e inexplicables grietas que se generaron en pilares y paredes de carga de cientos de túneles del sur. Junto a varios ingenieros y geólogos de prestigio, descubrieron la inestabilidad térmica del suelo a una profundidad de 20 metros aun cuando era firme por encima de éstos."],
        ["No solo Sfer4D pretendía reabrir el abandonado proyecto sobre aquellas vías férreas abandonadas. Techeimer, empresa competidora, intentó adquirir protagonismo en aquel proyecto hasta que Sfer4D incorporó en los dispositivos de mapeo tridimensional, procesadores atmosféricos para los hostiles ambientes que hallarían a bastante profundidad. El proyecto se reabrió de nuevo para terminar cada una de sus fases de las que estaba compuesto."],
        ["Sfer4D sufre un atentado terrorista en su sede continental de Shunay, reventando varias naves de almacenaje de productos inflamables, así como el robo de tecnología que no habían anunciado en el mercado tecnológico. En las redes sociales no se menciona que el robo fuera de tecnología que no hubiera sido puesta a la luz pública, hecho que involucró como sospechosos a la propia corporación. Los sospechosos según Sfer4D fueron los de su competencia, debido a la rapidez con que consiguieron hacerse con la tecnología que robaron, así como del hackeo de varios servidores para el acceso directo."],
        ["A raíz de las publicaciones sobre aquel robo, la premisa de que fuera algún empleado de su propia empresa cobra mayor importancia, provocando la baja venta de sus habituales productos y servicios, perdiendo dos inversores y la influencia en el mercado internacional."],
        ["William Wissangel decide contratar hasta doce detectives privados a los que llamó: <strong>Las balas del infierno</strong>, pues dispersados por todos los contientes del mundo, quiso hallar la verdad y el responsable de ese intento de quiebre de su empresa. La financiación de esos detectives puso en jaque el capital de su empresa, quedándole medio año de supervivencia, como tiempo para hallar a los responsables. Tras dos meses y medio de búsqueda en plena discreción, los detectives reunieron tantas pruebas como para incriminar a un grupo de 40 personas, la mitad ex empleados de pequeñas empresas tecnológicas y cinco de ellos, expresidiarios con cargos informáticos de robo y compras ilegales en la DeepWeb."],
        ["Sfer4D termina de recuperar su estatus tecnológico, tras haber presentado serios cargos de hurtos con un interés del 200% por la tecnología que iban a vender a su competencia con la firma del diseño y datasheet de los componentes a nombre de terceros. El endurecimiento de la pena aplicada a los criminales fue publicado en todas las revistas digitales para que se reforzaran implicitamente las infraestructuras de la ciberseguridad de cientos de servidores empresariales de caracter privado"],
        ["El apoyo económico continental de Shunay supone el alcance de los objetivos que Sfer4D se marcó para los proyectos que había estado guardando para la recuperación total de sus pérdidas en los años anteriores."],
        ["Ante la llegada de las fechas navideñas y poseyendo un holgado capital, como para involucrarse en otro inesperado y propuesto por Sharyllín Rousher, tras hallar en los más pequeños el crecimiento de su fantasía emocional en aquellas fechas en las cuales, además, estaba presente la inocencia que tanto les identificaba. En los <strong>Territorios Blancos del Norte</strong> junto con los aliados de la <strong>NACIÓN-5Z</strong> planificaron levantar unas infraestructuras modulares destinados a prolongar la inocencia de los pequeños para cuando acudieran allí en las horas de la nochebuena, así como de todas las familias que hubieran dejado al niño que llevaban dentro en el pasado, a causa del acontencer de la vida."],
        ["Sharyllín Rousher inventa y desarrolla una encima para acelerar el crecimiento molecular de diversas estructuras orgánicas; primero de índole vegetal y luego analizando la animal. En el primer de los casos, tras haber destinado 200 días en 10.000 pruebas en su laboratorio y siendo validado por la implicación de la inteligencia artificial tras su análisis durante dos días, destinó su invento a la generación masiva de alimentos que podían desarrollarse en entornos térmicamente hostiles. Llevó su primer paquete de semillas a los gélidos campos del norte del planeta para poder iniciar las pruebas a temperaturas de -45ºC, consiguiendo resultados tan gratificantes como para aceptar su implicación en nombre de Sfer4D en la tercera fase del proyecto vigente: <strong>Greenovatio</strong>"],
        ["Sfer4D empieza a diseñar androides con fisiología humana para poder movilizarse entre pasillos, salas y almacenes con productos inflamables, corrosivos y tóxicos que formaban parte del diseño de otros productos. Los empleados que trabajaban en esos subniveles, fueron trasladados para que no sufrieran los posibles daños en la manipulación de tales productos. Las plantas inferiores, quedaron bajo el control de la automatización cuyas órdenes las recibía de un servidor local sin acceso al exterior."],
        ["Debido a la demanda de material médico y software de procesamiento de datos, así como prediccion de los resultados pfrecidos, Sfer4D se mete en el desarrollo de la nanotecnología con los nanobots a fin de poder cubrir las necesidades de las operaciones médicas que exigieran de tanta precisión como eficacia en sus resultados. Sharyllín Rousher expone en la segunda quincena del mes, su proyecto beta ante varios cirujanos que comprobaron como en un conducto del tamaño de una arteria artificial, los nanobots lograron realizar una limpieza de varios componentes orgánicos que obstruían la circulación de un fluido natural cuyo caudal debía quedar estabilizado."],
        ["Sfer4D logra diseñar un fluido artificial con nanobots, insoluble con cualquier disolución orgánica e inorgánica, debido a su firme red covalente que imita el mismo enlace que lleva su nombre."],
        ["Con la nanotecnología desarrollada, Sfer4D logra implementar en sus dispositivos de mapeo tridimensional la capacidad de trazar holográficamente, micro espacios delimitados por estructuras orgánicas de diferentes índoles, generando en la visión artificial proporcionada, los datos moleculares de las diferentes estructuras que fuera detectando en sus cámaras de emisión."]
        ["Sfer4D consigue actualizar Vis4C para el diseño de una inteligencia artificial autónoma. Se crea la polémica en el diseño de los frameworks útiles para la maquinaria y el software de la corporación no de uso particular y empresarial ajeno"]
        ["La inteligencia artificial descubre un nuevo material de constucción, pendiente de ponerse a pruebas técnicas. Se forja la ley orgánica para limitar el acceso a la inteligencia artificial para actualizar la documentación universal de los materiales de construcción"]
        ["Se aprueba y certifica el material artificial diseñado por primera vez por una inteligencia artificial. Los ingenieros mecánicos del mundo entero se suman al estudio de dichos materiales para encontrar fallas en condiciones hositles y agresivas."]
        ["Colonización completa en MANPERTOS y aprobación de la creación de la defensa orbital con las infraestructuras elípticas orbitales. Se descubre un sistema planetario a 25 años luz de distancia con posibles formas de vida tras descubrirse ondas de radio y señales enviadas al espacio profundo desde el tercero de los planetas contabilzados. Se confirma la existencia de vida hacia finales de año y se pone en marcha el primer satélite automatizado para escanear ese planeta desde una distancia de casi medio año luz de distancia."]
        ["Se consigue emplear el plasma de las llamas de fuego para almacenar energía de hasta 300 julios que luego se consumen a los pocos segundos. En diciembre se logra almacenar una energía capaz de mantener una bombilla encendida una semana de manera ininterrumpida."]
        ["Primera puerta dimensional diseñada de forma virtual para destinarlos a estudios reales con múltiples aplicaciones. Se diseña la primera infraestructura en Manpertos. La energía forjada por el plasma retroalimenta la potencia necesaria para que la puerta dimensional alcance un mayor tiempo abierta y con alcances de teletransporte más lejanos."]);

    function identificador(valor)
    {
        if(valor>-1 && valor<29)
        {
            //DE DONDE SE EXTRAE LA INFORMACION
            let leer=document.getElementsByClassName("pulsador")[valor].innerHTML;
            //DONDE SE COLOCARA EL TEXTO DE LA FECHA
            var escribir=document.getElementById("tiempo");
            escribir.innerHTML=leer;
            //DONDE ESCRIBE EL ARGUMENTO DE LA HISTORIA
            var redactar=document.getElementById("trama");
            redactar.innerHTML=historia[valor];

            //Ejecutandolo aqui dentro se asegura uno, que el documento ha terminado de cargar
            $("#fecha").css({"text-align":"center"});
            $("#fecha").css({"color":"rgb(192, 189, 8)"});
            $("#contenido").css({"text-align": "center"});
            $("#contenido").css({"font-size":"x-small"});
        }
    }
