<head>
    <title>Add Map</title>
    <!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> -->

    <link rel="stylesheet" type="text/css" href="estilos.css" />
    <script type="module" src="./index.js"></script>
  </head>
	<body>
	<style>
      #map {
  height: 400px; /* The height is 400 pixels */
  width: 100%; /* The width is the width of the web page */
}
    </style>
	
	
    <!--The div element for the map -->
    
    

   
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU2V4MODTl1ivjUpFpwxd8o77DsuYh4Rw&callback=initMap&v=weekly"
      defer
    ></script>

    <script>
  function initMap() {  
  	const uluru = { lat: 19.40287, lng: -99.01571 };
  	// The map, centered at Uluru
  	const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: uluru,
  });

	
	let eve = 0 
	console.log(eve)
	
  map.addListener('click', function(event) {
  var latLng = event.latLng;
	
  if (confirm('¿Es esta es la ubicación de tu negocio? Latitud: ' + latLng.lat() + ', Longitud: ' + latLng.lng())) {
    // Si el usuario confirma que esta es su ubicación, llama a la función getLocation() para obtener la geolocalización del punto seleccionado.
    getLocation(latLng);
  }

	eve = latLng	
	console.log(eve)

	let lat = document.getElementById("lat")
	lat.value= eve.lat()
	document.getElementById("lon").value = eve.lng()
	// console.log(lat)

});

	setInterval(() => {
		console.log(eve.lat())		
	}, 5000);


  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
function getLocation(latLng) {
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({'location': latLng}, function(results, status) {
    if (status === 'OK') {
      if (results[0]) {
        alert(results[0].formatted_address);
      } else {
        alert('No se encontró ninguna dirección para esta ubicación.');
      }
    } else {
      alert('Geocode falló debido a: ' + status);
    }
  });
}

window.initMap = initMap;
    </script>





<!--CONTENIDO-->
<div style="width: 100%;padding-top: 40px;padding-bottom: 120px;padding-left: 30px;padding-right: 30px;">
	<center>
		<?php echo '<a href="'.$linkinit.'">';?>
		<h1 class="slidy2" style="color:#fff;font-size: 32px;text-align: center;font-weight: 700;font-family: 'Lalezar', sans-serif;"><span style="color: #0e0e0e;">PONME</span>LOCAL<span style="font-size: 18px;font-weight: 400;color: #0e0e0e;"> &copy;</span></h1>
		</a>
		<h1 style="color:#0e0e0e;font-size: 20px;text-align: center;font-weight: 700;font-family: 'Archivo Black', sans-serif;">
			&iexcl;Listo para unirme!
		</h1>
		<p>
			Llena la siguiente solicitud para unirte a PONMELOCAL&copy;.
		</p>
		<br>
		<br>
		<form enctype="multipart/form-data" id="ingresaru" name="ingresaru" method="post" action= "admin/mandar_mail.php">
			<input class="inputes" style="width: 250px;height: 60px;border-bottom: 3px solid #0e0e0e;outline:0;text-align: center;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;background-color: var(--primary-color);" type="text" id="mail-local" name="mail-local" placeholder="TU E-MAIL*" value=""/>
			<br>
			<br>
			<input class="inputes" style="width: 250px;height: 60px;border-bottom: 3px solid #0e0e0e;outline:0;text-align: center;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;background-color: var(--primary-color);" type="text" id="nombre-local" name="nombre-local" placeholder="NOMBRE DEL LOCAL*" value=""/>
			<br>
			<br>
			<br>
			<div class="container_f" style="max-width: 500px;">
				<div class="container-drop-choose">
					<select class="selection-dropdown-choose" id="tipo-local" name="tipo-local">
						<option value="Default">Tipo de Local*</option>
						<option value="Local">Local</option>
						<option value="Puesto">Puesto</option>
						<option value="Digital Kitchen">Digital Kitchen</option>
						<option value="Restaurante">Restaurante</option>
						<option value="Fondita">Fondita</option>
						<option value="Servicio">Servicio</option>
						<option value="Food Truck">Food Truck</option>
						<option value="Mercado">Mercado</option>
					</select>
				</div>
				
			</div>
			<br>
			<div class="container_f check" style="max-width: 500px;">
				<div class="container-drop-choose">
					<select class="selection-dropdown-choose" id="envios" name="envios">
						<option value="Default">Envio comida*</option>
						<option value="SI">SI</option>
						<option value="NO">NO</option>
					</select>
				</div>
				
			</div>
			<br>
			<br>
			<h1 style="font-size: 18px;">Seleccione los d&iacute;as que abren:</h1>
			<div class="container_f" style="max-width: 1000px;">
					<div class="checkchoose">
						<label class="container-tc-pp" style="max-width: 100px;">
							<h1 style="font-size: 20px;">Lunes</h1>
							<input type="checkbox" name="dia_lunes" id="dia_lunes" value="1">
							<span class="checkmark-tc-pp"></span>
						</label>
					</div>
					<div class="checkchoose">
						<label class="container-tc-pp" style="max-width: 100px;">
							<h1 style="font-size: 20px;">Martes</h1>
							<input type="checkbox" name="dia_martes" id="dia_martes" value="1">
							<span class="checkmark-tc-pp"></span>
						</label>
					</div>
					<div class="checkchoose" >
						<label class="container-tc-pp" style="max-width: 100px;">
							<h1 style="font-size: 20px;">Miercoles</h1>
							<input type="checkbox" name="dia_miercoles" id="dia_miercoles" value="1">
							<span class="checkmark-tc-pp"></span>
						</label>
					</div>
					<div class="checkchoose">
						<label class="container-tc-pp" style="max-width: 100px;">
							<h1 style="font-size: 20px;">Jueves</h1>
							<input type="checkbox" name="dia_jueves" id="dia_jueves" value="1">
							<span class="checkmark-tc-pp"></span>
						</label>
					</div>
					<div class="checkchoose">
						<label class="container-tc-pp" style="max-width: 100px;">
							<h1 style="font-size: 20px;">Viernes</h1>
							<input type="checkbox" name="dia_viernes" id="dia_viernes" value="1">
							<span class="checkmark-tc-pp"></span>
						</label>
					</div>
					<div class="checkchoose">
						<label class="container-tc-pp" style="max-width: 100px;">
							<h1 style="font-size: 20px;">Sabado</h1>
							<input type="checkbox" name="dia_sabado" id="dia_sabado" value="1">
							<span class="checkmark-tc-pp"></span>
						</label>
					</div>
					<div class="checkchoose">
						<label class="container-tc-pp" style="max-width: 100px;">
							<h1 style="font-size: 20px;">Domingo</h1>
							<input type="checkbox" name="dia_domingo" id="dia_domingo" value="1">
							<span class="checkmark-tc-pp"></span>
						</label>
					</div>
				</tr>
			</div>
			<br>
			<br>
			<div class="container_f" style="max-width: 500px;">
				<div class="container-drop-choose">
					<select class="selection-dropdown-choose" id="hora-abrir" name="hora-abrir">
						<option value="Default">Abro a las*...</option>
						<?php
						for ($i = 0; $i < 24; $i++) 
						{
							if($i < 10)
							{
								$horarioc = "0".$i.":00";
							}
							else
							{
								$horarioc = $i.":00";
							}

							if($abierto == $horarioc)
							{
								echo '<option value="'.$horarioc.'" selected>'.$horarioc.'</option>';
							}
							else
							{
								echo '<option value="'.$horarioc.'" >'.$horarioc.'</option>';
							}
						}
						?>
					</select>
				</div>
				<div class="visibledevice">
					<br>
				</div>
				<div class="container-drop-choose">
					<select class="selection-dropdown-choose" id="hora-cerrar" name="hora-cerrar">
						<option value="Default">Cierro a las*...</option>
						<?php
						for ($i = 0; $i < 24; $i++) 
						{
							if($i < 10)
							{
								$horarioc = "0".$i.":00";
							}
							else
							{
								$horarioc = $i.":00";
							}

							if($abierto == $horarioc)
							{
								echo '<option value="'.$horarioc.'" selected>'.$horarioc.'</option>';
							}
							else
							{
								echo '<option value="'.$horarioc.'" >'.$horarioc.'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<br>
			<br>
			<br>
			<input class="inputes" style="width: 250px;height: 60px;border-bottom: 3px solid #0e0e0e;outline:0;text-align: center;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;background-color: var(--primary-color);" type="text" id="ciudad-local" name="ciudad-local" placeholder="CIUDAD*" value=""/>
			
			<input class="inputes" style="width: 250px;height: 60px;border-bottom: 3px solid #0e0e0e;outline:0;text-align: center;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;background-color: var(--primary-color);" type="text" id="delegacion-local" name="delegacion-local" placeholder="DELEGACIÓN*" value=""/>
			
			<input class="inputes" style="width: 250px;height: 60px;border-bottom: 3px solid #0e0e0e;outline:0;text-align: center;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;background-color: var(--primary-color);" type="text" id="colonia-local" name="colonia-local" placeholder="COLONIA*" value=""/>
			<br>
			<br>
			<input class="inputes" style="width: 250px;height: 60px;border-bottom: 3px solid #0e0e0e;outline:0;text-align: center;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;background-color: var(--primary-color);" type="text" id="calle-local" name="calle-local" placeholder="CALLE*" value=""/>
		
			<input class="inputes" style="width: 250px;height: 60px;border-bottom: 3px solid #0e0e0e;outline:0;text-align: center;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;background-color: var(--primary-color);" type="text" id="numero-local" name="numero-local" placeholder="NÚMERO*" value=""/>
			<br>
			<br>
			<input class="inputes" style="width: 250px;height: 60px;border-bottom: 3px solid #0e0e0e;outline:0;text-align: center;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;background-color: var(--primary-color);" type="text" id="telefono-local" name="telefono-local" placeholder="TELÉFONO*" value=""/>
			
			<input class="inputes" style="width: 250px;height: 60px;border-bottom: 3px solid #0e0e0e;outline:0;text-align: center;color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 20px;background-color: var(--primary-color);" type="text" id="whatsapp-local" name="whatsapp-local" placeholder="WHATSAAP" value=""/>
			
			
			


			<br><br>
			<h3>Busca la Ubicacion de tu Local en el mapa para guardar la sus coordenadas</h3>
			<div id="map"></div>

					<script>
						let a = 1
					</script>

			<input type="number" name="lat" step="0.000000000000001" id="lat" value="0" style="display='none'" >
			<input type="number" name="lon" step="0.000000000000001" id="lon" value="0" style="display='none'" >


			
			
			
			<br>
			<br>
			<div style="max-width: 500px;">
				<label class="container-tc-pp">
					<p style="font-size: 18px;">Acepto los T&eacute;rminos y Condiciones de PonmeLocal&copy; para el uso de los datos que he proporcionado.</p>
					<input type="checkbox" name="aceptoterminos" id="aceptoterminos" value="1">
					<span class="checkmark-tc-pp"></span>
				</label>
			</div>
			<br>
			<p>
				Los campos con * son obligatorios
			</p>
			<br>
			<br>
			<!-- mandarformaloca() -->
			<div onclick="mardarformalocal" style="width: 140px;height: 40px;background-color: #0e0e0e;user-select: none;padding: 10px;cursor: hand;">
					<p style="color: #fff;font-family: 'Lato', sans-serif;font-size: 16px;text-align: center;margin: auto;padding-top: 8px;">Enviar</p>
			</div>
			<input id="enviadoes" name="enviadoes" type="hidden" value="">
			<input type="submit" value="enviar">
		</form>
	</center>
</div>
</body>
<!--FIN CONTENIDO-->