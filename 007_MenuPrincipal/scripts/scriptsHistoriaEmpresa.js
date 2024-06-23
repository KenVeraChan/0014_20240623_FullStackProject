
/**************************************/
/**** 1) CARGA DE PAGINA PRINCIPAL ****/
/**************************************/
function cargaPagina(){ 
    //BOTON 1 //
        var B0 = document.getElementsByClassName("boton")[0];
        B0.addEventListener("mouseenter", alentrar0);
        function alentrar0()
        {
            B0.style.backgroundColor="yellow";
            B0.style.color="rgba(0, 0, 19, 0.89)";
        }
        B0.addEventListener("mouseleave", alsalir0);
        function alsalir0()
        {
            B0.style.backgroundColor="rgba(0, 0, 19, 0.89)";
            B0.style.color="rgba(230, 230, 11, 0.719)";
        }
        //FUNCIONES DEL BOTON//
        B0.addEventListener("click",function(){
                location.href="historiaEmpresa.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
        });
    //////////////////////////////////////////////////////////////////////////////
    //BOTON 2 //
        var B1 = document.getElementsByClassName("boton")[1];
        B1.addEventListener("mouseenter", alentrar1);
        function alentrar1()
        {
            B1.style.backgroundColor="yellow";
            B1.style.color="rgba(0, 0, 19, 0.89)";
        }
        B1.addEventListener("mouseleave", alsalir1);
        function alsalir1()
        {
            B1.style.backgroundColor="rgba(0, 0, 19, 0.89)";
            B1.style.color="rgba(230, 230, 11, 0.719)";
        }
        //FUNCIONES DEL BOTON//
        B1.addEventListener("click",function(){
            location.href="catalogoProductos.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
        });
    //////////////////////////////////////////////////////////////////////////////
    //BOTON 3 //
        var B2 = document.getElementsByClassName("boton")[2];
        B2.addEventListener("mouseenter", alentrar2);
        function alentrar2()
        {
            B2.style.backgroundColor="yellow";
            B2.style.color="rgba(0, 0, 19, 0.89)";
        }
        B2.addEventListener("mouseleave", alsalir2);
        function alsalir2()
        {
            B2.style.backgroundColor="rgba(0, 0, 19, 0.89)";
            B2.style.color="rgba(230, 230, 11, 0.719)";
        }
        //FUNCIONES DEL BOTON//
        B2.addEventListener("click",function(){
            location.href="catalogoServicios.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
        });
    ////////////////////////////////////////////////////////////////////////////
    //BOTON 4 //
        var B3 = document.getElementsByClassName("boton")[3];
        B3.addEventListener("mouseenter", alentrar3);
        function alentrar3()
        {
            B3.style.backgroundColor="yellow";
            B3.style.color="rgba(0, 0, 19, 0.89)";
        }
        B3.addEventListener("mouseleave", alsalir3);
        function alsalir3()
        {
            B3.style.backgroundColor="rgba(0, 0, 19, 0.89)";
            B3.style.color="rgba(230, 230, 11, 0.719)";
        }
        //FUNCIONES DEL BOTON//
        B3.addEventListener("click",function(){
            location.href="proyectosEnCurso.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
       });
    //////////////////////////////////////////////////////////////////////////////
    //BOTON 5 //
        var B4 = document.getElementsByClassName("boton")[4];
        B4.addEventListener("mouseenter", alentrar4);
        function alentrar4()
        {
            B4.style.backgroundColor="yellow";
            B4.style.color="rgba(0, 0, 19, 0.89)";
        }
        B4.addEventListener("mouseleave", alsalir4);
        function alsalir4()
        {
            B4.style.backgroundColor="rgba(0, 0, 19, 0.89)";
            B4.style.color="rgba(230, 230, 11, 0.719)";
        }
        //FUNCIONES DEL BOTON//
        B4.addEventListener("click",function(){
            location.href="contactoEmpresa.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
         });
    /////////////////////////////////////////////////////////////////////////////
    //BOTON 6 //
        var B5 = document.getElementsByClassName("boton")[5];
        B5.addEventListener("mouseenter", alentrar5);
        function alentrar5()
        {
            B5.style.backgroundColor="yellow";
            B5.style.color="rgba(0, 0, 19, 0.89)";
        }
        B5.addEventListener("mouseleave", alsalir5);
        function alsalir5()
        {
            B5.style.backgroundColor="rgba(0, 0, 19, 0.89)";
            B5.style.color="rgba(230, 230, 11, 0.719)";
        }
        //FUNCIONES DEL BOTON//
        B5.addEventListener("click",function(){
            location.href="areaEmpleo.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
        });
   /////////////////////////////////////////////////////////////////////////////
    //BOTON 7 //
    var B6 = document.getElementById("iconoEmpresa");
    //FUNCIONES DEL BOTON//
    B6.addEventListener("click",function(){
        location.href="index.html";   //CODIGO PARA CARGAR UNA PAGINA WEB
    });
}
/**************************************/
/** 2) DISEÑO DEL SELECTOR DE FECHAS **/
/**************************************/
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
        ["Con la nanotecnología desarrollada, Sfer4D logra implementar en sus dispositivos de mapeo tridimensional la capacidad de trazar holográficamente, micro espacios delimitados por estructuras orgánicas de diferentes índoles, generando en la visión artificial proporcionada, los datos moleculares de las diferentes estructuras que fuera detectando en sus cámaras de emisión."]);

    function identificador(valor)
    {
        if(valor>-1 && valor<23)
        {
            //DE DONDE SE EXTRAE LA INFORMACION
            let leer=document.getElementsByClassName("pulsador")[valor].innerHTML;
            //DONDE SE COLOCARA EL TEXTO DE LA FECHA
            var escribir=document.getElementById("tiempo");
            escribir.innerHTML=leer;
            //DONDE ESCRIBE EL ARGUMENTO DE LA HISTORIA
            var redactar=document.getElementById("trama");
            redactar.innerHTML=historia[valor];
            configuracion();
            }
    }
    function configuracion()
    {
        //Ejecutandolo aqui dentro se asegura uno, que el documento ha terminado de cargar
        $("#fecha").css({"text-align":"center"});
        $("#fecha").css({"color":"rgb(192, 189, 8)"});
        $("#contenido").css({"text-align": "center"});
        $("#contenido").css({"font-size":"x-small"});
    }