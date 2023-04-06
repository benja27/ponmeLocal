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
			<div class="container_f" style="max-width: 500px;">
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
			<div onclick="mandarformalocal()" style="width: 140px;height: 40px;background-color: #0e0e0e;user-select: none;padding: 10px;cursor: hand;">
					<p style="color: #fff;font-family: 'Lato', sans-serif;font-size: 16px;text-align: center;margin: auto;padding-top: 8px;">Enviar</p>
			</div>
			<input id="enviadoes" name="enviadoes" type="hidden" value="">
		</form>
	</center>
</div>
<!--FIN CONTENIDO-->