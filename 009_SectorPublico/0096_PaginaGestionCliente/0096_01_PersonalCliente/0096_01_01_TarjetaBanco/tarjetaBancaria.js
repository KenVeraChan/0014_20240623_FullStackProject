const tarjeta = document.querySelector('#tarjeta'),
	  btnAbrirFormulario = document.querySelector('#btn-abrir-formulario'),
	  formulario = document.querySelector('#formulario-tarjeta'),
	  numeroTarjeta = document.querySelector('#tarjeta .numero'),
	  nombreTarjeta = document.querySelector('#tarjeta .nombre'),
	  logoMarca = document.querySelector('#logo-marca'),
	  firma = document.querySelector('#tarjeta .firma p'),
	  mesExpiracion = document.querySelector('#tarjeta .mes'),
	  yearExpiracion = document.querySelector('#tarjeta .year');
	  ccv = document.querySelector('#tarjeta .ccv');

// * Volteamos la tarjeta para mostrar el frente.
const mostrarFrente = () => {
	if(tarjeta.classList.contains('active')){
		tarjeta.classList.remove('active');
	}
}

// * Rotacion de la tarjeta
tarjeta.addEventListener('click', () => {
	tarjeta.classList.toggle('active');
});

// * Boton de abrir formulario
btnAbrirFormulario.addEventListener('click', () => {
	btnAbrirFormulario.classList.toggle('active');
	formulario.classList.toggle('active');
});

// * Select del mes generado dinamicamente.
for(let i = 1; i <= 12; i++){
	let opcion = document.createElement('option');
	opcion.value = i;
	opcion.innerText = i;
	formulario.selectMes.appendChild(opcion);
}

// * Select del año generado dinamicamente.
const yearActual = new Date().getFullYear();
for(let i = yearActual; i <= yearActual + 8; i++){
	let opcion = document.createElement('option');
	opcion.value = i;
	opcion.innerText = i;
	formulario.selectYear.appendChild(opcion);
}

// * Input numero de tarjeta
formulario.inputNumero.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.inputNumero.value = valorInput
	// Eliminamos espacios en blanco
	.replace(/\s/g, '')
	// Eliminar las letras
	.replace(/\D/g, '')
	// Ponemos espacio cada cuatro numeros
	.replace(/([0-9]{4})/g, '$1 ')
	// Elimina el ultimo espaciado
	.trim();

	numeroTarjeta.textContent = valorInput;

	if(valorInput == ''){
		numeroTarjeta.textContent = '#### #### #### ####';

		logoMarca.innerHTML = '';
	}

	if(valorInput[0] == 4){
		logoMarca.innerHTML = '';
		const imagen = document.createElement('img');
		imagen.src = 'img/logos/visa.png';
		logoMarca.appendChild(imagen);
	} else if(valorInput[0] == 5){
		logoMarca.innerHTML = '';
		const imagen = document.createElement('img');
		imagen.src = 'img/logos/mastercard.png';
		logoMarca.appendChild(imagen);
	}

	// Volteamos la tarjeta para que el usuario vea el frente.
	mostrarFrente();
});

// * Input nombre de tarjeta
formulario.inputNombre.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	formulario.inputNombre.value = valorInput.replace(/[0-9]/g, '');
	nombreTarjeta.textContent = valorInput;
	firma.textContent = valorInput;

	if(valorInput == ''){
		nombreTarjeta.textContent = 'Jhon Doe';
	}

	mostrarFrente();
});

// * Select mes
formulario.selectMes.addEventListener('change', (e) => {
	mesExpiracion.textContent = e.target.value;
	mostrarFrente();
});

// * Select Año
formulario.selectYear.addEventListener('change', (e) => {
	yearExpiracion.textContent = e.target.value.slice(2);
	mostrarFrente();
});

// * CCV
formulario.inputCCV.addEventListener('keyup', () => {
	if(!tarjeta.classList.contains('active')){
		tarjeta.classList.toggle('active');
	}

	formulario.inputCCV.value = formulario.inputCCV.value
	// Eliminar los espacios
	.replace(/\s/g, '')
	// Eliminar las letras
	.replace(/\D/g, '');

	ccv.textContent = formulario.inputCCV.value;
});

//FUNCION DE CARGA DEL PANEL INFORMATIVO
function letreroConfirmado(tipoLetrero)
{
    var letrero= document.getElementsByClassName("letreroOK")[0];
    if(tipoLetrero==1)
        {
            //LETRERO DE DATOS SUBIDOS A LA BBDD
            letrero.innerHTML="DATOS DE LA TARJETA ACTUALIZADOS";
            letrero.style.color="rgb(19,229,61)";
        }
    if(tipoLetrero==2)
        {
            //LETRERO DE CARGA IMÁGENES PRODUCTOS
            letrero.innerHTML="ERROR! SIN DATOS DETECTADOS PARA ACTUALIZAR";
            letrero.style.color="rgb(239,4,4)";
        }
	if(tipoLetrero==3)
		{
			//LETRERO DE DATOS SUBIDOS A LA BBDD
			letrero.innerHTML="DATOS DE LA TARJETA CARGADOS";
			letrero.style.color="rgb(19,229,61)";
		}
	if(tipoLetrero==4)
		{
			//LETRERO DE DATOS SUBIDOS A LA BBDD
			letrero.innerHTML="TARJETA DE SOCIO ACTIVADA CORRECTAMENTE";
			letrero.style.color="rgb(19,229,61)";
		}
	if(tipoLetrero==5)
		{
			//LETRERO DE NO SE HA ACTIVADO ALGO QUE YA ESTABA REGISTRADO
            letrero.innerHTML="ERROR! NO SE HA ACTIVADO PORQUE YA ESTABA ACTIVADA. ELIJA ACTUALIZAR EN ESTE CASO!";
            letrero.style.color="rgb(239,4,4)";
		}
	if(tipoLetrero==6)
		{
			//LETRERO DE NO SE HA ACTUALIZADO PORQUE NO EXISTIA EL REGISTRO
			letrero.innerHTML="ERROR! NO SE HA ACTUALIZADO PORQUE NO ESTABA REGISTRADO. ELIJA ACTIVAR EN ESTE CASO!";
			letrero.style.color="rgb(239,4,4)";
		}
	if(tipoLetrero==7)
		{
			//LETRERO DE NO SE HA ACTUALIZADO PORQUE NO EXISTIA EL REGISTRO
			letrero.innerHTML="ERROR! NO SE HAN CARGADO LOS DATOS PORQUE NO EXISTEN. PROCEDA A ACTIVAR SU TARJETA DE SOCIO!";
			letrero.style.color="rgb(239,4,4)";
		}
	if(tipoLetrero==8)
		{
			//LETRERO DE NO SE HA ACTUALIZADO PORQUE NO EXISTIA EL REGISTRO
			letrero.innerHTML="ERROR! NO SE HA ACTIVADO PORQUE NO SE HAN COMPLETADO TODOS LOS CAMPOS DEL FORMULARIO!";
			letrero.style.color="rgb(239,4,4)";
		}
    if(tipoLetrero>0 && tipoLetrero<9)
    {
        letrero.style.paddingTop="10px";
        letrero.style.boxShadow= "rgb(150,150,150) 5px 5px 20px 10px";
        letrero.style.transitionDuration = "1s";
        letrero.style.marginTop="0px";
    
        document.addEventListener("mousemove",function(){
        let temporizador=setTimeout(function(){
            var letrero= document.getElementsByClassName("letreroOK")[0];
            letrero.style.transitionDuration = "1s";
            letrero.style.marginTop="-100px";
        },3500);
        })
        clearTimeout(temporizador);
    }
}