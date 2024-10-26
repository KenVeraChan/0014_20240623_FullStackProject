var elemento1= document.getElementsByClassName("bloque_opciones");

function cargarPagina()
{
    for(let i=0;i<elemento1.length;i++)
        {
        //BOTON DE OPCIONES VISIBLE
        elemento1[i].style.visibility="visible";
        elemento1[i].style.borderRadius= "10px";
        elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
        elemento1[i].addEventListener('mouseenter',function(){
            elemento1[i].style.background= "white";
            elemento1[i].style.color="black";
            elemento1[i].style.boxShadow="5px 10px 15px white";
            elemento1[i].style.transitionDuration="1s";
            elemento1[i].style.marginLeft="30%";
            elemento1[i].style.width="40%";
                })
        elemento1[i].addEventListener('mouseleave',function(){
            elemento1[i].style.background= "rgba(0, 0, 19, 0.89)";
            elemento1[i].style.color="white";
            elemento1[i].style.boxShadow="none";
            elemento1[i].style.transitionDuration="1s";
            elemento1[i].style.marginLeft="20%";
            elemento1[i].style.width="60%";
                })
        }
}
