<?php
//INICIA LA SESION DE ENTRADA
session_start();  //Para reanudar la sesion creada si se ha iniciado sino creará una nueva
                    //También permite rescatar la información almancenada en la variable superglobal $_SESSION
	if(!isset($_SESSION["usuario"]))
	{
		//Si es falso que no se ha registrado nada en la sesion
		header("Location:../../../../005_Login/0053_LoginCLIENTES/loginCLIENTES.php");
	}
	require "../../../../005_Login/cierreSesionesCookie.php";   //Gestion de cierres de sesion tras consumirse la COOKIE
	$rutaPaginaTarjetaCliente="location:../../../../005_Login/";   //Se pone la ruta desde la página Tarjeta Cliente
	cargaWebCookie($rutaPaginaTarjetaCliente);   //Se ejecuta la función de carga página según cookie desde la página Tarjeta Cliente
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Formulario Tarjeta Bancaria</title>
	<link rel="stylesheet" href="tarjetaBancaria.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>  <!-- CARGA LA JQUERY PARA EL JS CIERRE SESSION-->
    <script src="../../../../005_Login/scriptCierreSesion.js"></script>  <!-- carga del fichero desde LOGIN -->
</head>
<body>
	<div class="contenedor">
		<!-- Tarjeta -->
		<div class="letreroOK" style=
               "position:absolute;
                width:100%; 
                height: 40px; 
                text-align: center;
                color: white;
                margin-top:-100px;
                background-color: rgba(0, 0, 19, 0.89);
                box-shadow: none">
        </div>
		<br><br><br><br>
		<section class="tarjeta" id="tarjeta">
			<div class="delantera">
				<div class="logo-marca" id="logo-marca">
				</div>
				<img src="imagenes/chip-tarjeta.png" class="chip" alt="">
				<div class="datos">
					<div class="grupo" id="numero">
						<p class="label">Número Tarjeta</p>
						<p class="numero"><?php if(isset($_SESSION["NUMERODB"])){echo $_SESSION["NUMERODB"];}else{echo "#### #### #### ####";}?></p>
					</div>
					<div class="flexbox">
						<div class="grupo" id="nombre">
							<p class="label">Nombre Tarjeta</p>
							<p class="nombre"><?php if(isset($_SESSION["NOMBREDB"])){echo $_SESSION["NOMBREDB"];}else{echo "RWR";}?></p>
						</div>
						<div class="grupo" id="expiracion">
							<p class="label">Expiracion</p>
							<p class="expiracion"><span class="mes"><?php if(isset($_SESSION["MESDB"])){echo $_SESSION["MESDB"];}else{echo "MM";}?></span> / <span class="year"><?php if(isset($_SESSION["ANIODB"])){echo$_SESSION["ANIODB"];}else{echo "AA";}?></span></p>
						</div>
					</div>
				</div>
			</div>
			<div class="trasera">
				<div class="barra-magnetica"></div>
				<div class="datos">
					<div class="grupo" id="firma">
						<p class="label">Firma</p>
						<div class="firma"><p><?php if(isset($_SESSION["NOMBREDB"])){echo $_SESSION["NOMBREDB"];}else{echo "RWR";}?></p></div>
					</div>
					<div class="grupo" id="ccv">
						<p class="label">CCV</p>
						<p class="ccv"><?php if(isset($_SESSION["CCVDB"])){echo $_SESSION["CCVDB"];}else{echo "";}?></p>
					</div>
				</div>
				<p class="leyenda">Tarjeta socio para compras, servicios y proyectos. Corporación comprometida con el medio ambiente y el bienestar social del planeta, construyendo un equilibrio tecnológico favorable</p>
				<a href="#" class="link-banco">www.sfer4Dcorporation.sh</a>
			</div>
		</section>
		<!-- Contenedor Boton Abrir Formulario -->
		<div class="contenedor-btn">
			<button class="btn-abrir-formulario" id="btn-abrir-formulario">
				<i class="fas fa-plus"></i>
			</button>
		</div>
		<!-- Formulario -->
		<form action="../../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/0096_01_01_TarjetaBanco/consultaTarjetaBancaria.php" id="formulario-tarjeta" class="formulario-tarjeta" method="POST">
			<div class="grupo">
				<label for="inputNumero">Número Tarjeta</label>
				<input type="text" id="inputNumero" maxlength="19" autocomplete="off" name="numTarjeta" value="<?php if(isset($_SESSION["NUMERODB"])){echo $_SESSION["NUMERODB"];}else{echo "0";}?>">
			</div>
			<div class="grupo">
				<label for="inputNombre">Nombre</label>
				<input type="text" id="inputNombre" maxlength="19" autocomplete="off" name="nombreTarjeta" value="<?php if(isset($_SESSION["NOMBREDB"])){echo $_SESSION["NOMBREDB"];}else{echo "";}?>">
			</div>
			<div class="flexbox">
				<div class="grupo expira">
					<label for="selectMes">Expiracion</label>
					<div class="flexbox">
						<div class="grupo-select">
							<select id="selectMes" name="mesTarjeta">
								<option disabled selected><?php if(isset($_SESSION["MESDB"])){echo $_SESSION["MESDB"];}else{echo "MES";}?></option>
							</select>
							<i class="fas fa-angle-down"></i>
						</div>
						<div class="grupo-select">
							<select id="selectYear" name="anioTarjeta">
								<option disabled selected ><?php if(isset($_SESSION["ANIODB"])){echo$_SESSION["ANIODB"];}else{echo "ANIO";}?></option>
							</select>
							<i class="fas fa-angle-down"></i>
						</div>
					</div>
				</div>
				<div class="grupo ccv">
					<label for="inputCCV">CCV</label>
					<input type="text" id="inputCCV" maxlength="3" name="CCVtarjeta" value="<?php if(isset($_SESSION["CCVDB"])){echo $_SESSION["CCVDB"];}else{echo "000";}?>">
				</div>
			</div>
			<button type="submit" class="btn-enviar" name="cargar" title="Al accionar este botón se cargarán los datos de su tarjeta de socio">CARGA DATOS</button>
			<button type="submit" class="btn-enviar" name="activar" title="Al accionar este botón se activará su tarjeta de socio">ACTIVAR</button>
			<button type="submit" class="btn-enviar" name="actualizar" title="Al accionar este botón se actualizarán los datos de su tarjeta de socio">ACTUALIZAR</button>
			<button type="submit" class="btn-enviar" name="volver" title="Al accionar este botón regresará al menú del formulario de datos personales">VOLVER</button>
		</form>
	</div>
	<script src="tarjetaBancaria.js"></script>
	<script>letreroConfirmado(<?php echo $_SESSION["indicador"]; ?>);</script>
	<?php $_SESSION["indicador"]=0; //Reiniciar variable ?> 
	<script>AddAlert(<?php echo $_SESSION["logeando"]?>); //Para el comienzo de la deteccion de la inactividad en la pagina web pero no afecta sin usuario logeado de cualquier tipo</script>
</body>
</html>