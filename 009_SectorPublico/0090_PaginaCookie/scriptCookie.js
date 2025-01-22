/******************************************************************/
/***** SCRIPT DE LA CARGA DE LA COOKIE DE LA PÁGINA DE INICIO *****/
/******************************************************************/

let close_button = document.getElementById("close-button");
close_button.addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("window-notice").style.display = "none";
    //cargarPagina(); //Carga del resto de la página web
});