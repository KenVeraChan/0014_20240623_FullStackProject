//// GESTION PARA TERMINAR SESION DE CUALQUIER JEFE, RRHH O CLIENTE POR INACTIVIDAD EN LAS PAGINAS WEB ////
var mouseStop = null;
var timeCloseSession = 60000; //tiempo en milisegundos: 60 SEGUNDOS que espera para efectuarse la funcion CIERRE DE SESION
var texto="";   //texto de devolucion
var subdirectorios="../";
var paginaExit="005_Login/salidaPagina.php";
var puntero=0;  //puntero de adicion de cadenas

function AddAlert(logeando,distancia_web) 
{
    if(logeando==1)  //Usuario: RRHH, JEFE O CLIENTE logeado, en otro caso estas funciones posteriores no deberían afectar, porque es cookie de visitante de página web
    {
        $(document).on('mousemove', function() {
            clearTimeout(mouseStop);
            mouseStop = setTimeout(Myfunction,timeCloseSession,distancia_web);
        });
    }
    else
    {
        //No hace nada
    }
}
function Myfunction(distancia_web) 
{
    for(puntero=0;puntero<distancia_web;puntero++)
    {
        texto=texto+subdirectorios;
    }
    alert("Por motivos de inactividad en la página web, la sesión ha caducado. Por favor vuelva a Logearse!"); //aqui efectua la funcion cuando dejas de mover el raton
    window.location.href=texto+paginaExit;  //Ve a la seccion de destruir la cookie para que al mismo tiempo se destruya y se cierre sesion
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
