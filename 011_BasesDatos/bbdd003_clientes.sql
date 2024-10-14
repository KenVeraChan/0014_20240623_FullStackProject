-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2024 a las 11:21:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbdd003_clientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientescarrito`
--

CREATE TABLE `clientescarrito` (
  `ID` int(3) DEFAULT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `DEPARTAMENTO` varchar(20) NOT NULL,
  `CANTIDAD` int(3) DEFAULT NULL,
  `COSTE_UNITARIO` float DEFAULT NULL,
  `COSTE_TOTAL` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientescarrito`
--

INSERT INTO `clientescarrito` (`ID`, `NOMBRE`, `DEPARTAMENTO`, `CANTIDAD`, `COSTE_UNITARIO`, `COSTE_TOTAL`) VALUES
(28, 'HERRAMIENTAS', 'PRODUCTOS', 1, 45.67, 45.67),
(29, 'INSTRUMENTACION', 'PRODUCTOS', 8, 8.25, 66),
(30, 'PANEL SOLAR', 'PRODUCTOS', 2, 4560.21, 9120.42),
(31, 'ROBOT', 'PRODUCTOS', 10, 201.23, 2012.3),
(32, 'SOFTWARE', 'PRODUCTOS', 1, 454, 454),
(31, 'ROBOT', 'PRODUCTOS', 4, 201.23, 804.92),
(31, 'ROBOT', 'PRODUCTOS', 3, 201.23, 603.69),
(37, 'PROCESADOR', 'PRODUCTOS', 9, 110.25, 992.25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientespedidos`
--

CREATE TABLE `clientespedidos` (
  `ID` int(3) DEFAULT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `APELLIDOS` varchar(30) DEFAULT NULL,
  `PRODUCTO` varchar(40) DEFAULT NULL,
  `CANTIDAD` int(6) DEFAULT NULL,
  `COSTE_UNITARIO` float UNSIGNED DEFAULT NULL,
  `COSTE_TOTAL` float UNSIGNED DEFAULT NULL,
  `FECHA_PEDIDO` date DEFAULT NULL,
  `ENTREGADO` varchar(15) DEFAULT NULL,
  `IMAGEN_PRODUCTO` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias`
--

CREATE TABLE `historias` (
  `ID` int(3) NOT NULL,
  `FECHA` varchar(30) DEFAULT NULL,
  `DECADA` int(10) NOT NULL,
  `SUCESO` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historias`
--

INSERT INTO `historias` (`ID`, `FECHA`, `DECADA`, `SUCESO`) VALUES
(1, 'MARZO 1972', 1970, 'La corporación Sfer4D tiene sus inicios históricos hacia el final de la guerra mundial por la supervivencia contra una enemigo común no humano. En los edificios arrasados de la antigua empresa tecnológica: <strong>Techeimer</strong>. En plena crisis el fundador <strong>William Wissangel</strong>, quien asumió el mando militar de una operación, la última, que logró hallar las debilidades de aquel enemigo, que por entonces estaba ganando. La tecnología militar era bastante inferior a la del enemigo, pero sus estrategias discretas de combate resultaron eficientes para la resistencia que quedó dividida en varios sectores de las primeras naciones que sufrieron los primeros golpes de la conquista.'),
(2, 'DICIEMBRE 1972', 1970, 'La empresa comienza con uno de sus proyectos propios: <strong>GREENOVATIO</strong> para devolver la vida verde al planeta. Financió y comenzó a vivir sus primeros reconocimientos tras estas primeras acciones altruistas.'),
(3, 'OCTUBRE 1974', 1970, 'Sfer4D diseña nuevas actualizaciones para el lenguaje de programación: <strong>VIS4C</strong>, posibilitando el control de autómatas y propiciando la mejora en la seguridad de los sistemas abordados.'),
(4, 'ENERO 1975', 1970, 'Sfer4D recibe el reconocimiento mundial tras formar parte de las organizaciones humanitarias de recuperación y reconstrucción de las infraestructuras a nivel nacional e internacional, aun cuando el coste de éste último apartado le supuso beneficios negativos.'),
(5, 'JUNIO 1975', 1970, 'La empresa alcanza un máximo de inversión tal que sus competidores continentales, aprovechan ese intento de masificarse para minimizarlo, por su descentralización de sus ventas en los sectores que más lo demandaban.'),
(6, 'SEPTIEMBRE 1975', 1970, 'Sfer4D decide trasladarse al continente de Shunay, región que le propoció grandes beneficios por el precio del suelo y el éxito del estudio de mercado. El empleazamiento poseía terrenos disponibles para futuros crecimientos y una profundidad disponible para excavar de poco más de dos kilómetros de tierra firme.'),
(7, 'AGOSTO 1980', 1980, 'Sfer4D cierra su primer contrato como asociado, para intercambiar materia prima y productos biotecnológicos, alcanzando un desarrollo en el diseño de fármacos especializados en cocteles de encimas reparadoras de tejidos dañados, tras el previo reconocimiento molecular al que debía acelerar su regeneración sistemática.'),
(8, 'SEPTIEMBRE 1980', 1980, 'Tras alcanzar un 45% mas de los beneficios calculados para el año anterior, Sfer4D amplia sus dominios territoriales hasta los 50 metros de profundidad excavada, a fin de poder extender subniveles de tratamiento de productos químicos, aún sin una demanda establecida.'),
(9, 'OCTUBRE 1980', 1980, 'Sfer4D termina de diseñar su primera inteligencia artificial para la manipulación de productos químicos de caracter ácido e inflamable. Decide no poner a la venta tales controladores automáticos por la escasez de ciertos semiconductores en los microprocesadores diseñados para tal fin.'),
(10, 'DICIEMBRE 1980', 1980, 'Al comprobar que el mercado tecnológico y de la producción de mecanismos de construcción, exigían de un software que pudiera determinar sus propias decisiones tras realizar previos cálculos, Sfer4D se lanza a profundizar en el control de la inteligencia artificial, inventando el escaneador tridimensional destinado a operaciones de construcción en ingeniería civil y de caminos. El dispositivo traza una holografía del espacio existente atravesando varios materiales para interpolar la presencia de cavidades u otros materiales sin necesidad de una previa perforación física.'),
(11, 'FEBRERO 1981', 1980, 'Con la imprevista cantidad de ventas generadas en ese mes, Sfer4D recurre a su propia inteligencia artificial, descubriendo extensas vías férreas abandonadas bajo el suelo continental de Sky-Gital. El ferrocarril abandonado perteneció a un fracasado proyecto de vías de circulación subterránea que los gobiernos negaron su posterior avance, debido a las consecutivas e inexplicables grietas que se generaron en pilares y paredes de carga de cientos de túneles del sur. Junto a varios ingenieros y geólogos de prestigio, descubrieron la inestabilidad térmica del suelo a una profundidad de 20 metros aun cuando era firme por encima de éstos.'),
(12, 'OCTUBRE 1981', 1980, 'No solo Sfer4D pretendía reabrir el abandonado proyecto sobre aquellas vías férreas abandonadas. Techeimer, empresa competidora, intentó adquirir protagonismo en aquel proyecto hasta que Sfer4D incorporó en los dispositivos de mapeo tridimensional, procesadores atmosféricos para los hostiles ambientes que hallarían a bastante profundidad. El proyecto se reabrió de nuevo para terminar cada una de sus fases de las que estaba compuesto.'),
(13, 'DICIEMBRE 1981', 1980, 'Sfer4D sufre un atentado terrorista en su sede continental de Shunay, reventando varias naves de almacenaje de productos inflamables, así como el robo de tecnología que no habían anunciado en el mercado tecnológico. En las redes sociales no se menciona que el robo fuera de tecnología que no hubiera sido puesta a la luz pública, hecho que involucró como sospechosos a la propia corporación. Los sospechosos según Sfer4D fueron los de su competencia, debido a la rapidez con que consiguieron hacerse con la tecnología que robaron, así como del hackeo de varios servidores para el acceso directo.'),
(14, 'ENERO 1982', 1980, 'A raíz de las publicaciones sobre aquel robo, la premisa de que fuera algún empleado de su propia empresa cobra mayor importancia, provocando la baja venta de sus habituales productos y servicios, perdiendo dos inversores y la influencia en el mercado internacional.'),
(15, 'MARZO 1982', 1980, 'William Wissangel decide contratar hasta doce detectives privados a los que llamó: <strong>Las balas del infierno</strong>, pues dispersados por todos los contientes del mundo, quiso hallar la verdad y el responsable de ese intento de quiebre de su empresa. La financiación de esos detectives puso en jaque el capital de su empresa, quedándole medio año de supervivencia, como tiempo para hallar a los responsables. Tras dos meses y medio de búsqueda en plena discreción, los detectives reunieron tantas pruebas como para incriminar a un grupo de 40 personas, la mitad ex empleados de pequeñas empresas tecnológicas y cinco de ellos, expresidiarios con cargos informáticos de robo y compras ilegales en la DeepWeb.'),
(16, 'NOVIEMBRE 1982', 1980, 'Sfer4D termina de recuperar su estatus tecnológico, tras haber presentado serios cargos de hurtos con un interés del 200% por la tecnología que iban a vender a su competencia con la firma del diseño y datasheet de los componentes a nombre de terceros. El endurecimiento de la pena aplicada a los criminales fue publicado en todas las revistas digitales para que se reforzaran implicitamente las infraestructuras de la ciberseguridad de cientos de servidores empresariales de caracter privado.'),
(17, 'OCTUBRE 1983', 1980, 'El apoyo económico continental de Shunay supone el alcance de los objetivos que Sfer4D se marcó para los proyectos que había estado guardando para la recuperación total de sus pérdidas en los años anteriores.'),
(18, 'DICIEMBRE 1983', 1980, 'Ante la llegada de las fechas navideñas y poseyendo un holgado capital, como para involucrarse en otro inesperado y propuesto por Sharyllín Rousher, tras hallar en los más pequeños el crecimiento de su fantasía emocional en aquellas fechas en las cuales, además, estaba presente la inocencia que tanto les identificaba. En los <strong>Territorios Blancos del Norte</strong> junto con los aliados de la <strong>NACIÓN-5Z</strong> planificaron levantar unas infraestructuras modulares destinados a prolongar la inocencia de los pequeños para cuando acudieran allí en las horas de la nochebuena, así como de todas las familias que hubieran dejado al niño que llevaban dentro en el pasado, a causa del acontencer de la vida.'),
(19, 'OCTUBRE 1984', 1980, 'Sharyllín Rousher inventa y desarrolla una encima para acelerar el crecimiento molecular de diversas estructuras orgánicas; primero de índole vegetal y luego analizando la animal. En el primer de los casos, tras haber destinado 200 días en 10.000 pruebas en su laboratorio y siendo validado por la implicación de la inteligencia artificial tras su análisis durante dos días, destinó su invento a la generación masiva de alimentos que podían desarrollarse en entornos térmicamente hostiles. Llevó su primer paquete de semillas a los gélidos campos del norte del planeta para poder iniciar las pruebas a temperaturas de -45ºC, consiguiendo resultados tan gratificantes como para aceptar su implicación en nombre de Sfer4D en la tercera fase del proyecto vigente: <strong>Greenovatio</strong>'),
(20, 'JULIO 1998', 1990, 'Sfer4D empieza a diseñar androides con fisiología humana para poder movilizarse entre pasillos, salas y almacenes con productos inflamables, corrosivos y tóxicos que formaban parte del diseño de otros productos. Los empleados que trabajaban en esos subniveles, fueron trasladados para que no sufrieran los posibles daños en la manipulación de tales productos. Las plantas inferiores, quedaron bajo el control de la automatización cuyas órdenes las recibía de un servidor local sin acceso al exterior.'),
(21, 'DICIEMBRE 1998', 1990, 'Debido a la demanda de material médico y software de procesamiento de datos, así como prediccion de los resultados pfrecidos, Sfer4D se mete en el desarrollo de la nanotecnología con los nanobots a fin de poder cubrir las necesidades de las operaciones médicas que exigieran de tanta precisión como eficacia en sus resultados. Sharyllín Rousher expone en la segunda quincena del mes, su proyecto beta ante varios cirujanos que comprobaron como en un conducto del tamaño de una arteria artificial, los nanobots lograron realizar una limpieza de varios componentes orgánicos que obstruían la circulación de un fluido natural cuyo caudal debía quedar estabilizado.'),
(22, 'DICIEMBRE 2000', 2000, 'Sfer4D logra diseñar un fluido artificial con nanobots, insoluble con cualquier disolución orgánica e inorgánica, debido a su firme red covalente que imita el mismo enlace que lleva su nombre.'),
(23, 'FEBRERO 2001', 2000, 'Con la nanotecnología desarrollada, Sfer4D logra implementar en sus dispositivos de mapeo tridimensional la capacidad de trazar holográficamente, micro espacios delimitados por estructuras orgánicas de diferentes índoles, generando en la visión artificial proporcionada, los datos moleculares de las diferentes estructuras que fuera detectando en sus cámaras de emisión.'),
(24, 'JULIO 2011', 2010, 'Sfer4D consigue actualizar Vis4C para el diseño de una inteligencia artificial autónoma. Se crea la polémica en el diseño de los frameworks útiles para la maquinaria y el software de la corporación no de uso particular y empresarial ajeno.'),
(25, 'OCTUBRE 2014', 2010, 'La inteligencia artificial descubre un nuevo material de constucción, pendiente de ponerse a pruebas técnicas. Se forja la ley orgánica para limitar el acceso a la inteligencia artificial para actualizar la documentación universal de los materiales de construcción.'),
(26, 'DICIEMBRE 2018', 2010, 'Se aprueba y certifica el material artificial diseñado por primera vez por una inteligencia artificial. Los ingenieros mecánicos del mundo entero se suman al estudio de dichos materiales para encontrar fallas en condiciones hositles y agresivas.'),
(27, 'ENERO 2020', 2020, 'Colonización completa en MANPERTOS y aprobación de la creación de la defensa orbital con las infraestructuras elípticas orbitales. Se descubre un sistema planetario a 25 años luz de distancia con posibles formas de vida tras descubrirse ondas de radio y señales enviadas al espacio profundo desde el tercero de los planetas contabilzados. Se confirma la existencia de vida hacia finales de año y se pone en marcha el primer satélite automatizado para escanear ese planeta desde una distancia de casi medio año luz de distancia.'),
(28, 'OCTUBRE 2022', 2020, 'Se consigue emplear el plasma de las llamas de fuego para almacenar energía de hasta 300 julios que luego se consumen a los pocos segundos. En diciembre se logra almacenar una energía capaz de mantener una bombilla encendida una semana de manera ininterrumpida.'),
(29, 'MAYO 2023', 2020, 'Primera puerta dimensional diseñada de forma virtual para destinarlos a estudios reales con múltiples aplicaciones. Se diseña la primera infraestructura en Manpertos. La energía forjada por el plasma retroalimenta la potencia necesaria para que la puerta dimensional alcance un mayor tiempo abierta y con alcances de teletransporte más lejanos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenesinterfazweb`
--

CREATE TABLE `imagenesinterfazweb` (
  `ID` int(4) NOT NULL,
  `NOMBRE` varchar(150) DEFAULT NULL,
  `TIPO` varchar(15) DEFAULT NULL,
  `TAMANIO` text DEFAULT NULL,
  `DESTINO` varchar(20) DEFAULT NULL,
  `SECTOR` varchar(40) DEFAULT NULL,
  `STOCK` int(4) NOT NULL,
  `COSTE` float NOT NULL,
  `DETALLES` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenesinterfazweb`
--

INSERT INTO `imagenesinterfazweb` (`ID`, `NOMBRE`, `TIPO`, `TAMANIO`, `DESTINO`, `SECTOR`, `STOCK`, `COSTE`, `DETALLES`) VALUES
(1, 'AutumnMeetings.jpg', 'image/jpeg', '120854', 'SLIDER', '', 0, 0, 'Reuniones de otoño'),
(2, 'Cubits.jpg', 'image/jpeg', '153692', 'SLIDER', '', 0, 0, 'Orientación futurista'),
(3, 'FutureUniversity.jpg', 'image/jpeg', '132528', 'SLIDER', '', 0, 0, 'Implicaciones en las universidades'),
(4, 'MettingIT.jpg', 'image/jpeg', '120457', 'SLIDER', '', 0, 0, 'Brainstorming'),
(5, 'OtraTierra.jpg', 'image/jpeg', '24782', 'SLIDER', '', 0, 0, 'La Tierra vista desde la Tierra'),
(6, 'TimeTravel.jpg', 'image/jpeg', '173503', 'SLIDER', '', 0, 0, 'Primeros viajes en el tiempo'),
(7, 'ViajeManpertos.jpg', 'image/jpeg', '85457', 'SLIDER', '', 0, 0, 'Colonización de Manpertos'),
(8, 'NOVEDADES.png', 'image/png', '4812', 'NOVEDADES', '', 0, 0, ''),
(9, 'NOTICIAS.png', 'image/png', '22206', 'NOVEDADES', '', 0, 0, ''),
(10, 'SERVICIOS.png', 'image/png', '36775', 'NOVEDADES', '', 0, 0, ''),
(11, 'PRODUCTOS.png', 'image/png', '23924', 'NOVEDADES', '', 0, 0, ''),
(12, 'SERVIDORES.png', 'image/png', '21307', 'NOVEDADES', '', 0, 0, ''),
(13, 'DINERO.png', 'image/png', '194365', 'NOVEDADES', '', 0, 0, ''),
(14, 'INVESTIGACION.png', 'image/png', '15517', 'NOVEDADES', '', 0, 0, 'Productos altamente radiactivos'),
(15, 'BASURA.png', 'image/png', '18139', 'NOVEDADES', '', 0, 0, ''),
(16, 'BARCO.png', 'image/png', '30567', 'NOVEDADES', '', 0, 0, 'Transportes transatlanticos eléctricos para cargas pesadas y de transportes a largas distancias'),
(17, 'ANTENA.png', 'image/png', '42120', 'NOVEDADES', '', 0, 0, ''),
(18, 'PLANETA.png', 'image/png', '128253', 'NOVEDADES', '', 0, 0, ''),
(19, 'NATURALEZA.png', 'image/png', '42905', 'NOVEDADES', '', 0, 0, ''),
(20, 'PIZARRA.png', 'image/png', '20969', 'NOVEDADES', '', 0, 0, ''),
(21, 'HIELO.png', 'image/png', '18928', 'NOVEDADES', '', 0, 0, ''),
(22, 'EDIFICIO.png', 'image/png', '17935', 'NOVEDADES', '', 0, 0, ''),
(23, 'ROBOT.png', 'image/png', '17802', 'NOVEDADES', '', 0, 0, 'Robot IRB121 para trabajos de hasta 200 kg de peso y volúmenes de trabajo de radio máximo de 3 metros'),
(24, 'AEROESPACIAL.png', 'image/png', '57672', 'CATEGORIA PRODUCTOS', '', 0, 0, 'Productos de diseño de aeronaves y materiales de alta resistencia y baja densidad para movilidad en espacios hostiles, así como elementos de investigación espacial'),
(25, 'BIOINGENIERIA.png', 'image/png', '22865', 'CATEGORIA PRODUCTOS', '', 0, 0, 'Material de uso en laboratorio, tratamiento de productos químicos y biológicos del peligrosidad de nivel medio'),
(26, 'CONSTRUCCION.png', 'image/png', '19724', 'CATEGORIA PRODUCTOS', '', 0, 0, 'Materiales de construcción: terrestre y espacial, no de obra civil'),
(27, 'INDUSTRIA.png', 'image/png', '14305', 'CATEGORIA PRODUCTOS', '', 0, 0, 'Productos de diseño industrial, programación robótica y automatización de maquinaria de producción'),
(28, 'HERRAMIENTAS.png', 'image/png', '65193', 'PRODUCTOS', 'INDUSTRIA', 7000, 45.67, ''),
(29, 'INSTRUMENTACION.png', 'image/png', '19315', 'PRODUCTOS', 'BIOINGENIERIA', 800, 8.25, 'Carga protegida en dislolución'),
(30, 'PANEL SOLAR.png', 'image/png', '20366', 'PRODUCTOS', 'AEROESPACIAL', 100, 4560.21, ''),
(31, 'ROBOT.png', 'image/png', '15660', 'PRODUCTOS', 'INDUSTRIA', 210, 201.23, ''),
(32, 'SOFTWARE.png', 'image/png', '50945', 'PRODUCTOS', 'INDUSTRIA', 1000, 454, 'Carga de ficheros'),
(34, 'TUNELADORA.png', 'image/png', '11428', 'SERVICIOS', 'INFRAESTRUCTURAS', 210, 201.23, ''),
(35, 'TRANSPORTE ELECTRICO.png', 'image/png', '287078', 'PRODUCTOS', 'CONSTRUCCION', 200, 50.2, ''),
(36, 'PUENTES.png', 'image/png', '91271', 'SERVICIOS', 'INFRAESTRUCTURAS', 0, 0, ''),
(37, 'PROCESADOR.png', 'image/png', '17120', 'PRODUCTOS', 'INDUSTRIA', 800, 110.25, 'Con el sistema operativo escrito en Vis4C trabaja con octacore'),
(38, 'ASTRONOMIA.png', 'image/png', '98622', 'CATEGORIA SERVICIOS', '', 0, 0, 'Investigación espacial más allá de Manpertos, dentro del sistema solar'),
(39, 'AUTOMATIZACION.png', 'image/png', '139979', 'CATEGORIA SERVICIOS', '', 0, 0, 'Auditorías en automatización y mejoras continuas'),
(40, 'ECOLOGIA.png', 'image/png', '22504', 'CATEGORIA SERVICIOS', '', 0, 0, 'Búsquedas de reemplezamiento ecológico sin interferir en el equilibrio productivo ajeno'),
(41, 'INFRAESTRUCTURAS.png', 'image/png', '72643', 'CATEGORIA SERVICIOS', '', 0, 0, 'Servicios de tratamiento de caminos terrestres y submarinos'),
(42, 'MEDICINA.png', 'image/png', '56008', 'CATEGORIA SERVICIOS', '', 0, 0, 'Servicios de investigación microbiológica de alto nivel'),
(43, 'OCEANOGRAFIA.png', 'image/png', '31565', 'CATEGORIA SERVICIOS', '', 0, 0, 'servicios de investigación submarina y mapeos en suelos oceánicos'),
(44, 'TELECOMUNICACIONES.png', 'image/png', '129533', 'CATEGORIA SERVICIOS', '', 0, 0, 'mejoras en las transmisiones interplanetarias y de larga distancia espacial'),
(45, 'EDUCACION.png', 'image/png', '158168', 'CATEGORIA SERVICIOS', '', 0, 0, 'proveedor de tecnología para el perfeccionamiento de la educación'),
(46, 'MINERIA.png', 'image/png', '139716', 'SERVICIOS', 'ASTRONOMIA', 30, 1233.25, 'Servicios con tecnología punta para minería en terrenos extraterrestres'),
(47, 'MAPEOS.png', 'image/png', '29599', 'SERVICIOS', 'ASTRONOMIA', 22, 336.5, 'Servicio de mapeo superficial y escaneo subterraneos digitalizados'),
(48, 'TRAZADORES.png', 'image/png', '20341', 'SERVICIOS', 'ASTRONOMIA', 382, 225.25, 'Trazadores autónomos para búsqueda de materia orgánica espacial'),
(49, 'SATENEXOS.png', 'image/png', '34485', 'SERVICIOS', 'ASTRONOMIA', 34, 514.5, 'Satélites nexos entre varias redes orbitales sobre planetas en investigación'),
(50, 'NAVES.png', 'image/png', '15640', 'SERVICIOS', 'ASTRONOMIA', 59, 125.75, 'Peritación de vehículos espaciales con escaneos microscópicos'),
(51, 'SENSOR.png', 'image/png', '27090', 'SERVICIOS', 'AUTOMATIZACION', 12763, 103.75, 'Servicio de instalación de sensores en cadenas de producción'),
(52, 'INSTALACIONES.png', 'image/png', '39505', 'SERVICIOS', 'AUTOMATIZACION', 3113, 122.25, 'Servicios de instalación de software embebido en maquinarias industriales'),
(53, 'ORGANIZACIÓN.png', 'image/png', '20301', 'SERVICIOS', 'AUTOMATIZACION', 121, 422.75, 'Servicios de organización de una planta industrial para minimizar los costes de transporte entre naves'),
(54, 'REDES.png', 'image/png', '70530', 'SERVICIOS', 'AUTOMATIZACION', 27, 3322.25, 'Servicio de instalación y diseño de redes industriales para maximizar las comunicaciones dentro y fuera del área corporativo'),
(55, 'ALMACENAJE.png', 'image/png', '69515', 'SERVICIOS', 'AUTOMATIZACION', 74, 111.75, 'Servicio de almacenaje y creación de servidores industriales óptimos para trabajos BIG DATA'),
(56, 'GRUA.png', 'image/png', '16315', 'SERVICIOS', 'AUTOMATIZACION', 18, 14.25, 'Instalación de grúas puente en naves industriales'),
(57, 'CULTIVOS.png', 'image/png', '28928', 'SERVICIOS', 'ECOLOGIA', 18112, 71.75, 'Servicio de aporte tecnológico al sistema agrario vertical y en medios hostiles'),
(58, 'TRACTOR.png', 'image/png', '203727', 'SERVICIOS', 'ECOLOGIA', 36, 151.75, 'Servicios de adaptación de la maquinaria agraria con inteligencia artificial para la automatización de las labores'),
(59, 'GENETICA.png', 'image/png', '30278', 'SERVICIOS', 'MEDICINA', 126, 301.25, 'Servicios de investigación microbiologica para vacunas y medicamentos'),
(60, 'DISOLUCIONES.png', 'image/png', '17824', 'SERVICIOS', 'MEDICINA', 403, 114.25, 'Servicio de tratamiento de disoluciones químicas y análsisi de peligrosidad'),
(61, 'BIENESTAR.png', 'image/png', '19382', 'SERVICIOS', 'MEDICINA', 211, 16.5, 'Productos medicinales para todas las familias'),
(62, 'PROFUNDIDADES.png', 'image/png', '33351', 'SERVICIOS', 'OCEANOGRAFIA', 14, 1112.25, 'Servicio de investigación de terrenos submarinos para detectar posibles movimientos sísmicos moderados'),
(63, 'ESTABILIDAD.png', 'image/png', '23718', 'SERVICIOS', 'OCEANOGRAFIA', 833, 1113.75, 'Servicio de investigación de oleajes digitalizados para levntar viviendas en pleno mar'),
(64, 'CIUDADELAS.png', 'image/png', '18780', 'SERVICIOS', 'OCEANOGRAFIA', 2521, 511.5, 'Estudio del terreno subterraneo para instalar edificaciones de investigación profunda'),
(65, 'PURIFICADORA.png', 'image/png', '14020', 'SERVICIOS', 'OCEANOGRAFIA', 114, 1111.75, 'Servicio de asistencia en la implementación de tecnología de purificación de aguas del mar'),
(66, 'GEOESTACIONARIOS.png', 'image/png', '21119', 'SERVICIOS', 'TELECOMUNICACIONES', 201, 112.25, 'Servicios de programación de satélites orbitales de inertes zonas planetarias'),
(67, 'AERONAVES.png', 'image/png', '22430', 'SERVICIOS', 'TELECOMUNICACIONES', 246, 1112.25, 'Servicios de manejo automatizado de lanzaderas espaciales'),
(69, 'PIZARRAS.png', 'image/png', '66842', 'SERVICIOS', 'EDUCACION', 432, 171.5, 'Pizarras digitales con holografia tridimensional para la enseñanza'),
(70, 'TABLETS.png', 'image/png', '9977', 'SERVICIOS', 'EDUCACION', 72, 44.5, 'Dispositivos electrónicos para el aprendizae con bases de datos simuladas para aprender a programar VIS4C'),
(71, 'PROGRAMACION.png', 'image/png', '16776', 'CATEGORIA PROYECTOS', '', 0, 0, ''),
(72, 'AGRICULTURA.png', 'image/png', '26379', 'CATEGORIA PROYECTOS', '', 0, 0, ''),
(73, 'COLONIZACION.png', 'image/png', '29643', 'CATEGORIA PROYECTOS', '', 0, 0, ''),
(74, 'SUBMARINISMO.png', 'image/png', '279171', 'CATEGORIA PROYECTOS', '', 0, 0, ''),
(75, 'ATMOSFERA.png', 'image/png', '12947', 'CATEGORIA PROYECTOS', '', 0, 0, ''),
(76, 'CARRETERAS.png', 'image/png', '43133', 'CATEGORIA PROYECTOS', '', 0, 0, ''),
(77, 'METEORITO.png', 'image/png', '35467', 'CATEGORIA PROYECTOS', '', 0, 0, ''),
(78, 'PROFUNDIDADES.png', 'image/png', '46965', 'CATEGORIA PROYECTOS', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loginclientes`
--

CREATE TABLE `loginclientes` (
  `ID` int(3) NOT NULL,
  `USUARIO` varchar(40) DEFAULT NULL,
  `CONTRASENIA` varchar(40) DEFAULT NULL,
  `TELEFONO` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `loginclientes`
--

INSERT INTO `loginclientes` (`ID`, `USUARIO`, `CONTRASENIA`, `TELEFONO`) VALUES
(1, 'Juan', 'zetas', 983223309),
(2, 'Laura', 'tintosginos', 983002110);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historias`
--
ALTER TABLE `historias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `imagenesinterfazweb`
--
ALTER TABLE `imagenesinterfazweb`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `loginclientes`
--
ALTER TABLE `loginclientes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historias`
--
ALTER TABLE `historias`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `imagenesinterfazweb`
--
ALTER TABLE `imagenesinterfazweb`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `loginclientes`
--
ALTER TABLE `loginclientes`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
