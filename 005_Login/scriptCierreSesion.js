//// GESTION PARA TERMINAR SESION DE CUALQUIER JEFE, RRHH O CLIENTE POR INACTIVIDAD EN LAS PAGINAS WEB ////
function AddAlert(logeando) 
{
    if(logeando==1)  //Usuario: RRHH, JEFE O CLIENTE logeado, en otro caso estas funciones posteriores no deberían afectar, porque es cookie de visitante de página web
    {
        var mouseStop = null;
        var Time = 5000; //tiempo en milisegundos que espera para saefectuarse la funcion
        $(document).on('mousemove', function() {
            clearTimeout(mouseStop);
            mouseStop = setTimeout(Myfunction,Time);
        });
    }
    else
    {
        //No hace nada
    }
}
function Myfunction() 
{
    alert("Por motivos de inactividad en la página web, la sesión ha caducado. Por favor vuelva a Logearse!"); //aqui efectua la funcion cuando dejas de mover el raton
    window.location.href="../../005_Login/salidaPagina.php";  //Ve a la seccion de destruir la cookie para que al mismo tiempo se destruya y se cierre sesion
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
