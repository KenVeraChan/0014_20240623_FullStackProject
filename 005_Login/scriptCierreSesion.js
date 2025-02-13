//// GESTION PARA TERMINAR SESION DE CUALQUIER JEFE, RRHH O CLIENTE POR INACTIVIDAD EN LAS PAGINAS WEB ////
function AddAlert(logeando,distancia_web) 
{
    if(logeando==1)  //Usuario: RRHH, JEFE O CLIENTE logeado, en otro caso estas funciones posteriores no deberían afectar, porque es cookie de visitante de página web
    {
        var mouseStop = null;
        var Time = 5000; //tiempo en milisegundos que espera para saefectuarse la funcion
        $(document).on('mousemove', function() {
            clearTimeout(mouseStop);
            mouseStop = setTimeout(Myfunction(distancia_web),Time);
        });
    }
    else
    {
        //No hace nada
    }
}
function Myfunction(distancia_web) 
{
    var texto="";   //texto de devolucion
    var subdirectorios="../";
    var paginaExit="005_Login/salidaPagina.php";
    var puntero=0;  //puntero de adicion de cadenas
    for(puntero=0;puntero<distancia_web;puntero++)
    {
        texto=texto+subdirectorios;
    }
    alert("Por motivos de inactividad en la página web, la sesión ha caducado. Por favor vuelva a Logearse!"+texto+paginaExit); //aqui efectua la funcion cuando dejas de mover el raton
    window.location.href=texto+paginaExit;  //Ve a la seccion de destruir la cookie para que al mismo tiempo se destruya y se cierre sesion
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
