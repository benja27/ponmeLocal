<!--CONTENIDO-->
<div class="right_c2" style="padding-top: 0px;padding-bottom: 120px;">
	<div>
		<center> 
			
			<!--LOGO-->
			<div class="visibledesk">
				<?php echo '<a href="'.$linkinit.'">';?>
					<h1 class="slidy2" style="color:#fff;font-size: 44px;text-align: center;font-weight: 700;font-family: 'Lalezar', sans-serif;"><span style="color: #0e0e0e;">PONME</span>LOCAL<span style="font-size: 18px;font-weight: 400;color: #0e0e0e;"> &copy;</span></h1>
				</a>
			</div>
			<!--LOGO END-->
			<!--BUSCADOR-->
			<div class="visibledesk">
				<p style="color: #0e0e0e;font-family: 'Lato', sans-serif;font-size: 16px;text-align: center;margin: auto;padding-top: 5px;font-weight:700;">RESULTADOS DE:</p>
				<br>
				
				<?php 

					$busqueda = changeletter("%C3%B1","ñ", $urlmain->segment(2));
					$busqueda = changeletter("%C3%91","Ñ", $busqueda);
					$busqueda = changeletter("%C3%A1","á", $busqueda);
					$busqueda = changeletter("%C3%A9","é", $busqueda);
					$busqueda = changeletter("%C3%AD","í", $busqueda);
					$busqueda = changeletter("%C3%B3","ó", $busqueda);
					$busqueda = changeletter("%C3%BA","ú", $busqueda);
					$busqueda = changeletter("%C3%BC","ü", $busqueda);
					$busqueda = changeletter("%C3%81","Á", $busqueda);
					$busqueda = changeletter("%C3%89","É", $busqueda);
					$busqueda = changeletter("%C3%8D","Í", $busqueda);
					$busqueda = changeletter("%C3%93","Ó", $busqueda);
					$busqueda = changeletter("%C3%9A","Ú", $busqueda);
					$busqueda = changeletter("%C3%9C","Ü", $busqueda);
					$depuradorb = explode( '-', $busqueda);
					$countb = sizeof($depuradorb);
					$busquedan = "";
					for ($b = 0; $b < $countb; $b++) 
					{
						if($b == $countb - 1)
						{
							$busquedan .= $depuradorb[$b];
						}
						else
						{
							$busquedan .= $depuradorb[$b]." ";
						}
					}

					echo'<input class="inputes" style="width: 300px;height: 60px;border-bottom: 3px solid #0e0e0e;outline:0;text-align: center;color: #0e0e0e;font-size: 20px;font-weight:700;background-color: var(--primary-color);" type="text" id="busqueda" name="busqueda" placeholder="TU BÚSQUEDA AQUÍ..." value="'.$busquedan.'"/>'; 
				?>
				<br>
				<br>
				<br>
			</div>
			<!--BUSCADOR END-->
			
			<!--BOTONES BUSQUEDA-->
			<div class="visibledesk">
				<table>
					<tr>
						<td>
							<div onclick="mandarforma()" style="width: 140px;height: 40px;background-color: #0e0e0e;user-select: none;padding: 10px;cursor: hand;">
								<p style="color: #fff;font-family: 'Lato', sans-serif;font-size: 16px;text-align: center;margin: auto;padding-top: 8px;">Buscar</p>
							</div>
						</td>
						<td>
							<p style="opacity: 0;">--</p>
						</td>
						<td>
							<div onclick="mandarforma2()" style="width: 140px;height: 40px;background-color: #0e0e0e;user-select: none;padding: 10px;cursor: hand;">
								<p style="color: #fff;font-family: 'Lato', sans-serif;font-size: 16px;text-align: center;margin: auto;padding-top: 8px;">Abierto Ahora</p>
							</div>
						</td>
					</tr>
				</table>
				<br>
				<br>
				<br>
			</div>
			<!--BOTONES BUSQUEDA END-->
			<!--BLOQUES DE BUSQUEDA-->
			<div class="container_f" style="margin: auto;max-width: 1200px;">
				<?php
					$picker = "'";
					if($conteo > 0)
					{
						for ($i = 0; $i < $conteo; $i++) 
						{
							if($tipo_local[$i] == 0)
							{
								echo '
								<div class="all_c" style="border-color: #0e0e0e;padding-top: 0px;padding-bottom: 20px;">
									<p style="opacity:0;font-size:5px;">---</p>
									<h1 style="font-weight: 700;font-size: 25px;text-align: left;padding: 0px 20px 0px 20px;">'.$nombre_local[$i].'</h1>
									<p style="font-weight: 700;font-size: 18px;color: #0e0e0e;line-height: 0px;text-align: left;padding: 0px 20px 10px 20px;">'.$clase_local[$i].'</p>
									<div style="background-color: #0e0e0e;height: 3px;width: 100%;"></div>
								';
							}
							else
							{
								echo '
								<div class="all_c" style="border-color: #0e0e0e;padding-top: 0px;padding-bottom: 20px;">
									<p style="opacity:0;font-size:5px;">---</p>
									<h1 style="font-weight: 700;font-size: 25px;text-align: center;line-height: 0px;padding: 0px 20px 20px 20px;">'.$nombre_local[$i].'</h1>
									<div style="background-color: #0e0e0e;height: 3px;width: 100%;"></div>
									<p style="font-weight: 700;font-size: 18px;color: #0e0e0e;text-align: center;padding: 0px 20px 0px 20px;">'.$clase_local[$i].'</p>
									<div style="background-color: #0e0e0e;height: 3px;width: 100%;"></div>
								';
							}
							echo '
								<center>
									<table style="width: 100%;padding: 10px 20px 10px 20px;" align="center">
									<tr>
							';
							$diasdep = explode( ',', $dias_local[$i]);

							if($diasdep[0] == "0")
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;">Lun</p>
								</td>
								';
							}
							else
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;opacity:0;">Lun</p>
								</td>
								';
							}
							if($diasdep[1] == "0")
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;">Mar</p>
								</td>
								';
							}
							else
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;opacity:0;">Mar</p>
								</td>
								';
							}
							if($diasdep[2] == "0")
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;">Mier</p>
								</td>
								';
							}
							else
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;opacity:0;">Mier</p>
								</td>
								';
							}
							if($diasdep[3] == "0")
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;">Jue</p>
								</td>
								';
							}
							else
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;opacity:0;">Jue</p>
								</td>
								';
							}
							if($diasdep[4] == "0")
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;">Vie</p>
								</td>
								';
							}
							else
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;opacity:0;">Vie</p>
								</td>
								';
							}
							if($diasdep[5] == "0")
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;">Sab</p>
								</td>
								';
							}
							else
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;opacity:0;">Sab</p>
								</td>
								';
							}
							if($diasdep[6] == "0")
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;">Dom</p>
								</td>
								';
							}
							else
							{
								echo'
								<td>
									<p style="font-weight: 700;font-size: 16px;color: #0e0e0e;opacity:0;">Dom</p>
								</td>
								';
							}

							$telefonoclick = changeletter(" ","", $telefono_local[$i]);
							$g_calle = changeletter(" ","+",$calle_local[$i]);
							$g_colonia = changeletter(" ","+",$colonia_local[$i]);
							$g_delegacion = changeletter(" ","+",$delegacion_local[$i]);
							echo'
										</tr>
									</table>
								</center>
								<div style="background-color: #0e0e0e;height: 3px;width: 100%;"></div>
								<p style="font-size: 20px;color: #0e0e0e;text-align: left;font-family: '.$picker.'Roboto'.$picker.', sans-serif;padding: 0px 20px 0px 20px;"><strong>'.$abierto_local[$i].'</strong> a <strong>'.$cerrado_local[$i].'</strong></p>
								<div style="background-color: #0e0e0e;height: 3px;width: 100%;"></div>
								
								<p style="font-weight: 700;font-size: 18px;color: #0e0e0e;text-align: left;line-height: 0px;padding: 10px 20px 0px 20px;">DIRECCI&Oacute;N:</p>
								<div class="in-direction">
								<p style="font-size: 20px;color: #0e0e0e;text-align: left;font-family: '.$picker.'Roboto'.$picker.', sans-serif;padding: 0px 20px 0px 20px;">'.$calle_local[$i].' '.$numero_local[$i].' '.$colonia_local[$i].' '.$delegacion_local[$i].' '.$cp_local[$i].' '.$ciudad_local[$i].'</p>
								</div>
								<a target="_blank" href="https://www.google.com/maps/search/'.$g_calle.'+'.$numero_local[$i].'+'.$g_colonia.'+'.$g_delegacion.'+'.$ciudad_local[$i].'">
								<div style="width: 140px;height: 40px;background-color: #0e0e0e;user-select: none;padding: 10px;cursor: hand;">
								<p style="color: #fff;font-family: '.$picker.'Lato'.$picker.', sans-serif;font-size: 16px;text-align: center;margin: auto;padding-top: 8px;">Ver Mapa</p>
								</div>
								</a>
								<br>
								
								<div style="background-color: #0e0e0e;height: 3px;width: 100%;"></div>
								<p style="font-size: 20px;color: #0e0e0e;text-align: left;font-family: '.$picker.'Roboto'.$picker.', sans-serif;padding: 0px 20px 0px 20px;"><strong>'.$telefono_local[$i].'</strong>
								<a target="_blank"href="https://api.whatsapp.com/send?phone=52'.$telefonoclick.'&text=Hola!" target="_blank">
										<i class="fa fa-whatsapp animo-wassap" style="font-size:50px;color: #0e0e0e;float:right;margin-top:-15px;"></i>
								</a>
								</p>
								<div style="background-color: #0e0e0e;height: 3px;width: 100%;"></div>
								<table align="left" style="padding: 15px 20px 0px 20px;">
									<tr>
										<td>
							';
								if($envio_local[$i]== 0)
								{
									echo '<img alt="Si hay envio" src="'.$linkinit.'/img/sihay.svg" style="width: 30px;height: 30px;">';
								}
								else
								{
									echo '<img alt="No hay envio" src="'.$linkinit.'/img/nohay.svg" style="width: 30px;height: 30px;">';
								}
							echo '		
										</td>
										<td>
											<p style="opacity: 0;">--</p>
										</td>
										<td>
							';
								if($envio_local[$i]== 0)
								{
									echo '<p style="font-size: 20px;color: #0e0e0e;text-align: left;font-weight: 700;">Servicio a Domicilio</p>';
								}
								else
								{
									echo '<p style="font-size: 20px;color: #0e0e0e;text-align: left;font-weight: 700;">Sin Servicio a Domicilio</p>';
								}
							echo '
										</td>
									</tr>
								</table>
								<br>
								<br>
								<br>
								<br>
								<div style="background-color: #0e0e0e;height: 3px;width: 100%;"></div>
								<br>
							';
							if($tipo_local[$i] == 0)
							{
								echo '
								<p style="font-size: 20px;color: #0e0e0e;text-align: left;font-family: '.$picker.'Roboto'.$picker.', sans-serif;padding: 0px 20px 0px 20px;">'.highlightletter($palabras_local[$i], $busqueda).'</p>
								';
							}
							else
							{
								echo '
								<br>
								<table>
								<tr>
								<td>
								<a href="'.$menu_local[$i].'">
								<div style="border: 4px solid;border-color: #0e0e0e;width: 100px;height: 30px;user-select: none;padding: 10px;cursor: hand;">
									<center>
										<p style="color: #0e0e0e;font-weight: 700;font-size: 15px;text-align: center;margin: auto;padding-top: 5px;">MEN&Uacute;</p>
									</center>
								</div>
								</a>
								</td>
								<td>
									<p style="opacity:0;">--</p>
								</td>
								<td>
								<a href="'.$googlemap_local[$i].'">
								<div style="border: 4px solid;border-color: #0e0e0e;width: 100px;height: 30px;user-select: none;padding: 10px;cursor: hand;">
									<center>
										<p style="color: #0e0e0e;font-weight: 700;font-size: 15px;text-align: center;margin: auto;padding-top: 5px;">LOCALIZAR</p>
									</center>
								</div>
								</a>
								</td>
								</tr>
								</table>
								<table>
								<tr>
								<td>
								<a href="'.$facebook_local[$i].'">
								<div style="border: 4px solid;border-color: #0e0e0e;width: 100px;height: 30px;user-select: none;padding: 10px;cursor: hand;">
									<center>
										<p style="color: #0e0e0e;font-weight: 700;font-size: 15px;text-align: center;margin: auto;padding-top: 5px;">FACEBOOK</p>
									</center>
								</div>
								</a>
								</td>
								<td>
									<p style="opacity:0;">--</p>
								</td>
								<td>
								<a href="'.$instagram_local[$i].'">
								<div style="border: 4px solid;border-color: #4cc3a1;width: 100px;height: 30px;user-select: none;padding: 10px;cursor: hand;">
									<center>
										<p style="color: #4cc3a1;font-weight: 700;font-size: 15px;text-align: center;margin: auto;padding-top: 5px;">INSTAGRAM</p>
									</center>
								</div>
								</a>
								</td>
								</tr>
								</table>
								<br>
								<a href="'.$web_local[$i].'"><p style="font-size: 20px;color: #0e0e0e;text-align: center;font-family: '.$picker.'Roboto'.$picker.', sans-serif;">'.$web_local[$i].'</p></a>
								';
							}
							echo '
								</div>
							';
							
						}
					}
					else
					{
						echo '<p style="color: #0e0e0e;font-family: '.$picker.'Lato'.$picker.', sans-serif;font-size: 16px;text-align: center;margin: auto;padding-top: 5px;font-weight:700;">No existe resultado para esta busqueda.</p>';
					}
				?>
			</div>
			<!--BLOQUES DE BUSQUEDA END-->
		</center>
	</div>
	<div class="visibledevice">
		<a href="/">
			<section style="padding-left: 15px;padding-right: 15px;margin: 0;width: 100%;max-width: 320px;height: auto;position: fixed;bottom: 0;right: 0;left: 0;margin-right: auto;margin-left: auto;z-index: 999;">
				<div style="background-color: #0e0e0e;padding-left: 40px;padding-right: 40px;padding-top: 20px;padding-bottom: 20px;border-radius: 5px 5px 0px 0px;z-index: 9999;">
					<center>
						<i class="material-icons" style="color:#fff;font-size:30px;padding-top: 0px;">keyboard_backspace</i>	
					</center>
				</div>
			</section>
		</a>
	</div>
</div>
<!--FIN CONTENIDO-->